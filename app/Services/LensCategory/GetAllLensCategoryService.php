<?php

namespace App\Services\LensCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\LensCategoryDTO;

use App\Repositories\LensCategory\GetAllLensCategoryRepository;

class GetAllLensCategoryService {
    public function __construct(
        private GetAllLensCategoryRepository $lensCategoryRepository
    )
    {}

    /**
     * Get all lens category
     * @return array
     */
    public function getAllLensCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $lensCategoryDTO = $this->lensCategoryRepository->getAllLensCategory($request->page, $request->limit);

            return $lensCategoryDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}

?>
