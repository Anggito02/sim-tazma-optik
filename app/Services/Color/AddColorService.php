<?php

namespace App\Services\Color;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ColorDTO;

use App\Repositories\Color\AddColorRepository;

class AddColorService {
    public function __construct(
        private AddColorRepository $colorRepository
    ) {}

    /**
     * Add color
     * @param Request $request
     * @return ColorDTO
     */
    public function addColor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'color_name' => 'required|unique:colors,color_name',
            ]);

            $colorDTO = new ColorDTO(
                null,
                $request->color_name,
            );

            $colorDTO = $this->colorRepository->addColor($colorDTO);

            return $colorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
