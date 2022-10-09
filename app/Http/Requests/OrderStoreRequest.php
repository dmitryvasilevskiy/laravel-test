<?php

namespace App\Http\Requests;

class OrderStoreRequest extends AbstractRequest
{

    public function rules()
    {
        return [
            'name' => ['required'],
            'img' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
