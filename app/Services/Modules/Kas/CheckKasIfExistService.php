<?php

namespace App\Services\Modules\Kas;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\Kas\CheckKasOpenedRepository;

class CheckKasIfExistService
{
    public function __construct(
        private CheckKasOpenedRepository $checkKasOpenedRepository
    )
    {}

    public function checkKasIfExist(Request $request)
    {
        try {
            // Validate request
            $request->validate([
                'branch_id' => 'required|exists:branches,id'
            ]);

            $tanggal_buka_kas = date('Y--m-d');

            $checkKasOpened = $this->checkKasOpenedRepository->checkKasOpened($request->branch_id, $tanggal_buka_kas);

            if ($checkKasOpened) {
                return 'Kas hari ini sudah dibuka';
            }
            return 'Kas hari ini belum dibuka';

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>
