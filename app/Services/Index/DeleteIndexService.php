<?php

namespace App\Services\Index;

use Exception;
use Illuminate\Http\Request;

use App\DTO\IndexDTO;

use App\Repositories\Index\DeleteIndexRepository;

class DeleteIndexService {
    public function __construct(
        private DeleteIndexRepository $indexRepository
    ) {}

    /**
     * Delete index
     * @param Request $request
     * @return IndexDTO
     */
    public function deleteIndex(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:indices,id',
            ]);

            $indexDTO = new IndexDTO(
                $request->id,
                null,
            );

            $indexDTO = $this->indexRepository->deleteIndex($indexDTO);

            return $indexDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
