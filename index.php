
<?php
include "koneksi.php";
$data = mysqli_query($conn,"SELECT * FROM testimoni ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bloom Florist Course</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body { background:#fff0f5; }
        nav { background:#f4a6bd; }
        .pink { background:#f4a6bd; color:white; }
        
        
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="#">
            <img src="gambar/logo.png" width="45">
            Bloom Florist
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kursus">Kursus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimoni">Testimoni</a>
                </li>
            </ul>
        </div>

    </div>
</nav>


<!-- Home -->
<div class="container text-center py-5">
    <h1>Bloom Florist Course</h1>
    <p>Belajar merangkai bunga dengan mudah dan menyenangkan.</p>
    <a href="#kursus" class="btn pink">Lihat Kursus</a>
</div>

<!-- Profil -->
<div class="container py-5" id="profil">
    <div class="card p-4">
        <div class="row align-items-center">

            <div class="col-md-5">
                <img src="gambar/profil.jpg" class="img-fluid rounded">
            </div>

            <div class="col-md-7">
                <h2>Profil Bloom Florist</h2>
                <p>Bloom Florist Course adalah tempat belajar merangkai bunga untuk pemula hingga tingkat lanjut.</p>
                <p>Kami membantu peserta mengembangkan kreativitas dan keterampilan membuat berbagai rangkaian bunga.</p>
<!-- WhatsApp -->
                <button class="btn btn-success"
                        data-bs-toggle="modal" data-bs-target="#wa">
                    Hubungi Kami
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Popup WhatsApp -->
<div class="modal fade" id="wa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Hubungi Kami</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Hubungi kami melalui WhatsApp.
            </div>

            <div class="modal-footer">
                <a href="https://wa.me/6287894899413"
                class="btn btn-success">
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>

        <!-- Kursus -->
        <div class="container py-4" id="kursus">
            <h2 class="text-center">Pilihan Kursus</h2>

            <div class="row g-4">
                <?php
                $kursus = [
                    ["bunga1.jpg","Basic Florist","Dasar merangkai bunga."],
                    ["bunga4.jpg","Bouquet Class","Membuat buket bunga."],
                    ["bunga2.jpg","Flower Arrangement","Menata bunga."],
                    ["bunga3.jpg","Wedding Flower","Dekorasi bunga."]
                ];

                foreach($kursus as $k){
                ?>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <img src="gambar/<?= $k[0] ?>" class="card-img-top">
                            <div class="card-body">
                                <b><?= $k[1] ?></b>
                                <p><?= $k[2] ?></p>
                                <a href="https://wa.me/6287894899413"
                                class="btn btn-success">Daftar</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- Galeri -->
        <div class="container py-4" id="galeri">
            <h2 class="text-center">Galeri</h2>

            <div class="row g-3">
                <div class="col"><img src="gambar/gal1.jpg" class="img-fluid rounded"></div>
                <div class="col"><img src="gambar/gal2.jpg" class="img-fluid rounded"></div>
                <div class="col"><img src="gambar/gal4.jpg" class="img-fluid rounded"></div>
            </div>
        </div>

   <!-- Testimoni -->
<div class="container py-5" id="testimoni">
    <h2 class="text-center">Testimoni</h2>

    <form action="tambah.php" method="POST">
        <input name="nama" placeholder="Nama" class="form-control mb-2" required>
        <input name="email" type="email" placeholder="Email" class="form-control mb-2" required>
        <textarea name="pesan" placeholder="Testimoni" class="form-control mb-2" required></textarea>
        <button class="btn pink">Kirim</button>
    </form>

    <?php while($d = mysqli_fetch_assoc($data)){ ?>
      <div class="card p-3 mt-3 position-relative">

    <small class="position-absolute top-0 end-0 m-2">
        <?= date('d-m-Y H:i', strtotime($d['tanggal'])); ?>
    </small>

    <b><?= $d['nama']; ?></b><br>
    Email: <?= $d['email']; ?><br>
    Pesan: <?= $d['pesan']; ?>

    <div class="text-end mt-3">
        <a href="edit.php?id=<?= $d['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus.php?id=<?= $d['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
    </div>

</div>
            </div>

        </div>
    <?php } ?>
</div>

        <footer class="text-center py-3" style="background:#f4a6bd;color:white;">
    <p class="mb-0">&copy; 2026 Bloom Florist</p>
</footer>

            
        </body>
        </html>

