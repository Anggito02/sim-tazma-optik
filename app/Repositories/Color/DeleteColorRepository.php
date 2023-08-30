<?php

namespace App\Repositories\Color;

use Exception;

use App\DTO\ColorDTO;
use App\Models\Color;

class DeleteColorRepository {
    /**
     * Delete color
     * @param ColorDTO $colorDTO
     * @return ColorDTO
     */
    public function deleteColor(ColorDTO $colorDTO) {
        try {
            $color = Color::find($colorDTO->id);
            $color->delete();

            return $color;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
