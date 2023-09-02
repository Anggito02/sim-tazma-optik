<?php

namespace App\Services\Index;

use Exception;
use Illuminate\Http\Request;

use App\DTO\IndexDTO;

use App\Repositories\Index\AddIndexRepository;

class AddIndexService {
    public function __construct(
        private AddIndexRepository $indexRepository
    ) {}

    /**
     * Add index
     * @param Request $request
     * @return IndexDTO
     */
    public function addIndex(Request $request) {
        try {
            // Validate request
            $request->validate([
                'value' => 'required',
            ]);

            $indexDTO = new IndexDTO(
                null,
                $request->value,
            );

            $indexDTO = $this->indexRepository->addIndex($indexDTO);

            return $indexDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
