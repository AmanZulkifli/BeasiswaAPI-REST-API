<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory;

class UserRequest
{
    public static function validate($request)
    {
        $request['role'] = $request['role'] ?? 'staff';


        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|',
            'password' => 'required|',
            'role' => 'required|in:student,admin',
        ];

        $validator = app(Factory::class)->make($request->all(), $rules);

        if ($validator->fails()) {
            response()->json($validator->errors(), 400)->send();
            exit;
        }

        return $validator->validated();
    }
}
