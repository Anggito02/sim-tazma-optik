<?php

namespace App\Repositories\Category;

use Exception;

use App\DTO\CategoryDTO;
use App\Models\Category;

class DeleteCategoryRepository {
    /**
     * Delete  category
     * @param int $id
     * @return CategoryDTO
     */
    public function deleteCategory(int $id) {
        try {
            $Category = Category::find($id);
            $Category->delete();

            return $Category;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
