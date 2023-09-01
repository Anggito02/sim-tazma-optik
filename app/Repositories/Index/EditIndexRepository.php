<?php

namespace App\Repositories\Index;

use Exception;

use App\DTO\IndexDTO;
use App\Models\Index;

class EditIndexRepository {
    /**
     * Edit index
     * @param IndexDTO $indexDTO
     * @return IndexDTO
     */
    public function editIndex(IndexDTO $indexDTO) {
        try {
            $index = Index::find($indexDTO->id);
            $index->value = $indexDTO->value;
            $index->save();

            return $index;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
