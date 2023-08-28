<?php

namespace App\Repositories\Color;

use Exception;

use App\DTO\ColorDTO;
use App\Models\Color;

class GetAllColorRepository {
    /**
     * Get all color
     * @return ColorDTO
     */
    public function getAllColor(int $page, int $limit) {
        try {
            $colors = Color::paginate($limit, ['*'], 'page', $page);

            $colorDTOs = [];
            foreach ($colors as $color) {
                $colorDTO = new ColorDTO(
                    $color->id,
                    $color->color_name,
                );

                array_push($colorDTOs, $colorDTO);
            }

            return $colorDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
