<?php

namespace App\Repositories\Index;

use Exception;

use App\DTO\IndexDTO;
use App\Models\Index;

class DeleteIndexRepository {
    /**
     * Delete index
     * @param IndexDTO $indexDTO
     * @return IndexDTO
     */
    public function deleteIndex(IndexDTO $indexDTO) {
        try {
            $index = Index::find($indexDTO->id);
            $index->delete();

            return $index;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
