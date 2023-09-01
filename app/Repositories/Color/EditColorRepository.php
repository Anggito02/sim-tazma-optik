<?php

namespace App\Repositories\Color;

use Exception;

use App\DTO\ColorDTO;
use App\Models\Color;

class EditColorRepository {
    /**
     * Edit color
     * @param ColorDTO $colorDTO
     * @return ColorDTO
     */
    public function editColor(ColorDTO $colorDTO) {
        try {
            $color = Color::find($colorDTO->id);
            $color->color_name = $colorDTO->color_name;
            $color->save();

            return $color;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
