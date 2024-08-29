<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tag meta untuk karakter set, kompatibilitas, dan pengaturan viewport -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Menghubungkan dengan Bootstrap CSS dari CDN untuk menambahkan gaya pada halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Navbar</title>
    
    <!-- Menambahkan beberapa CSS khusus untuk menyesuaikan tampilan navbar -->
    <style>
        .navbar-brand {
            font-weight: bold; /* Memberikan ketebalan huruf pada merek navbar */
            font-size: 1.5rem; /* Mengatur ukuran huruf untuk merek navbar */
        }
        .navbar-nav .nav-link {
            padding: 0.8rem 1rem; /* Menambahkan padding pada link navigasi */
            font-weight: 500; /* Memberikan ketebalan menengah pada huruf link navigasi */
        }
        .nav-link.active {
            background-color: #0d6efd; /* Memberikan warna biru pada link yang aktif */
            color: white !important; /* Mengubah warna teks link yang aktif menjadi putih */
            border-radius: 5px; /* Memberikan radius sudut untuk tampilan melengkung */
        }
        .nav-link:hover {
            color: #0d6efd !important; /* Mengubah warna teks link saat hover menjadi biru */
        }
    </style>
</head>
<body>
<!-- Membuat navbar menggunakan komponen dari Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
  <div class="container-fluid">
    <!-- Menambahkan merek/navbar brand dengan nama "SIWALI JKB" -->
    <a class="navbar-brand text-primary" href="#">SIWALI JKB</a>
    
    <!-- Tombol toggle untuk navbar saat tampilan mobile (dibawah ukuran tertentu) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> <!-- Ikon toggle berupa ikon garis -->
    </button>
    
    <!-- Bagian navigasi yang dapat diperluas (collapse) untuk link-link yang ada -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Daftar link navigasi -->
      <ul class="navbar-nav ms-auto"> <!-- ms-auto untuk menempatkan elemen ke kanan -->
        <li class="nav-item">
          <!-- Link navigasi untuk halaman Admin -->
          <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <!-- Link navigasi untuk halaman Koordinator Prodi -->
          <a class="nav-link" href="kaprodi.php">Koordinator Prodi</a>
        </li>
        <li class="nav-item">
          <!-- Link navigasi untuk halaman Tampil Lecturer -->
          <a class="nav-link" href="tbl_lecturers.php">Tampil Lecturer</a>
        </li>
        <li class="nav-item">
          <!-- Link navigasi untuk halaman Tampil Classes -->
          <a class="nav-link" href="classesview.php">Tampil Classes</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Menghubungkan dengan Bootstrap JS dari CDN untuk mengaktifkan interaktivitas elemen Bootstrap seperti navbar toggle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>