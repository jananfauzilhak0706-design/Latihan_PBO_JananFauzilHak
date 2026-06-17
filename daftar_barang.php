<?php
// 1. Memanggil koneksi database dan arsitektur OOP class Tiket
require_once 'koneksi.php';
require_once 'Tiket.php';
require_once 'TiketStudio.php';

class ControllerTiket extends Database {
    public function dapatkanTiketBerdasarkanStudio($jenisStudio) {
        // Mengamankan input string dari sql injection
        $jenisStudioClean = $this->conn->real_escape_string($jenisStudio);
        $query = "SELECT * FROM tabel_tiket WHERE jenis_studio = '$jenisStudioClean'";
        $result = $this->conn->query($query);
        
        $kumpulanObjek = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Instansiasi objek konkrit secara dinamis (Polimorfisme)
                if ($jenisStudio === 'Regular') {
                    $kumpulanObjek[] = new TiketRegular($row);
                } elseif ($jenisStudio === 'IMAX') {
                    $kumpulanObjek[] = new TiketIMAX($row);
                } elseif ($jenisStudio === 'Velvet') {
                    $kumpulanObjek[] = new TiketVelvet($row);
                }
            }
        }
        return $kumpulanObjek;
    }
}

// 2. Ambil data terkelompok menggunakan objek controller
$tiketController = new ControllerTiket();
$listRegular     = $tiketController->dapatkanTiketBerdasarkanStudio('Regular');
$listIMAX        = $tiketController->dapatkanTiketBerdasarkanStudio('IMAX');
$listVelvet      = $tiketController->dapatkanTiketBerdasarkanStudio('Velvet');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tiket Pesanan - TOKOKU</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { display: flex; height: 100vh; background-color: #f1f5f9; color: #1e293b; }
        
        /* --- SIDEBAR LOGIC STYLE --- */
        .sidebar { width: 260px; background-color: #0f172a; color: #fff; display: flex; flex-direction: column; }
        .sidebar .brand { padding: 24px 20px; text-align: center; font-size: 22px; font-weight: bold; background-color: #020617; letter-spacing: 1px; }
        .sidebar .brand span { color: #3b82f6; }
        .sidebar .menu { list-style: none; padding: 20px 0; flex-grow: 1; }
        .sidebar .menu li a { display: block; padding: 15px 25px; color: #94a3b8; text-decoration: none; font-size: 15px; border-left: 4px solid transparent; }
        .sidebar .menu li a:hover, .sidebar .menu li a.active { background-color: #1e293b; color: #fff; border-left-color: #3b82f6; }

        /* --- MAIN CONTENT & PANELS --- */
        .main-content { flex-grow: 1; display: flex; flex-direction: column; overflow-y: auto; }
        .header { background-color: #fff; padding: 20px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
        .content-body { padding: 40px; }
        
        .section-title { font-size: 20px; font-weight: bold; margin: 30px 0 15px 0; padding-bottom: 8px; border-bottom: 2px solid #cbd5e1; display: flex; align-items: center; gap: 10px; }
        .title-regular { color: #10b981; }
        .title-imax { color: #2563eb; }
        .title-velvet { color: #8b5cf6; }

        /* --- GRID AND TICKET CARD --- */
        .grid-tiket { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; }
        .card-tiket { background-color: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02); border-top: 4px solid #3b82f6; display: flex; flex-direction: column; justify-content: space-between; }
        
        .card-regular { border-top-color: #10b981; }
        .card-imax { border-top-color: #2563eb; }
        .card-velvet { border-top-color: #8b5cf6; }

        .info-block { font-size: 14px; line-height: 1.6; margin-bottom: 12px; }
        .info-block strong { color: #0f172a; }
        
        .fasilitas-box { background-color: #f8fafc; padding: 12px; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 13.5px; color: #475569; margin-bottom: 15px; }
        .harga-total { font-size: 16px; font-weight: bold; color: #0f172a; padding-top: 10px; border-top: 1px dashed #e2e8f0; display: flex; justify-content: space-between; }
        .harga-total span { color: #ef4444; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="brand">TOKO<span>KU</span></div>
        <ul class="menu">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="daftar_barang.php" class="active">📦 Daftar Barang</a></li>
            <li><a href="input_barang.php">➕ Input Barang</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header class="header">
            <h1>Daftar Tiket Penonton (Dipesan)</h1>
            <div style="font-weight: 600; color: #64748b;">Panel Tahap 6 View</div>
        </header>

        <div class="content-body">

            <div class="section-title title-regular">🍿 Studio Regular (Tarif Standar Murni)</div>
            <div class="grid-tiket">
                <?php foreach ($listRegular as $tiket): ?>
                    <div class="card-tiket card-regular">
                        <div class="info-block">
                            <?php $tiket->infoDasar(); ?>
                        </div>
                        <div class="fasilitas-box">
                            <?php $tiket->tampilkanInfoFasilitas(); ?>
                        </div>
                        <div class="harga-total">
                            Total Bayar: <span>Rp <?php echo number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="section-title title-imax">🎬 Studio IMAX (Surcharge Flat Teknologi)</div>
            <div class="grid-tiket">
                <?php foreach ($listIMAX as $tiket): ?>
                    <div class="card-tiket card-imax">
                        <div class="info-block">
                            <?php $tiket->infoDasar(); ?>
                        </div>
                        <div class="fasilitas-box">
                            <?php $tiket->tampilkanInfoFasilitas(); ?>
                        </div>
                        <div class="harga-total">
                            Total Bayar: <span>Rp <?php echo number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="section-title title-velvet">🛌 Studio Velvet (Surcharge Kelas Premium 50%)</div>
            <div class="grid-tiket">
                <?php foreach ($listVelvet as $tiket): ?>
                    <div class="card-tiket card-velvet">
                        <div class="info-block">
                            <?php $tiket->infoDasar(); ?>
                        </div>
                        <div class="fasilitas-box">
                            <?php $tiket->tampilkanInfoFasilitas(); ?>
                        </div>
                        <div class="harga-total">
                            Total Bayar: <span>Rp <?php echo number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </main>

</body>
</html>