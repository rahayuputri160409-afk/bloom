<?php
include "koneksi.php";

mysqli_query($conn,"INSERT INTO testimoni (nama,email,pesan)
VALUES ('$_POST[nama]','$_POST[email]','$_POST[pesan]')");

header("Location: index.php#testimoni");
?>