<?php

namespace App\Services\Index;

use Exception;
use Illuminate\Http\Request;

use App\DTO\IndexDTO;

use App\Repositories\Index\GetIndexRepository;

class GetIndexService {
    public function __construct(
        private GetIndexRepository $indexRepository
    ) {}

    /**
     * Get index
     * @param Request $request
     * @return IndexDTO
     */
    public function getIndex(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:indices,id',
            ]);

            $indexDTO = new IndexDTO(
                $request->id,
                null,
            );

            $indexDTO = $this->indexRepository->getIndex($indexDTO->id);

            return $indexDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
