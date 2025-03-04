<?php

namespace App\Repositories;
use App\Models\Scholarship;

//Repositories : memisahkan logika data dengan controller, jadi isinya hanya berupa ORM/Eloquent dengan model//
//Modal -> Repositories -> Services -> Controller//

class ScholarshipRepository {
    public function getAllData () {
        //Mengambil data
        return Scholarship::paginate(10);
    }

    public function storeNewData (array $data) {
        //Simpan data ke database
        return Scholarship::create($data);
    }

    public function updateData (array $data, $id) {
        //update data
        Scholarship::where('id', $id)->update($data);
        return Scholarship::find($id);
    }

    public function deleteData ($id) {
        //hapus data
        return Scholarship::where('id', $id)->delete();
    }
}
?>