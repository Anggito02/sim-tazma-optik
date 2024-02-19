<?php

namespace App\Repositories\Color;

use Exception;

use App\DTO\ColorDTO;
use App\Models\Color;

class AddColorRepository {
    /**
     * Add color
     * @param ColorDTO $colorDTO
     * @return ColorDTO
     */
    public function addColor(ColorDTO $colorDTO) {
        try {
            $newColor = new Color();
            $newColor->color_name = $colorDTO->color_name;
            $newColor->save();

            return $newColor;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
