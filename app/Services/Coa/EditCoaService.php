<?php

namespace App\Services\Coa;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CoaDTO;

use App\Repositories\Coa\EditCoaRepository;

class EditCoaService {
    public function __construct(
        private EditCoaRepository $coaRepository
    ) {}

    /**
     * Edit coa
     * @param Request $request
     * @return CoaDTO
     */
    public function editCoa(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
                'kode_coa' => 'required',
                'deskripsi' => 'required',
                'kategori' => 'required',
            ]);

            $coaDTO = new CoaDTO(
                $request->id,
                $request->kode_coa,
                $request->deskripsi,
                $request->kategori,
            );

            $coaDTO = $this->coaRepository->editCoa($coaDTO);

            return $coaDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
