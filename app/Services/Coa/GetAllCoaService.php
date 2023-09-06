<?php

namespace App\Services\Coa;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CoaDTO;

use App\Repositories\Coa\GetAllCoaRepository;

class GetAllCoaService {
    public function __construct(
        private GetAllCoaRepository $coaRepository
    ) {}

    /**
     * Get all coa
     * @return CoaDTO
     */
    public function getAllCoa(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $coaDTO = $this->coaRepository->getAllCoa($request->page, $request->limit);

            return $coaDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
