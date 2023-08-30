<?php

namespace App\DTO;

class VendorDTO {
    public function __construct(
        public ?int $id,
        public string $kode_vendor,
        public string $npwp_vendor,
        public string $nama_vendor,
        public string $alamat_vendor,
        public string $init_date_supply,
        public ?string $last_date_supply,
        public string $pic_vendor,
        public string $no_telp_vendor,
        public string $no_telp_pic,
        public ?bool $status_blacklist = false,

    )
    {}

    public function getKodeVendor(): string {
        return $this->kode_vendor;
    }

    public function setKodeVendor(string $kode_vendor): void {
        $this->kode_vendor = $kode_vendor;
    }

    public function getNpwpVendor(): string {
        return $this->npwp_vendor;
    }

    public function setNpwpVendor(string $npwp_vendor): void {
        $this->npwp_vendor = $npwp_vendor;
    }

    public function getNamaVendor(): string {
        return $this->nama_vendor;
    }

    public function setNamaVendor(string $nama_vendor): void {
        $this->nama_vendor = $nama_vendor;
    }

    public function getAlamatVendor(): string {
        return $this->alamat_vendor;
    }

    public function setAlamatVendor(string $alamat_vendor): void {
        $this->alamat_vendor = $alamat_vendor;
    }

    public function getInitDateSupply(): string {
        return $this->init_date_supply;
    }

    public function setInitDateSupply(string $init_date_supply): void {
        $this->init_date_supply = $init_date_supply;
    }

    public function getLastDateSupply(): string {
        return $this->last_date_supply;
    }

    public function setLastDateSupply(string $last_date_supply): void {
        $this->last_date_supply = $last_date_supply;
    }

    public function getPicVendor(): string {
        return $this->pic_vendor;
    }

    public function setPicVendor(string $pic_vendor): void {
        $this->pic_vendor = $pic_vendor;
    }

    public function getNoTelpVendor(): string {
        return $this->no_telp_vendor;
    }

    public function setNoTelpVendor(string $no_telp_vendor): void {
        $this->no_telp_vendor = $no_telp_vendor;
    }

    public function getNoTelpPic(): string {
        return $this->no_telp_pic;
    }

    public function setNoTelpPic(string $no_telp_pic): void {
        $this->no_telp_pic = $no_telp_pic;
    }

    public function getStatusBlacklist(): bool {
        return $this->status_blacklist;
    }

    public function setStatusBlacklist(bool $status_blacklist): void {
        $this->status_blacklist = $status_blacklist;
    }
}

?>
