<?php

// Menggunakan kata kunci 'abstract' sebagai cetak biru (blueprint) utama
abstract class Tiket {
    
    // Properti Terenkapsulasi (protected): Hanya bisa diakses kelas ini dan turunannya
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket; // Menggunakan camelCase sesuai instruksi

    /**
     * Constructor untuk memetakan (mapping) nilai properti dari kolom tabel database
     * @param array $dataRow - Array asosiatif hasil fetch_assoc() dari database
     */
    public function __construct($dataRow) {
        $this->id_tiket        = $dataRow['id_tiket'];
        $this->nama_film       = $dataRow['nama_film'];
        $this->jadwal_tayang   = $dataRow['jadwal_tayang'];
        $this->jumlah_kursi    = $dataRow['jumlah_kursi'];
        
        // Memetakan dari nama kolom database 'harga_dasar_tiket' ke properti '$hargaDasarTiket'
        $this->hargaDasarTiket = $dataRow['harga_dasar_tiket'];
    }

    /**
     * METODE ABSTRAK (Tanpa Isi/Body)
     * Wajib dideklarasikan ulang dan diisi logikanya di dalam kelas anak (Subclass)
     */
    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();

    /**
     * Metode Reguler (Opsional)
     * Untuk menampilkan informasi umum yang dimiliki oleh semua jenis studio
     */
    public function infoDasar() {
        echo "ID Tiket      : " . $this->id_tiket . "<br>";
        echo "Nama Film     : " . $this->nama_film . "<br>";
        echo "Jadwal Tayang : " . $this->jadwal_tayang . "<br>";
        echo "Jumlah Kursi  : " . $this->jumlah_kursi . " Kursi<br>";
        echo "Harga Dasar   : Rp " . number_format($this->hargaDasarTiket, 0, ',', '.') . "<br>";
    }
}