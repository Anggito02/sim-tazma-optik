<?php

namespace App\Services\Modules\SalesMaster;

use Exception;

use App\Repositories\Branch\GetBranchRepository;
use App\Repositories\Modules\SalesMaster\GetLatestNoTransaksiRepository;

class GenerateNoTransaksiService {
    public function __construct(
        private GetBranchRepository $getBranchRepository,
        private GetLatestNoTransaksiRepository $getLatestNoTransaksiRepository,
    )
    {}
    /**
     * Generate No Transaksi
     * @return string
     */
    public function generateNoTransaksi(int $branchId) {
        try {
            // Get branch
            $branchDTO = $this->getBranchRepository->getBranch($branchId);

            // Get latest no transaksi
            $latestNoTransaksi = $this->getLatestNoTransaksiRepository->getLatestNoTransaksi($branchId);

            if ($latestNoTransaksi) {
                $latestNoTransaksi = $latestNoTransaksi->nomor_transaksi;
                $latestNoTransaksi = (int) explode('/', $latestNoTransaksi)[2];
                $latestNoTransaksi++;
                $latestNoTransaksi = date('Ymd') . '/' . $latestNoTransaksi;
            } else {
                $latestNoTransaksi = date('Ymd') . '/1';
            }

            $kodeBranch = $branchDTO->kode_branch;

            $noTransaksi = $kodeBranch . '/' . $latestNoTransaksi;

            return $noTransaksi;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
