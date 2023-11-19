<?php

namespace App\Services\Category;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CategoryDTO;

use App\Repositories\Category\AddCategoryRepository;

class AddCategoryService {
    public function __construct(
        private AddCategoryRepository $CategoryRepository
    )
    {}

    /**
     * Add  category
     * @param Request $request
     * @return CategoryDTO
     */
    public function addCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'nama_kategori' => 'required|unique:_categories,nama_kategori',
            ]);

            $CategoryDTO = new CategoryDTO(
                null,
                $request->nama_kategori,
            );

            $result = $this->CategoryRepository->addCategory($CategoryDTO);

            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
