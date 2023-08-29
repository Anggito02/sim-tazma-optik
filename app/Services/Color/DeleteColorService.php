<?php

namespace App\Services\Color;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ColorDTO;

use App\Repositories\Color\DeleteColorRepository;

class DeleteColorService {
    public function __construct(
        private DeleteColorRepository $colorRepository
    ) {}

    /**
     * Delete color
     * @param Request $request
     * @return ColorDTO
     */
    public function deleteColor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $colorDTO = new ColorDTO(
                $request->id,
                null,
            );

            $colorDTO = $this->colorRepository->deleteColor($colorDTO);

            return $colorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
