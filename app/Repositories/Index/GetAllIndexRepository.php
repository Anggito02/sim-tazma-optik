<?php

namespace App\Repositories\Index;

use Exception;

use App\DTO\IndexDTO;
use App\Models\Index;

class GetAllIndexRepository {
    /**
     * Get all index
     * @param int $page
     * @param int $limit
     * @return IndexDTO
     */
    public function getAllIndex(int $page, int $limit) {
        try {
            $indexes = Index::paginate($limit, ['*'], 'page', $page);

            $indexDTOs = [];
            foreach ($indexes as $index) {
                $indexDTO = new IndexDTO(
                    $index->id,
                    $index->value,
                );

                array_push($indexDTOs, $indexDTO);
            }

            return $indexDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
