<?php

namespace App\DTO;

class ColorDTO {
    public function __construct(
        public ?int $id,
        public ?string $color_name,
    )
    {}

    public function getColorName(): string {
        return $this->color_name;
    }

    public function setColorName(string $color_name): void {
        $this->color_name = $color_name;
    }
}

?>
