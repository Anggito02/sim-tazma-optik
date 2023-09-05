<?php

namespace App\Services\FrameCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\FrameCategoryDTO;

use App\Repositories\FrameCategory\GetFrameCategoryRepository;

class GetFrameCategoryService {
    public function __construct(
        private GetFrameCategoryRepository $frameCategoryRepository
    )
    {}

    /**
     * Get frame category
     * @param Request $request
     * @return FrameCategoryDTO
     */
    public function getFrameCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:frame_categories,id',
            ]);

            $id = $request->id;

            $frameCategoryDTO = $this->frameCategoryRepository->getFrameCategory($id);

            return $frameCategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
