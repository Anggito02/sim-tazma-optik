<?php

namespace App\Services\FrameCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\FrameCategoryDTO;

use App\Repositories\FrameCategory\AddFrameCategoryRepository;

class AddFrameCategoryService {
    public function __construct(
        private AddFrameCategoryRepository $frameCategoryRepository
    )
    {}

    /**
     * Add frame category
     * @param Request $request
     * @return FrameCategoryDTO
     */
    public function addFrameCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'nama_kategori' => 'required|unique:frame_categories,nama_kategori',
            ]);

            $frameCategoryDTO = new FrameCategoryDTO(
                null,
                $request->nama_kategori,
            );

            $result = $this->frameCategoryRepository->addFrameCategory($frameCategoryDTO);

            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
