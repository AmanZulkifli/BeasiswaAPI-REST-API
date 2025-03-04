<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'scholarship_id' => $this->scholarship_id,
            'scholarship' => new ScholarshipResource($this->whenLoaded('scholarship')), // Menampilkan data scholarship
            'detail_id' => $this->detail_id,
            'detail' => new DetailResource($this->whenLoaded('detail')), // Menampilkan data detail
            'time_plus' => $this->time_plus,
            'time_minus' => $this->time_minus,
        ];
    }
}
