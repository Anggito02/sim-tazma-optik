<?php

namespace App\Services\Coa;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CoaDTO;

use App\Repositories\Coa\AddCoaRepository;

class AddCoaService {
    /**
     * Add coa
     * @param Request $request
     * @return CoaDTO
     */
    public function addCoa(Request $request) {
        try {
            // Validate request
            $request->validate([
                'kode_coa' => 'required|unique:coas,kode_coa',
                'deskripsi' => 'required',
                'kategori' => 'required',
            ]);

            $coaDTO = new CoaDTO(
                null,
                $request->kode_coa,
                $request->deskripsi,
                $request->kategori,
            );

            $addCoaRepository = new AddCoaRepository();
            $coa = $addCoaRepository->addCoa($coaDTO);

            return $coa;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
