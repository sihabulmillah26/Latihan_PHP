<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:form.php");
    exit;
}
// menambil isi dari file lain
require 'functions.php';
// memasukan query 
$produk = query("SELECT produk.*, Jenis_Produk.nama_jenis FROM produk INNER JOIN Jenis_Produk ON produk.jenis_id = Jenis_Produk.id_jenis");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <h1>Daftar Produk PT Buana Segarin</h1>

    <a href="tambah.php">+ Tambah Data</a> ||
    <a href="admin.php">Kembali</a>
    <br><br>
    <table border="1" cellpadding=6 cellspacing=2 width=50%>
        <tr bgcolor="blue" style="color: white;text-align:center;">
            <td>No</td>
            <td>Kode</td>
            <td>Nama Produk</td>
            <td>Kategori</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Terjual</td>
            <td>Action</td>
        </tr>

        <?php
        $i = 1;
        foreach ($produk as $row) : ?>
            <tr align="center">
                <td><?= $i ?></td>
                <td><?= $row["kode"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["nama_jenis"] ?></td>
                <td><?= $row["harga"] ?></td>
                <td><?= $row["stock"] ?></td>
                <td><?= $row["terjual"] ?></td>
                <td align="center">
                    <a href="ubah.php?id=<?= $row["id"]; ?>"><button>Edit</button></a> ||
                    <!-- menambah ? untuk mengirim sesuatu -->
                    <a href="hapus.php?id=<?= $row["id"]; ?>"><button onclick="return confirm('Yakin ?');">Hapus</button></a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach ?>
    </table>

</body>

</html>