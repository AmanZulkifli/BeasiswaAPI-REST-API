<?php

namespace App\Services;
use App\Repositories\DetailRepository;
use App\Models\Detail;

//memisahkan business logic dengan controller, proses manipulasi hasil dari Repository//
//Repositories -> Services -> Controller//


class DetailService {
    private $detailRepository;

    //Fungsi __Construct untuk definisi dan dijalani pertama agar bisa dipanggil
    public function __construct(DetailRepository $detailRepository) {
        //proses panggil file repository
        $this->detailRepository = $detailRepository;
    }

    public function index() {
        return $this->detailRepository->getAllDetail();
    }

    public function store(array $data) {
        $detail = $this->detailRepository->storeNewDetail($data);

        // Load relasi scholarship setelah penyimpanan
        return $detail->load('scholarship');
    }


    public function getDetailById($id)
{
    return Detail::with('scholarship')->findOrFail($id);
}

}
?>