<?php

namespace App\Services\LensCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\LensCategoryDTO;

use App\Repositories\LensCategory\EditLensCategoryRepository;

class EditLensCategoryService {
    public function __construct(
        private EditLensCategoryRepository $lensCategoryRepository
    )
    {}

    /**
     * Edit lens category
     * @param Request $request
     * @return LensCategoryDTO
     */
    public function editLensCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
                'nama_kategori' => 'required',
            ]);

            $lensCategoryDTO = new LensCategoryDTO(
                $request->id,
                $request->nama_kategori,
            );

            $lensCategoryDTO = $this->lensCategoryRepository->editLensCategory($lensCategoryDTO);

            return $lensCategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
