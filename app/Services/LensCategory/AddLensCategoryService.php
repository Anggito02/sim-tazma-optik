<?php

namespace App\Services\LensCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\LensCategoryDTO;

use App\Repositories\LensCategory\AddLensCategoryRepository;

class AddLensCategoryService {
    public function __construct(
        private AddLensCategoryRepository $lensCategoryRepository
    )
    {}

    /**
     * Add lens category
     * @param Request $request
     * @return LensCategoryDTO
     */
    public function addLensCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'nama_kategori' => 'required',
            ]);

            $lensCategoryDTO = new LensCategoryDTO(
                null,
                $request->nama_kategori,
            );

            $lensCategoryDTO = $this->lensCategoryRepository->addLensCategory($lensCategoryDTO);

            return $lensCategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
