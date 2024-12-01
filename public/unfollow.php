<?php
include "../config.php"; //config.php :hanya memanggil yang di public // ../config.php di luar public
$kode = $_GET['kode'];
$delete = $koneksi->query("DELETE FROM tb_user_follow WHERE following = '$kode'");

if ($delete) {
    echo "<script>location='index.php'</script>";
}
?>