<?php

namespace App\Repositories\Category;

use Exception;

use App\DTO\CategoryDTO;
use App\Models\Category;

class AddCategoryRepository {
    /**
     * Add  category
     * @param CategoryDTO $CategoryDTO
     * @return CategoryDTO
     */
    public function addCategory(CategoryDTO $CategoryDTO) {
        try {
            $Category = new Category();
            $Category->nama_kategori = $CategoryDTO->nama_kategori;
            $Category->save();

            return $Category;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>
