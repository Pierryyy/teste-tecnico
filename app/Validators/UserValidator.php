<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class UserValidator implements UserValidatorInterface
{
    public function validate(array $data)
    {
        $validator = Validator::make($data, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        return true;
    }
}
