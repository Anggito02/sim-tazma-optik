<?php

namespace App\Repositories\FrameCategory;

use Exception;

use App\DTO\FrameCategoryDTO;
use App\Models\FrameCategory;

class AddFrameCategoryRepository {
    /**
     * Add frame category
     * @param FrameCategoryDTO $frameCategoryDTO
     * @return FrameCategoryDTO
     */
    public function addFrameCategory(FrameCategoryDTO $frameCategoryDTO) {
        try {
            $frameCategory = new FrameCategory();
            $frameCategory->nama_kategori = $frameCategoryDTO->nama_kategori;
            $frameCategory->save();

            return $frameCategory;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>
