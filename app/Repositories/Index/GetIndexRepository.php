<?php

namespace App\Repositories\Index;

use Exception;

use App\DTO\IndexDTO;
use App\Models\Index;

class GetIndexRepository {
    /**
     * Get index
     * @param int $id
     * @return IndexDTO
     */
    public function getIndex(int $id) {
        try {
            $index = Index::find($id);

            $indexDTO = new IndexDTO(
                $index->id,
                $index->value,
            );

            return $indexDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>
