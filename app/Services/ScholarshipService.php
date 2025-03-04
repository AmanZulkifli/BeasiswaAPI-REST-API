<?php

namespace App\Services;
use App\Repositories\ScholarshipRepository;

//memisahkan business logic dengan controller, proses manipulasi hasil dari Repository//
//Repositories -> Services -> Controller//


class ScholarshipService {
    private $scholarshipRepository;

    //Fungsi __Construct untuk definisi dan dijalani pertama agar bisa dipanggil
    public function __construct(ScholarshipRepository $scholarshipRepository) {
        //proses panggil file repository
        $this->scholarshipRepository = $scholarshipRepository;
    }

    public function index() {
        return $this->scholarshipRepository->getAllData();
    }

    public function store(array $data) {
        return $this->scholarshipRepository->storeNewData($data);
    }

    public function update(array $data, $id) {
        return $this->scholarshipRepository->updateData($data, $id);
    }

    public function destroy($id) { 
        return $this->scholarshipRepository->deleteData($id);
    }
}
?>