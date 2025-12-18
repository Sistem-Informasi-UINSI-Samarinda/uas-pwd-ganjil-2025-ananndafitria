<?php
include "config/koneksi.php";

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data bunga berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM bunga WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan
if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='data.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data | Pinky Fresh Flowers🌸</title>
  <link rel="stylesheet" href="css/style.css">
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

  <!-- ======== FORM EDIT ======== -->
  <section class="hero" style="padding:40px;">

    <h2>✏ Edit Data Bunga</h2>
    <p>Perbarui informasi bunga sesuai kebutuhan Anda.</p>

    <form action="" method="post" enctype="multipart/form-data" style="max-width:450px; margin:auto; text-align:left; background:white; padding:20px; border-radius:10px;">

      <label>Nama Bunga</label>
      <input type="text" name="nama" value="<?= $data['nama']; ?>" required class="input">

      <label>Harga</label>
      <input type="number" name="harga" value="<?= $data['harga']; ?>" required class="input">

      <label>Gambar Saat Ini</label><br>
      <img src="image/<?= $data['gambar']; ?>" width="120" style="border-radius:5px; margin-bottom:10px;"><br>

      <label>Ganti Gambar (optional)</label>
      <input type="file" name="gambar" class="input">

      <button type="submit" name="update" class="btn" style="width:100%;">Update</button>

    </form>

    <?php
    // Proses update
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];

        // Cek apakah user upload gambar baru
        if ($_FILES['gambar']['name'] != "") {
            $gambar = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];

            move_uploaded_file($tmp, "image/" . $gambar);

            // Update dengan gambar baru
            mysqli_query($conn, "UPDATE bunga SET 
              nama='$nama', 
              harga='$harga', 
              gambar='$gambar'
              WHERE id='$id'
            ");
        } else {
            // Update tanpa gambar
            mysqli_query($conn, "UPDATE bunga SET 
              nama='$nama', 
              harga='$harga'
              WHERE id='$id'
            ");
        }

        echo "<script>alert('Data berhasil diperbarui!'); window.location='data.php';</script>";
    }
    ?>

  </section>

  <!-- ======== FOOTER ======== -->
  <footer>
    <p>&copy; 2025 Pinky Fresh Flowers | Toko Bunga Online Indonesia</p>
  </footer>

</body>
</html>
