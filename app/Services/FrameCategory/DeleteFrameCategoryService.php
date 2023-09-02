<?php

namespace App\Services\FrameCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\FrameCategoryDTO;

use App\Repositories\FrameCategory\DeleteFrameCategoryRepository;

class DeleteFrameCategoryService {
    public function __construct(
        private DeleteFrameCategoryRepository $frameCategoryRepository
    )
    {}

    /**
     * Delete frame category
     * @param Request $request
     * @return FrameCategoryDTO
     */
    public function deleteFrameCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $frameCategoryDTO = $this->frameCategoryRepository->deleteFrameCategory($id);

            return $frameCategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
