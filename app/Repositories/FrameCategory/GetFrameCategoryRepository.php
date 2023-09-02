<?php

namespace App\Repositories\FrameCategory;

use Exception;

use App\DTO\FrameCategoryDTO;
use App\Models\FrameCategory;

class GetFrameCategoryRepository {
    /**
     * Get frame category
     * @param int $id
     * @return FrameCategoryDTO
     */
    public function getFrameCategory(int $id) {
        try {
            $frameCategory = FrameCategory::find($id);

            return $frameCategory;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
