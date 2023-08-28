<?php

namespace App\Repositories\Color;

use Exception;

use App\DTO\ColorDTO;
use App\Models\Color;

class GetColorRepository {
    /**
     * Get color
     * @param int $id
     * @return ColorDTO
     */
    public function getColor(int $id) {
        try {
            $color = Color::find($id);

            $colorDTO = new ColorDTO(
                $color->id,
                $color->color_name,
            );

            return $colorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
