<?php

namespace App\Services\Modules\Pengeluaran;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PengeluaranDTOs\NewPengeluaranDTO;

use App\Repositories\Modules\Pengeluaran\AddPengeluaranRepository;
use App\Repositories\Modules\Kas\UpdateKasTotalRepository;

class AddPengeluaranService {
    public function __construct(
        private AddPengeluaranRepository $pengeluaranRepository,
        private UpdateKasTotalRepository $updateKasTotalRepository,
    )
    {}

    /**
     * Add new pengeluaran
     * @param Request $request
     * @return PengeluaranInfoDTO
     */
    public function addPengeluaran(Request $request) {
        try {
            // Validate request
            $request->validate([
                'deskripsi' => 'required|string',
                'jumlah_pengeluaran' => 'required|numeric|min:1',

                'bentuk_pengeluaran' => 'required|in:TARIK_MODAL,LAINNYA',
                'branch_id' => 'required|exists:branches,id',
                'made_by' => 'required|exists:users,id',
            ]);

            $tanggal_pengeluaran = date('Y-m-d H:i:s');

            // Update coa id
            $coa_id = null;
            if ($request->bentuk_pengeluaran == 'TARIK_MODAL') {
                $coa_id = 3;
            } else if ($request->bentuk_pengeluaran == 'LAINNYA') {
                $coa_id = 4;
            } else {
                throw new Exception('Bentuk pengeluaran tidak valid');
            }

            // Tarik modal dari kas
            if ($request->bentuk_pengeluaran == 'TARIK_MODAL' || $request->bentuk_pengeluaran == 'LAINNYA') {
                $this->updateKasTotalRepository->updateKasTotal(
                    $request->branch_id,
                    date('Y-m-d H:i:s'),
                    -$request->jumlah_pengeluaran,
                );
            }

            $newPengeluaranDTO = new NewPengeluaranDTO(
                $request->deskripsi,
                $request->jumlah_pengeluaran,
                $tanggal_pengeluaran,

                $coa_id,
                $request->branch_id,
                $request->made_by,
            );

            $pengeluaranDTO = $this->pengeluaranRepository->addPengeluaran($newPengeluaranDTO);

            return $pengeluaranDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
