<?php

namespace App\Services\Modules\Retur;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReturDTOs\ReturInfoDTO;

use App\Repositories\Modules\Retur\GetAllReturRepository;

class GetAllReturService {
    public function __construct(
        private GetAllReturRepository $returRepository
    ) {}

    /**
     * Get all retur
     * @param Request $request
     * @return ReturInfoDTO
     */
    public function getAllRetur(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $returDTO = $this->returRepository->getAllRetur($request->page, $request->limit);

            return $returDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>
