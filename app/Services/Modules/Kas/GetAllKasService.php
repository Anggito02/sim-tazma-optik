<?php

namespace App\Services\Modules\Kas;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\KasDTOs\KasInfoDTO;

use App\Repositories\Modules\Kas\GetAllKasRepository;

class GetAllKasService {
    public function __construct(
        private GetAllKasRepository $kasRepository
    )
    {}

    /**
     * Get all kas
     * @param Request $request
     * @return KasInfoDTO[]
     */
    public function getAllKas(Request $request) {
        try {
            // Validate request
            $request->validate([
                'branch_id' => 'required|exists:branches,id',
                'page' => 'required|integer',
                'limit' => 'required|integer',
            ]);

            $kasDTOs = $this->kasRepository->getAllKas($request->branch_id, $request->page, $request->limit);

            $kasArrays = [];

            foreach ($kasDTOs as $kasDTO) {
                $kasArray = $kasDTO->toArray();

                array_push($kasArrays, $kasArray);
            }

            return $kasArrays;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
