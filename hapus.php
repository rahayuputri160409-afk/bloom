<?php
include "koneksi.php";

mysqli_query($conn,"DELETE FROM testimoni WHERE id=$_GET[id]");

header("Location: index.php#testimoni");
?>