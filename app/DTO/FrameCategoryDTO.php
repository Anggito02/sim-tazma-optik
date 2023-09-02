<?php

namespace App\DTO;

class FrameCategoryDTO {
    public function __construct(
        public ?int $id,
        public string $nama_kategori,
    )
    {}
}

?>
