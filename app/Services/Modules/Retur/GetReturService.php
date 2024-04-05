<?php

namespace App\Services\Modules\Retur;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReturDTOs\ReturInfoDTO;

use App\Repositories\Modules\Retur\GetReturRepository;

class GetReturService {
    public function __construct(
        private GetReturRepository $returRepository
    ) {}

    /**
     * Get retur
     * @param Request $request
     * @return ReturInfoDTO
     */
    public function getRetur(Request $request) {
        // Validate request
        $request->validate([
            'id' => 'required|exists:returs,id'
        ]);

        $id = $request->id;

        try {
            $returDTO = $this->returRepository->getRetur($id);

            return $returDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
