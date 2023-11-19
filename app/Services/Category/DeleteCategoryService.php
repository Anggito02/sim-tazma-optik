<?php

namespace App\Services\Category;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CategoryDTO;

use App\Repositories\Category\DeleteCategoryRepository;

class DeleteCategoryService {
    public function __construct(
        private DeleteCategoryRepository $CategoryRepository
    )
    {}

    /**
     * Delete  category
     * @param Request $request
     * @return CategoryDTO
     */
    public function deleteCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:_categories,id',
            ]);

            $id = $request->id;

            $CategoryDTO = $this->CategoryRepository->deleteCategory($id);

            return $CategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
