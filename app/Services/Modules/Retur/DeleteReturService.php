<?php

namespace App\Services\Modules\Retur;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\Retur\DeleteReturRepository;

class DeleteReturService {
    public function __construct(
        private DeleteReturRepository $returRepository
    ) {}

    /**
     * Delete retur
     * @param Request $request
     * @return bool
     */
    public function deleteRetur(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:returs,id',
            ]);

            $retur = $this->returRepository->deleteRetur($request->id);

            return $retur;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
