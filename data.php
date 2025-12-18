<?php
include "config/koneksi.php";

// Ambil semua data bunga
$query = mysqli_query($conn, "SELECT * FROM bunga");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fresh Flowers🌸 | Custom</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- ======== BAGIAN HEADER ======== -->
  <header>
    <h1> Pinky Fresh Flowers🌸</h1>

    <nav>
      <a href="index.php">Beranda</a>
      <a href="about.php">Tentang</a>
      <a href="product.php">Produk</a>
      <a href="contact.php">Kontak</a>
      <a href="data.php" class="active">Custom</a>
    </nav>
  </header>

  <!-- ======== BAGIAN ISI DATA ======== -->
  <section class="hero">
    <h2> 🌸Custom Bunga Impian Anda</h2>
    <p> Pilih bunga, tentukan warna, sesuaikan gaya. Kami siap mewujudkan bunga terbaik untuk moment terbaikmu.</p>

    <a href="tambah.php" class="btn">+ Tambah Data</a>

    <table border="1" cellspacing="0" cellpadding="10" style="width:90%; margin:20px auto; background:white;">
      <tr style="background:pink;">
        <th>No</th>
        <th>Nama Bunga</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>

      <?php 
      $no = 1;
      while($data = mysqli_fetch_assoc($query)){ 
      ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $data['nama']; ?></td>
        <td>Rp <?= number_format($data['harga']); ?></td>
        <td><img src="image/<?= $data['gambar']; ?>" width="90"></td>
        <td>
          <a href="edit.php?id=<?= $data['id']; ?>">Edit</a> | 
          <a href="hapus.php?id=<?= $data['id']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </table>
  </section>

  <!-- ======== FOOTER ======== -->
  <footer>
    <p>&copy; 2025 Pinky Fresh Flowers | Toko Bunga Online Indonesia</p>
  </footer>

</body>
</html>
