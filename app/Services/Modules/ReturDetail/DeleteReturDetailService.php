<?php

namespace App\Services\Modules\ReturDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\ReturDetail\DeleteReturDetailRepository;

class DeleteReturDetailService {
    public function __construct(
        private DeleteReturDetailRepository $deleteReturDetailRepository,
    )
    {}

    /**
     * Delete retur detail
     * @param Request $request
     * @return bool
     */
    public function deleteReturDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:retur_details,id',
            ]);

            $returDetail = $this->deleteReturDetailRepository->deleteReturDetail($request->id);

            return $returDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
