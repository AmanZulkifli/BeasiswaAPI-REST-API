<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Detail extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $fillable = ['scholarship_id', 'status', 'semester'];

    public const ACTIVE = "Active";
    public const DONE = "Done";
    public const STOP = "Stop";

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'scholarship_id');
    }

    public function time()
    {
        return $this->hasMany(Time::class, 'detail_id');
    }

    public function updateWaktuBulan($time_plus, $time_minus)
{
    $time_plus = $time_plus ?? 0;
    $time_minus = $time_minus ?? 0;

    $this->semester += $time_plus;
    $this->semester -= $time_minus;

    if ($this->semester <= 0) {
        $this->semester = 0;
        $this->status = self::DONE;
    }

    $this->save();
}


}
