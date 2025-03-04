<?php

namespace App\Http\Requests;

use App\Models\Scholarship;
use Illuminate\Validation\Factory;


class ScholarshipRequest {

    public static function validate($request) {

        $rules = [
            'name' => 'required|min:3',
            'type' => 'required|in:' . implode(',', [Scholarship::FULLYFUNDED, Scholarship::HALFLYFUNDED, Scholarship::SPONSORED]),
        ];
        //lumen hanya bbisa validasi bentuk $this->validate($request, [...]) tapi hanya bisa dipanggil di controller, jadi solusinya pake factory dari validation;
        $validator = app(Factory::class)->make($request->all(), $rules);
        if ($validator->fails()) {
            response()->json($validator->errors(), 400)->send();
            exit;
        } else {
            return $validator->validated();
        }
            
    }
}


?>

        
