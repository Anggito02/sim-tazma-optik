<?php

namespace App\Services\FrameCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\FrameCategoryDTO;

use App\Repositories\FrameCategory\EditFrameCategoryRepository;

class EditFrameCategoryService {
    public function __construct(
        private EditFrameCategoryRepository $frameCategoryRepository
    )
    {}

    /**
     * Edit frame category
     * @param Request $request
     * @return FrameCategoryDTO
     */
    public function editFrameCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
                'nama_kategori' => 'required',
            ]);

            $frameCategoryDTO = new FrameCategoryDTO(
                $request->id,
                $request->nama_kategori,
            );

            $result = $this->frameCategoryRepository->editFrameCategory($frameCategoryDTO);

            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
