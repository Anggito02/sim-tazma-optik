<?php

namespace App\Services\LensCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\LensCategoryDTO;

use App\Repositories\LensCategory\DeleteLensCategoryRepository;

class DeleteLensCategoryService {
    public function __construct(
        private DeleteLensCategoryRepository $lensCategoryRepository
    )
    {}

    /**
     * Delete lens category
     * @param Request $request
     * @return LensCategoryDTO
     */
    public function deleteLensCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:lens_categories,id',
            ]);

            $id = $request->id;

            $lensCategoryDTO = $this->lensCategoryRepository->deleteLensCategory($id);

            return $lensCategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
