<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class AbstractRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(['errors' => $this->errors($validator)], 400));
    }

    protected function errors(Validator $validator)
    {
        $errors = $validator->errors()->getMessages();
        $transformed = [];

        foreach ($errors as $field => $messages) {
            $transformed[$field] = $messages[0];
        }

        return $transformed;
    }
}
