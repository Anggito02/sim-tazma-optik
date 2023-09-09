<?php

namespace App\Services\Color;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ColorDTO;

use App\Repositories\Color\GetColorRepository;

class GetColorService {
    public function __construct(
        private GetColorRepository $colorRepository
    ) {}

    /**
     * Get color
     * @param Request $request
     * @return ColorDTO
     */
    public function getColor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:colors,id',
            ]);

            $colorDTO = new ColorDTO(
                $request->id,
                null,
            );

            $colorDTO = $this->colorRepository->getColor($colorDTO->id);

            return $colorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
