<?php

namespace App\Http\Requests;

class UserStoreRequest extends AbstractRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required']
        ];
    }
}
