<?php

namespace App\Services\Category;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CategoryDTO;

use App\Repositories\Category\GetCategoryRepository;

class GetCategoryService {
    public function __construct(
        private GetCategoryRepository $CategoryRepository
    )
    {}

    /**
     * Get  category
     * @param Request $request
     * @return CategoryDTO
     */
    public function getCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:categories,id',
            ]);

            $id = $request->id;

            $CategoryDTO = $this->CategoryRepository->getCategory($id);

            return $CategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
