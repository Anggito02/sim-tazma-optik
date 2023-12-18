<?php

namespace App\DTO;

class CategoryDTO {
    public function __construct(
        public ?int $id,
        public string $nama_kategori,
    )
    {}
}

?>
