<?php

namespace App\Services\Coa;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CoaDTO;

use App\Repositories\Coa\DeleteCoaRepository;

class DeleteCoaService {
    public function __construct(
        private DeleteCoaRepository $coaRepository
    ) {}

    /**
     * Delete coa
     * @param Request $request
     * @return CoaDTO
     */
    public function deleteCoa(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:coas,id',
            ]);

            $id = $request->id;

            $coaDTO = $this->coaRepository->deleteCoa($id);

            return $coaDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
