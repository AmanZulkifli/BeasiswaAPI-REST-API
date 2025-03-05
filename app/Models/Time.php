<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Time extends Model
{
    use HasUuids, HasFactory;

    protected $fillable = ['scholarship_id', 'detail_id', 'semester_plus', 'semester_minus'];

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'scholarship_id');
    }

    public function detail()
    {
        return $this->belongsTo(Detail::class, 'detail_id');
    }

}

