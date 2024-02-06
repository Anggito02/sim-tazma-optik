<?php

namespace App\Services\Category;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CategoryDTO;

use App\Repositories\Category\EditCategoryRepository;

class EditCategoryService {
    public function __construct(
        private EditCategoryRepository $CategoryRepository
    )
    {}

    /**
     * Edit  category
     * @param Request $request
     * @return CategoryDTO
     */
    public function editCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:categories,id',
                'nama_kategori' => 'required',
            ]);

            $CategoryDTO = new CategoryDTO(
                $request->id,
                $request->nama_kategori,
            );

            $result = $this->CategoryRepository->editCategory($CategoryDTO);

            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
