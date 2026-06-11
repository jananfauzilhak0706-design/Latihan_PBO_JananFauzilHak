<?php
class TiketIMAX extends Tiket {
    // Properti tambahan khusus IMAX bisa ditaruh di sini (misal: $kacamata_3d_id)

    // 1. Wajib implementasi hitungTotalHarga
    public function hitungTotalHarga() {
        // Logika hitung harga dasar * jumlah kursi + biaya tambahan IMAX
    }

    // 2. Wajib implementasi tampilkanInfoFasilitas
    public function tampilkanInfoFasilitas() {
        // Logika untuk menampilkan tipe audio premium, kacamata 3D, dll
    }
}

// Pastikan file abstract class Tiket sudah disertakan
require_once 'Tiket.php';

// ==============================================================================================
// 1. SUBCLASS: TiketRegular
// ==============================================================================================
class TiketRegular extends Tiket {
    // Properti tambahan spesifik
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($dataRow) {
        // Memanggil constructor milik class Tiket (Induk) untuk memetakan atribut global
        parent::__construct($dataRow);
        
        // Memetakan properti spesifik dari kolom database
        $this->tipeAudio   = $dataRow['tipe_audio'];
        $this->lokasiBaris = $dataRow['lokasi_baris'];
    }

    // Mengimplementasikan metode abstrak hitungTotalHarga
    public function hitungTotalHarga() {
        // Studio Regular tidak memiliki biaya tambahan khusus
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    // Mengimplementasikan metode abstrak tampilkanInfoFasilitas
    public function tampilkanInfoFasilitas() {
        echo "--- Fasilitas Studio Regular ---<br>";
        echo "Tipe Audio     : " . ($this->tipeAudio ?? 'Standard') . "<br>";
        echo "Lokasi Baris   : " . ($this->lokasiBaris ?? '-') . "<br>";
    }
}

// ==============================================================================================
// 2. SUBCLASS: TiketIMAX
// ==============================================================================================
class TiketIMAX extends Tiket {
    // Properti tambahan spesifik
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($dataRow) {
        parent::__construct($dataRow);
        
        $this->kacamata3dId   = $dataRow['kacamata_3d_id'];
        $this->efekGerakFitur = $dataRow['efek_gerak_fitur'];
    }

    // Mengimplementasikan metode abstrak hitungTotalHarga
    public function hitungTotalHarga() {
        // Contoh: Studio IMAX memiliki tambahan biaya teknologi sebesar Rp 25.000 per kursi
        $biayaTambahanIMAX = 25000;
        return ($this->hargaDasarTiket + $biayaTambahanIMAX) * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        echo "--- Fasilitas Studio IMAX ---<br>";
        echo "ID Kacamata 3D : " . ($this->kacamata3dId ?? 'Tidak Menggunakan 3D') . "<br>";
        echo "Fitur Efek Gerak: " . ($this->efekGerakFitur ?? 'Standard Motion') . "<br>";
    }
}

// ==============================================================================================
// 3. SUBCLASS: TiketVelvet
// ==============================================================================================
class TiketVelvet extends Tiket {
    // Properti tambahan spesifik
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($dataRow) {
        parent::__construct($dataRow);
        
        $this->bantalSelimutPack = $dataRow['bantal_selimut_pack'];
        $this->layananButler     = $dataRow['layanan_butler'];
    }

    // Mengimplementasikan metode abstrak hitungTotalHarga
    public function hitungTotalHarga() {
        // Contoh: Studio Velvet memiliki tambahan biaya layanan premium sebesar Rp 50.000 per kursi
        $biayaLayananPremium = 50000;
        return ($this->hargaDasarTiket + $biayaLayananPremium) * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        echo "--- Fasilitas Studio Velvet ---<br>";
        echo "Paket Kenyamanan: " . ($this->bantalSelimutPack ?? 'Standard Pillow') . "<br>";
        echo "Layanan Butler  : " . ($this->layananButler ?? 'Tidak Aktif') . "<br>";
    }
}