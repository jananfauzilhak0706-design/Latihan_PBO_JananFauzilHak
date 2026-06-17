<?php
// Pastikan file abstract class Tiket sudah disertakan
require_once 'Tiket.php';

// ==============================================================================================
// 1. SUBCLASS: TiketRegular
// ==============================================================================================
class TiketRegular extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($dataRow) {
        parent::__construct($dataRow);
        $this->tipeAudio   = $dataRow['tipe_audio'];
        $this->lokasiBaris = $dataRow['lokasi_baris'];
    }

    // OVERRIDING RUMUS REGULAR: Tarif standar murni
    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas() {
        echo "— Fasilitas Studio Regular —<br>";
        echo "Tipe Audio     : " . ($this->tipeAudio ?? 'Standard') . "<br>";
        echo "Lokasi Baris   : " . ($this->lokasiBaris ?? '-') . "<br>";
    }
}

// ==============================================================================================
// 2. SUBCLASS: TiketIMAX
// ==============================================================================================
class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($dataRow) {
        parent::__construct($dataRow);
        $this->kacamata3dId   = $dataRow['kacamata_3d_id'];
        $this->efekGerakFitur = $dataRow['efek_gerak_fitur'];
    }

    // OVERRIDING RUMUS IMAX: Ditambah biaya flat Rp 35.000
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        echo "— Fasilitas Studio IMAX —<br>";
        echo "ID Kacamata 3D : " . ($this->kacamata3dId ?? 'Tidak Menggunakan 3D') . "<br>";
        echo "Fitur Efek Gerak: " . ($this->efekGerakFitur ?? 'Standard Motion') . "<br>";
    }
}

// ==============================================================================================
// 3. SUBCLASS: TiketVelvet
// ==============================================================================================
class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($dataRow) {
        parent::__construct($dataRow);
        $this->bantalSelimutPack = $dataRow['bantal_selimut_pack'];
        $this->layananButler     = $dataRow['layanan_butler'];
    }

    // OVERRIDING RUMUS VELVET: Dikalikan 1.50 (Surcharge 50%)
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        echo "— Fasilitas Studio Velvet —<br>";
        echo "Paket Kenyamanan: " . ($this->bantalSelimutPack ?? 'Premium Pack') . "<br>";
        echo "Layanan Butler  : " . ($this->layananButler ?? 'Aktif') . "<br>";
    }
}