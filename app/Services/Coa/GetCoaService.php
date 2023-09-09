<?php

namespace App\Services\Coa;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CoaDTO;

use App\Repositories\Coa\GetCoaRepository;

class GetCoaService {
    public function __construct(
        private GetCoaRepository $coaRepository
    ) {}

    /**
     * Get coa
     * @param Request $request
     * @return CoaDTO
     */
    public function getCoa(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:coas,id',
            ]);

            $id = $request->id;

            $coaDTO = $this->coaRepository->getCoa($id);

            return $coaDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
