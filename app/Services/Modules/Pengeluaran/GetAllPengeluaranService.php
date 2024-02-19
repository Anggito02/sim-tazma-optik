<?php

namespace App\Services\Modules\Pengeluaran;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\Pengeluaran\GetAllPengeluaranRepository;

class GetAllPengeluaranService {
    public function __construct(
        private GetAllPengeluaranRepository $getAllPengeluaranRepository,
    )
    {}

    /**
     * Get All Pengeluaran
     * @param Request $request
     * @return PengeluaranInfoDTO[]
     */
    public function getAllPengeluaran(Request $request) {
        try {
            // Validate request
            $request->validate([
                'branch_id' => 'required|exists:branches,id',
                'page' => 'required|integer',
                'limit' => 'required|integer',
            ]);

            $pengeluaranDTOs = $this->getAllPengeluaranRepository->getAllPengeluaran($request->branch_id, $request->page, $request->limit);

            $pengeluaranArrays = [];

            foreach ($pengeluaranDTOs as $pengeluaranDTO) {
                $pengeluaranArray = $pengeluaranDTO->toArray();

                array_push($pengeluaranArrays, $pengeluaranArray);
            }

            return $pengeluaranArrays;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
