<?php
namespace App\Repositories;

use App\Models\Time;
use App\Models\Detail;

class TimeRepository
{
    public function storeTime(array $data)
    {
        // Simpan data ke tabel time
        $time = Time::create($data);

        // Update semester di tabel detail
        if ($detail = Detail::find($data['detail_id'])) {
            $detail->updateWaktuBulan($data['semester_plus'] ?? 0, $data['semester_minus'] ?? 0);
        }

        // Load relasi setelah penyimpanan
        return $time->load('scholarship', 'detail');
    }
}

?>