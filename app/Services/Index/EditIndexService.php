<?php

namespace App\Services\Index;

use Exception;
use Illuminate\Http\Request;

use App\DTO\IndexDTO;

use App\Repositories\Index\EditIndexRepository;

class EditIndexService {
    public function __construct(
        private EditIndexRepository $indexRepository
    ) {}

    /**
     * Edit index
     * @param Request $request
     * @return IndexDTO
     */
    public function editIndex(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:indices,id',
                'value' => 'required',
            ]);

            $indexDTO = new IndexDTO(
                $request->id,
                $request->value,
            );

            $indexDTO = $this->indexRepository->editIndex($indexDTO);

            return $indexDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
