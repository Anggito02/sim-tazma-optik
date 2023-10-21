<?php

namespace App\Services\FrameCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\FrameCategoryDTO;

use App\Repositories\FrameCategory\GetAllFrameCategoryRepository;

class GetAllFrameCategoryService {
    public function __construct(
        private GetAllFrameCategoryRepository $frameCategoryRepository
    )
    {}

    /**
     * Get all frame category
     * @param Request $request
     * @return FrameCategoryDTO
     */
    public function getAllFrameCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required|gt:0',
                'limit' => 'required|gt:0',
            ]);

            $frameCategoryDTO = $this->frameCategoryRepository->getAllFrameCategory($request->page, $request->limit);

            return $frameCategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
