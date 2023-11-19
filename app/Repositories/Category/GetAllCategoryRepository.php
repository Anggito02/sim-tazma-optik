<?php

namespace App\Repositories\Category;

use Exception;

use App\DTO\CategoryDTO;
use App\Models\Category;

class GetAllCategoryRepository {
    /**
     * Get all  category
     * @param int $page
     * @param int $limit
     * @return CategoryDTO
     */
    public function getAllCategory(int $page, int $limit) {
        try {
            $Categories = Category::paginate($limit, ['*'], 'page', $page);

            $CategoryDTOs = [];

            foreach ($Categories as $Category) {
                $CategoryDTO = new CategoryDTO(
                    $Category->id,
                    $Category->nama_kategori
                );

                array_push($CategoryDTOs, $CategoryDTO);
            }

            return $CategoryDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
