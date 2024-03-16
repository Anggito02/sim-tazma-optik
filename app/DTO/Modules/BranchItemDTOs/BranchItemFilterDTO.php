<?php

namespace App\DTO\Modules\BranchItemDTOs;

class BranchItemFilterDTO {
    public function __construct(
        private int $page,
        private int $limit,
        private ?int $branch_id,
        private ?string $jenis_item
    )
    {}

    public function getPage() {
        return $this->page;
    }

    public function getLimit() {
        return $this->limit;
    }

    public function getBranchId() {
        return $this->branch_id;
    }

    public function getJenisItem() {
        return $this->jenis_item;
    }

    public function setJenisItem(?string $jenis_item) {
        $this->jenis_item = $jenis_item;
    }

    public function setBranchId(?int $branch_id) {
        $this->branch_id = $branch_id;
    }

    public function setPage(int $page) {
        $this->page = $page;
    }

    public function setLimit(int $limit) {
        $this->limit = $limit;
    }
}
