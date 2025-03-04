<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory;

class LoginRequest
{
    public static function validate(Request $request)
    {

        $rules = [
            'email' => 'required|email:dns',
            'password' => 'required|',
        ];

        $validator = app(Factory::class)->make($request->all(), $rules);

        if ($validator->fails()) {
            response()->json($validator->errors(), 400)->send();
            exit;
        }

        return $validator->validated();
    }
}
