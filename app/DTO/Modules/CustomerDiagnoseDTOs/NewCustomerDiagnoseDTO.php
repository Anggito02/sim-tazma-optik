<?php

namespace App\DTO\Modules\CustomerDiagnoseDTOs;

class NewCustomerDiagnoseDTO {
    public function __construct(
        public string $tanggal_diagnosa,
        public string $keluhan,

        public ?string $visus_tanpa_koreksi_R,
        public ?string $visus_tanpa_koreksi_L,

        public ?string $oculus_dextra_sph_R,
        public ?string $oculus_dextra_cyl_R,
        public ?string $axis_R,
        public ?string $oculus_dextra_add_R,
        public ?string $oculus_dextra_visus_R,

        public ?string $oculus_sinistra_sph_L,
        public ?string $oculus_sinistra_cyl_L,
        public ?string $axis_L,
        public ?string $oculus_sinistra_add_L,
        public ?string $oculus_sinistra_visus_L,
        public ?string $PD,

        public ?string $diagnosa,
        public ?string $catatan,

        // Foreign Key
        // Customer
        public int $customer_id,
    )
    {}

    public function setTanggalDiagnosa(string $tanggal_diagnosa): void {
        $this->tanggal_diagnosa = $tanggal_diagnosa;
    }

    public function setKeluhan(string $keluhan): void {
        $this->keluhan = $keluhan;
    }

    public function setVisusTanpaKoreksiR(?string $visus_tanpa_koreksi_R): void {
        $this->visus_tanpa_koreksi_R = $visus_tanpa_koreksi_R;
    }

    public function setVisusTanpaKoreksiL(?string $visus_tanpa_koreksi_L): void {
        $this->visus_tanpa_koreksi_L = $visus_tanpa_koreksi_L;
    }

    public function setOculusDextraSphR(?string $oculus_dextra_sph_R): void {
        $this->oculus_dextra_sph_R = $oculus_dextra_sph_R;
    }

    public function setOculusDextraCylR(?string $oculus_dextra_cyl_R): void {
        $this->oculus_dextra_cyl_R = $oculus_dextra_cyl_R;
    }

    public function setAxisR(?string $axis_R): void {
        $this->axis_R = $axis_R;
    }

    public function setOculusDextraAddR(?string $oculus_dextra_add_R): void {
        $this->oculus_dextra_add_R = $oculus_dextra_add_R;
    }

    public function setOculusDextraVisusR(?string $oculus_dextra_visus_R): void {
        $this->oculus_dextra_visus_R = $oculus_dextra_visus_R;
    }

    public function setOculusSinistraSphL(?string $oculus_sinistra_sph_L): void {
        $this->oculus_sinistra_sph_L = $oculus_sinistra_sph_L;
    }

    public function setOculusSinistraCylL(?string $oculus_sinistra_cyl_L): void {
        $this->oculus_sinistra_cyl_L = $oculus_sinistra_cyl_L;
    }

    public function setAxisL(?string $axis_L): void {
        $this->axis_L = $axis_L;
    }

    public function setOculusSinistraAddL(?string $oculus_sinistra_add_L): void {
        $this->oculus_sinistra_add_L = $oculus_sinistra_add_L;
    }

    public function setOculusSinistraVisusL(?string $oculus_sinistra_visus_L): void {
        $this->oculus_sinistra_visus_L = $oculus_sinistra_visus_L;
    }

    public function setPD(?string $PD): void {
        $this->PD = $PD;
    }

    public function setDiagnosa(?string $diagnosa): void {
        $this->diagnosa = $diagnosa;
    }

    public function setCatatan(?string $catatan): void {
        $this->catatan = $catatan;
    }

    public function setCustomerId(int $customer_id): void {
        $this->customer_id = $customer_id;
    }

    public function getTanggalDiagnosa(): string {
        return $this->tanggal_diagnosa;
    }

    public function getKeluhan(): string {
        return $this->keluhan;
    }

    public function getVisusTanpaKoreksiR(): ?string {
        return $this->visus_tanpa_koreksi_R;
    }

    public function getVisusTanpaKoreksiL(): ?string {
        return $this->visus_tanpa_koreksi_L;
    }

    public function getOculusDextraSphR(): ?string {
        return $this->oculus_dextra_sph_R;
    }

    public function getOculusDextraCylR(): ?string {
        return $this->oculus_dextra_cyl_R;
    }

    public function getAxisR(): ?string {
        return $this->axis_R;
    }

    public function getOculusDextraAddR(): ?string {
        return $this->oculus_dextra_add_R;
    }

    public function getOculusDextraVisusR(): ?string {
        return $this->oculus_dextra_visus_R;
    }

    public function getOculusSinistraSphL(): ?string {
        return $this->oculus_sinistra_sph_L;
    }

    public function getOculusSinistraCylL(): ?string {
        return $this->oculus_sinistra_cyl_L;
    }

    public function getAxisL(): ?string {
        return $this->axis_L;
    }

    public function getOculusSinistraAddL(): ?string {
        return $this->oculus_sinistra_add_L;
    }

    public function getOculusSinistraVisusL(): ?string {
        return $this->oculus_sinistra_visus_L;
    }

    public function getPD(): ?string {
        return $this->PD;
    }

    public function getDiagnosa(): ?string {
        return $this->diagnosa;
    }

    public function getCatatan(): ?string {
        return $this->catatan;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }
}

?>
