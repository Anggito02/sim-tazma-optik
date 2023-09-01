<?php

namespace App\Repositories\Index;

use Exception;

use App\DTO\IndexDTO;
use App\Models\Index;

class AddIndexRepository {
    /**
     * Add index
     * @param IndexDTO $indexDTO
     * @return IndexDTO
     */
    public function addIndex(IndexDTO $indexDTO) {
        try {
            $index = new Index();
            $index->value = $indexDTO->value;
            $index->save();

            return $index;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
