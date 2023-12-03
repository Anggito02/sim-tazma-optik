<?php

namespace App\Services\Modules\Kas;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\KasDTOs\NewKasDTO;

use App\Repositories\Modules\Kas\AddNewDailyKasRepository;
use App\Repositories\Modules\Kas\GetLatestKasRepository;
use App\Repositories\Modules\Kas\CheckKasOpenedRepository;

class AddNewDailyKasService {
    public function __construct(
        private AddNewDailyKasRepository $addNewDailyKasRepository,
        private GetLatestKasRepository $getLatestKasRepository,
        private CheckKasOpenedRepository $checkKasOpenedRepository
    )
    {}

    /**
     * Add new daily kas
     * @param Request $request
     * @return Kas
     */
    public function addNewDailyKas(Request $request) {
        try {
            // Validate request
            $request->validate([
                'modal_tambahan_harian' => 'required|numeric|min:0',

                'branch_id' => 'required|exists:branches,id',
                'employee_id' => 'required|exists:users,id',
            ]);

            $tanggal_buka_kas = date('Y-m-d H:i:s');

            // Check if kas already opened
            $kasOpened = $this->checkKasOpenedRepository->checkKasOpened($request->branch_id, $tanggal_buka_kas);

            if ($kasOpened) {
                throw new Exception('Kas hari ini sudah dibuka');
            }

            // Get latest kas
            $latestKas = $this->getLatestKasRepository->getLatestKas($request->branch_id);


            $kas_akhir_harian_terakhir = 0;
            $kas_awal_harian = 0;

            if (!$latestKas) {
                $kas_awal_harian = $request->modal_tambahan_harian;
            } else {
                $kas_akhir_harian_terakhir = $latestKas->getKasAkhirHarian();

                $kas_awal_harian = $kas_akhir_harian_terakhir + $request->modal_tambahan_harian;
            }

            $newKasDTO = new NewKasDTO(
                $tanggal_buka_kas,
                $request->modal_tambahan_harian,
                $kas_awal_harian,

                $request->branch_id,
                $request->employee_id,
            );

            $kas = $this->addNewDailyKasRepository->addNewDailyKas($newKasDTO);

            return $kas;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
