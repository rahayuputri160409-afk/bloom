<?php
include "koneksi.php";

$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM testimoni WHERE id=$id"));

if(isset($_POST['simpan'])){
    mysqli_query($conn,"UPDATE testimoni SET
    nama='$_POST[nama]', email='$_POST[email]', pesan='$_POST[pesan]'
    WHERE id=$id");
    header("Location: index.php#testimoni");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Testimoni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
<h2>Edit Testimoni</h2>
<form method="POST">
    <input name="nama" value="<?= $d['nama']; ?>" class="form-control mb-2" required>
    <input name="email" value="<?= $d['email']; ?>" class="form-control mb-2" required>
    <textarea name="pesan" class="form-control mb-2" required><?= $d['pesan']; ?></textarea>
    <button name="simpan" class="btn btn-danger">Simpan</button>
    <a href="index.php#testimoni" class="btn btn-secondary">Kembali</a>
</form>
</div>
</body>
</html>