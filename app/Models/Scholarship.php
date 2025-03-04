<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scholarship extends Model
{
    use HasUuids;
    use HasFactory;


    protected $fillable = ['name', 'type'];

    public const FULLYFUNDED = "FullyFunded";
    public const HALFLYFUNDED = "HalflyFunded";
    public const SPONSORED = "Sponsored";

    public function details()
    {
        return $this->hasMany(Detail::class, 'scholarship_id');
    }

    public function time()
    {
        return $this->hasMany(Time::class, 'scholarship_id');
    }

}
