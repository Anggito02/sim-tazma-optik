<?php

namespace App\Services\Category;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CategoryDTO;

use App\Repositories\Category\GetAllCategoryRepository;

class GetAllCategoryService {
    public function __construct(
        private GetAllCategoryRepository $CategoryRepository
    )
    {}

    /**
     * Get all  category
     * @param Request $request
     * @return CategoryDTO
     */
    public function getAllCategory(Request $request) {
        try {
            $CategoryDTO = $this->CategoryRepository->getAllCategory($request->page, $request->limit);

            return $CategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
