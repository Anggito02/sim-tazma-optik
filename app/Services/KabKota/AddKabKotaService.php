<?php

namespace App\Services\KabKota;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\KabKota\AddKabKotaRepository;

class AddKabKotaService {
    public function __construct(
        private AddKabKotaRepository $addKabKotaRepository
    )
    {}

    /**
     * Add new kab kota
     * @param Request $request
     */
    public function addKabKota(Request $request)
    {
        try {
            // Validate request
            $request->validate([

            ]);

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
