<?php
include "config/koneksi.php";

// Jika tombol submit ditekan
if (isset($_POST['simpan'])) {

    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];

    // Folder penyimpanan
    $target = "image/" . basename($gambar);

    // Upload gambar jika ada
    if ($gambar != "") {
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
    }

    // Simpan ke database
    $query = mysqli_query($conn, "INSERT INTO bunga (nama, harga, gambar) 
                                  VALUES ('$nama', '$harga', '$gambar')");

    if ($query) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data | Pinky Fresh Flowers🌸</title>
  <link rel="stylesheet" href="css/style.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }

    form {
      width: 50%;
      margin: 30px auto;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      border: 1px solid #ddd;
    }

    input, label {
      display: block;
      width: 90%;
      margin: 10px auto;
      padding: 10px;
    }

    button {
      background: hotpink;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      opacity: .8;
    }

    a {
      color: hotpink;
      text-decoration: none;
    }
  </style>

</head>
<body>

  <!-- ======== HEADER ======== -->
  <header>
    <h1>Pinky Fresh Flowers🌸</h1>

    <nav>
      <a href="index.php">Beranda</a>
      <a href="about.php">Tentang</a>
      <a href="product.php">Produk</a>
      <a href="contact.php">Kontak</a>
      <a href="data.php" class="active">Custom</a>
    </nav>
  </header>

  <h2>Tambah Data Bunga</h2>

  <form action="" method="post" enctype="multipart/form-data">
    <label>Nama Bunga:</label>
    <input type="text" name="nama" required>

    <label>Harga:</label>
    <input type="number" name="harga" required>

    <label>Gambar:</label>
    <input type="file" name="gambar" required>

    <button type="submit" name="simpan">Simpan</button>
    <br><br>
    <a href="data.php">← Kembali</a>
  </form>

</body>
</html>
