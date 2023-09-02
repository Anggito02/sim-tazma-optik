<?php

namespace App\Repositories\FrameCategory;

use Exception;

use App\DTO\FrameCategoryDTO;
use App\Models\FrameCategory;

class EditFrameCategoryRepository {
    /**
     * Edit frame category
     * @param FrameCategoryDTO $frameCategoryDTO
     * @return FrameCategoryDTO
     */
    public function editFrameCategory(FrameCategoryDTO $frameCategoryDTO) {
        try {
            $frameCategory = FrameCategory::find($frameCategoryDTO->id);
            $frameCategory->nama_kategori = $frameCategoryDTO->nama_kategori;
            $frameCategory->save();

            return $frameCategory;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
