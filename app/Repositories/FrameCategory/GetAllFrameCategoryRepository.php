<?php

namespace App\Repositories\FrameCategory;

use Exception;

use App\DTO\FrameCategoryDTO;
use App\Models\FrameCategory;

class GetAllFrameCategoryRepository {
    /**
     * Get all frame category
     * @param int $page
     * @param int $limit
     * @return FrameCategoryDTO
     */
    public function getAllFrameCategory(int $page, int $limit) {
        try {
            $frameCategories = FrameCategory::paginate($limit, ['*'], 'page', $page);

            $frameCategoryDTOs = [];

            foreach ($frameCategories as $frameCategory) {
                $frameCategoryDTO = new FrameCategoryDTO(
                    $frameCategory->id,
                    $frameCategory->nama_kategori
                );

                array_push($frameCategoryDTOs, $frameCategoryDTO);
            }

            return $frameCategoryDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
