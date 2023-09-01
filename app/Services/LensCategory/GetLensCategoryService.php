<?php

namespace App\Services\LensCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\LensCategoryDTO;

use App\Repositories\LensCategory\GetLensCategoryRepository;

class GetLensCategoryService {
    public function __construct(
        private GetLensCategoryRepository $lensCategoryRepository
    )
    {}

    /**
     * Get lens category
     * @param Request $request
     * @return LensCategoryDTO
     */
    public function getLensCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $lensCategoryDTO = $this->lensCategoryRepository->getLensCategory($id);

            return $lensCategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
