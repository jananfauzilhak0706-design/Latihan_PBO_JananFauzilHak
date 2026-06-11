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
