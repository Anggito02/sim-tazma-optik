<?php

namespace App\Repositories\Category;

use Exception;

use App\DTO\CategoryDTO;
use App\Models\Category;

class EditCategoryRepository {
    /**
     * Edit  category
     * @param CategoryDTO $CategoryDTO
     * @return CategoryDTO
     */
    public function editCategory(CategoryDTO $CategoryDTO) {
        try {
            $Category = Category::find($CategoryDTO->id);
            $Category->nama_kategori = $CategoryDTO->nama_kategori;
            $Category->save();

            return $Category;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
