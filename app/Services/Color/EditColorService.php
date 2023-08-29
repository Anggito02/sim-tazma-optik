<?php

namespace App\Services\Color;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ColorDTO;

use App\Repositories\Color\EditColorRepository;

class EditColorService {
    public function __construct(
        private EditColorRepository $colorRepository
    ) {}

    /**
     * Edit color
     * @param Request $request
     * @return ColorDTO
     */
    public function editColor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
                'color_name' => 'required',
            ]);

            $colorDTO = new ColorDTO(
                $request->id,
                $request->color_name,
            );

            $colorDTO = $this->colorRepository->editColor($colorDTO);

            return $colorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
