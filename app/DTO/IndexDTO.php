<?php

namespace App\DTO;

class IndexDTO {
    public function __construct(
        public ?int $id,
        public ?float $value,
    )
    {}

    public function getValue(): float {
        return $this->value;
    }

    public function setValue(float $value): void {
        $this->value = $value;
    }
}

?>
