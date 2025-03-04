<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'scholarship_id' => $this->scholarship_id,
            'scholarship' => new ScholarshipResource($this->whenLoaded('scholarship')),
            'status' => $this->status,
            'semester' => $this->semester,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
