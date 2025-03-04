<?php

namespace App\Http\Controllers;

use App\Services\ScholarshipService;
use App\Http\Resources\ScholarshipResource;
use App\Http\Requests\ScholarshipRequest;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    private $scholarshipService;

    public function __construct(ScholarshipService $scholarshipService)
    {
        $this->scholarshipService = $scholarshipService;
    }

    public function index() {
        try {
            //Ambil dari services//
            $scholarship = $this->scholarshipService->index();
            //response()->json : hasil yang akan dimunculkan ketika mengakses url terkait : json (data yang mau dimunculin, httpstatuscode)
            //Ambil dari Collection//
            return response()->json(scholarshipResource::collection($scholarship), 200);
        } catch (\Exception $err) {
            //jikaa try ada yang erro, muunculkan error seperti ini
            return response()->json($err->getMessage(), 400);
        }
        }

    public function store (Request $request) {
        try {
            $payload = ScholarshipRequest::validate($request);
            $scholarship = $this->scholarshipService->store($payload);
            return response()->json(new ScholarshipResource($scholarship), 200);
        } catch (\Exception $err) {
            return response()->json($err->getMessage(), 400);
        }
    }

    public function update(Request $request, $id) {
        try {
            $payload = ScholarshipRequest::validate($request);
            $scholarship = $this->scholarshipService->update($payload, $id);
            return response()->json(new ScholarshipResource($scholarship), 200);
        } catch (\Exception $err) {
            return response()->json($err->getMessage(), 400);
        }
    }   
    
    public function destroy($id) {
        try {
            $this->scholarshipService->destroy($id);
            return response()->json(null, 204);
        } catch (\Exception $err) {
            return response()->json($err->getMessage(), 400);
        }
    }
}
