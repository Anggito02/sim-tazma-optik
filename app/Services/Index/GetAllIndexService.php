<?php

namespace App\Services\Index;

use Exception;
use Illuminate\Http\Request;

use App\DTO\IndexDTO;

use App\Repositories\Index\GetAllIndexRepository;

class GetAllIndexService {
    public function __construct(
        private GetAllIndexRepository $indexRepository
    ) {}

    /**
     * Get all index
     * @return array
     */
    public function getAllIndex(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required|gt:0',
                'limit' => 'required|gt:0',
            ]);

            $indexDTO = $this->indexRepository->getAllIndex($request->page, $request->limit);

            return $indexDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
