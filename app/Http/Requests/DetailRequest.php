<?php

namespace App\Http\Requests;

use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory;

class DetailRequest {
    public static function validate(Request $request) { // <- Tambahkan Request sebagai parameter
        $rules = [
            'scholarship_id' => 'required|exists:scholarships,id',
            'status' => 'required|in:' . implode(',', [Detail::ACTIVE, Detail::DONE, Detail::STOP]),
            'semester' => 'required|integer|min:0',
        ];

        $validator = app(Factory::class)->make($request->all(), $rules);

        if ($validator->fails()) {
            response()->json($validator->errors(), 400)->send();
            exit;
        }

        return $validator->validated();
    }
}
