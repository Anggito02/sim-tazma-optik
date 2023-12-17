<?php

namespace App\Services\KabKota;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\KabKota\GetAllKabKotaRepository;

class GetAllKabKotaService {
    public function __construct(
        private GetAllKabKotaRepository $getAllKabKota
    )
    {}

    /**
     * Get All Kabupaten/Kota
     * @param Request $request
     */
    public function getAllKabKota(Request $request)
    {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $kabKotaData = $this->getAllKabKota->getAllKabKota($request->page, $request->limit);

            return $kabKotaData;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
