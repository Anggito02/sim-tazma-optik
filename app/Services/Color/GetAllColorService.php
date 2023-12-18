<?php

namespace App\Services\Color;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ColorDTO;

use App\Repositories\Color\GetAllColorRepository;

class GetAllColorService {
    public function __construct(
        private GetAllColorRepository $colorRepository
    ) {}

    /**
     * Get all color
     * @return array
     */
    public function getAllColor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required|gt:0',
                'limit' => 'required|gt:0',
            ]);

            $colorDTO = $this->colorRepository->getAllColor($request->page, $request->limit);

            return $colorDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
