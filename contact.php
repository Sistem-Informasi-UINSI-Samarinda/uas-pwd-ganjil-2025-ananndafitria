<?php
include "config/koneksi.php"; // sambungkan ke database

$alert = "";

// Jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // ke database
    $query = mysqli_query($conn, "INSERT INTO contact (nama, email, pesan)
                                  VALUES ('$nama', '$email', '$pesan')");

    if ($query) {
        $alert = "Pesan Anda berhasil dikirim!";
    } else {
        $alert = "Terjadi kesalahan saat mengirim pesan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontak | Pinky Fresh Flowers</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <header>
    <h1>Pinky Fresh Flowers🌸</h1>

    <nav>
      <a href="index.php">Beranda</a>
      <a href="about.php">Tentang</a>
      <a href="product.php">Produk</a>
      <a href="contact.php" class="active">Kontak</a>
      <a href="data.php">Custom</a>
    </nav>
  </header>

  <section class="contact">
    <h2>Hubungi Kami</h2>
    <p>Kirim pesan Anda, kami akan membalas secepatnya 🌸</p>

    
    <?php if (!empty($alert)) { ?>
      <p style="color: green; font-weight:bold;"><?= $alert ?></p>
    <?php } ?>

    <form method="POST" action="">
      <label>Nama</label>
      <input type="text" name="nama" placeholder="Masukkan nama Anda" required>

      <label>Email</label>
      <input type="email" name="email" placeholder="Masukkan email Anda" required>

      <label>Pesan</label>
      <textarea name="pesan" placeholder="Tulis pesan Anda di sini..." required></textarea>

      <button type="submit">Kirim</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2025 Pinky Fresh Flowers | Toko Bunga Online Indonesia</p>
  </footer>

</body>
</html>