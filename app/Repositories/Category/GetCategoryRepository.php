<?php

namespace App\Repositories\Category;

use Exception;

use App\DTO\CategoryDTO;
use App\Models\Category;

class GetCategoryRepository {
    /**
     * Get  category
     * @param int $id
     * @return CategoryDTO
     */
    public function getCategory(int $id) {
        try {
            $Category = Category::find($id);

            return $Category;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
