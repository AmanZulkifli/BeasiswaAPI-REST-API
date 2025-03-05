<?php
namespace App\Http\Requests;

use Illuminate\Validation\Factory;

class TimeRequest
{
    public static function validate($request)
    {
        $rules = [
            'scholarship_id' => 'required|exists:scholarships,id',
            'detail_id' => 'required|exists:details,id',
            'semester_plus' => 'nullable|integer|min:0',
            'semester_minus' => 'nullable|integer',
        ];

        $validator = app(Factory::class)->make($request->all(), $rules);

        if ($validator->fails()) {
            response()->json($validator->errors(), 400)->send();
            exit;
        }

        return $validator->validated();
    }
}

?>