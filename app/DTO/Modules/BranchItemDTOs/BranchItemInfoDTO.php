<?php

namespace App\DTO\Modules\BranchItemDTOs;

class BranchItemInfoDTO {
    public function __construct(
        public int $id,

        public int $item_id,
        public string $jenis_item,
        public string $kode_item,
        public int $stok_global,

        public int $branch_id,
        public string $kode_branch,
        public string $nama_branch,

        public int $stok_branch,
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getJenisItem(): string {
        return $this->jenis_item;
    }

    public function getKodeItem(): string {
        return $this->kode_item;
    }

    public function getStokGlobal(): int {
        return $this->stok_global;
    }

    public function getBranchId(): int {
        return $this->branch_id;
    }

    public function getKodeBranch(): string {
        return $this->kode_branch;
    }

    public function getNamaBranch(): string {
        return $this->nama_branch;
    }

    public function getStokBranch(): int {
        return $this->stok_branch;
    }

    public function setStokBranch(int $stok_branch): void {
        $this->stok_branch = $stok_branch;
    }
}

?>
