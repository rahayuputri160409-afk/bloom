<?php
include "koneksi.php";

// Menghitung pengunjung setiap halaman dibuka atau di-refresh
mysqli_query($conn, "UPDATE pengunjung SET jumlah = jumlah + 1 WHERE id = 1");

// Mengambil jumlah pengunjung
$result = mysqli_query($conn, "SELECT jumlah FROM pengunjung WHERE id = 1");
$pengunjung = mysqli_fetch_assoc($result)['jumlah'];

// Mengambil data testimoni
$data = mysqli_query($conn, "SELECT * FROM testimoni ORDER BY id DESC");
$jumlah_testimoni = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM testimoni"));
?>


<!-- Daftar Pengunjung -->  //s3b3lum profil
<div class="container pb-4">
    <div class="row g-3 text-center">

        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h4>Daftar Pengunjung</h4>
                <h2><?= $pengunjung ?></h2>
                <p class="mb-0">Total kunjungan website</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h4>Jumlah Testimoni</h4>
                <h2><?= $jumlah_testimoni ?></h2>
                <p class="mb-0">Testimoni pengunjung</p>
            </div>
        </div>

    </div>
</div>

<!-- Jumlah -->

$jumlah_testimoni = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM testimoni")
);

// setelah home misal
$jumlah_testimoni = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM testimoni")
);