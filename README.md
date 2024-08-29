<h1>TUGAS 2-PWEB II-OOP</h1>
<h2>SIWALI JKB</h2>
<p>Sistem Informasi Konsultasi Akademik JKB (SIWALI JKB) adalah sebuah sistem manajemen konsultasi akademik yang menyeluruh, dirancang untuk mempermudah pengelolaan kinerja mahasiswa, proses konseling, serta berbagai data akademik lainnya di perguruan tinggi.</p>
<h3>User Roles</h3>
<ol>
  <li><h4>Admin</h4></li>
  <ul>
    <li>Dapat mengelola seluruh data dalam sistem, kecuali catatan terkait kinerja siswa dan sesi konseling.</li>
    <li>Bertanggung jawab atas manajemen pengguna, termasuk pembuatan akun pengguna baru.</li>
    <li>Penetapan peran (Dosen Wali, Koordinator Program Studi, atau Mahasiswa) kepada pengguna.</li>
  </ul>

  <li>Koordinator Program Studi</li>
  <ul>
    <li>Menyetujui atau menolak laporan yang disampaikan oleh Dosen Wali.</li>
  </ul>
</ol>

<h2>ERD</h2>
![ERD](https://github.com/naimahdamayanti/Tugas2-OOP/blob/main/ERD.png?rawtrue)

<h2>Code</h2>
<ol>
  <li>Koneksi</li>
  <p>

```
    <?php
    // Mendefinisikan kelas 'database' untuk mengatur koneksi dan interaksi dengan database
    class database {
        // Deklarasi variabel properti yang digunakan untuk menyimpan informasi koneksi database
        private $host = "localhost"; // Host database
        private $user = "root"; // Username untuk koneksi ke database
        private $password = ""; // Password untuk koneksi ke database
        private $database = "siwali_jkb"; // Nama database yang akan digunakan
        protected $conn; // Variabel untuk menyimpan objek koneksi database (bersifat protected agar bisa diakses oleh kelas turunan)

        // Konstruktor untuk kelas 'database'
        public function __construct() {
            // Membuat koneksi ke database menggunakan kelas 'mysqli'
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            
            // Mengecek apakah koneksi berhasil atau gagal
            if ($this->conn->connect_error) {
                // Jika koneksi gagal, program akan dihentikan dan menampilkan pesan kesalahan
                die("Connection Failed: " . $this->conn->connect_error);
            }
        }

        // Fungsi untuk membaca data dari database
        public function baca_data($sql) {
            // Menjalankan query SQL yang diberikan sebagai parameter fungsi
            $result = $this->conn->query($sql);
            
            // Mengembalikan hasil query
            return $result;
        }
    }

    // Membuat objek dari kelas 'database' untuk menginisialisasi koneksi ke database
    $db = new database();
?>
```
  </p>

  <li>Navbar</li>
  <p>
    
```
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
```
  </p>

  <li>Admin</li>
  <p>

```
<?php
    // Mengimpor file yang diperlukan
    require_once 'koneksi.php'; // Koneksi ke basis data
    require_once 'navbar.php';  // Menampilkan navigasi bar (header) untuk halaman web
    require_once 'tbl_classes.php'; // Mengimpor definisi kelas untuk "Classes"

    // Mendefinisikan kelas Admin yang merupakan turunan dari kelas database
    class Admin extends database {
        public function __construct() {
            // Memanggil constructor induk untuk membuat koneksi ke basis data
            parent::__construct();
        }

        // Fungsi untuk mengambil semua data dari tabel tbl_lecturers
        public function tampil_data() {
            $sql = "SELECT * FROM tbl_lecturers"; // Query SQL untuk memilih semua data dari tabel tbl_lecturers
            $data = $this->baca_data($sql); // Menjalankan query dan mengambil data
            return $data; // Mengembalikan data yang diambil
        }
    }

    // Membuat instance dari kelas Admin dan mengambil data dosen
    $admin1 = new Admin();
    $admin = $admin1->tampil_data(); // Menyimpan data yang diambil ke dalam variabel $admin

    // Membuat instance dari kelas Classes dan mengambil data kelas
    $classes1 = new Classes();
    $data = $classes1->tampil_data(); // Menyimpan data yang diambil ke dalam variabel $data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tag meta untuk pengaturan karakter, kompatibilitas, dan viewport -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link untuk CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Data Admin</title> <!-- Judul halaman -->
</head>
<body class="bg-light">

<div class="container my-4">
    <!-- Tabel Data Dosen -->
    <h2 class="mb-4 text-center">LECTURERS DATA</h2>
    <table class="table table-bordered table-striped table-hover shadow-sm">
        <thead class="table-primary">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ID_DOSEN</th>
                <th scope="col">NIDN</th>
                <th scope="col">NIP</th>
                <th scope="col">NAMA</th>
                <th scope="col">TELEPON</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">TANDA TANGAN</th>
                <th scope="col">ID_POSISI</th>
                <th scope="col">ID_USER</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            // Loop untuk menampilkan setiap data dosen
            foreach ($admin as $row) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_lecturer']; ?></td>
                <td><?php echo $row['nidn']; ?></td>
                <td><?php echo $row['nip']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['signature']; ?></td>
                <td><?php echo $row['id_position']; ?></td>
                <td><?php echo $row['id_user']; ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<div class="container my-4">
    <!-- Tabel Data Kelas -->
    <h2 class="mb-4 text-center">CLASSES DATA</h2>
    <table class="table table-bordered table-striped table-hover shadow-sm">
        <thead class="table-primary">
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">ID_KELAS</th>
                <th scope="col">ID_PROGRAM</th>
                <th scope="col">ID_DOSEN WALI</th>
                <th scope="col">KELAS</th>
                <th scope="col">TAHUN AKADEMIK</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            // Loop untuk menampilkan setiap data kelas
            foreach ($data as $row) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_class']; ?></td>
                <td><?php echo $row['id_program']; ?></td>
                <td><?php echo $row['id_academic_advisor']; ?></td>
                <td><?php echo $row['class_name']; ?></td>
                <td><?php echo $row['academic_year']; ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Script untuk JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```
  </p>

  <li>Koordinator Program Studi</li>
  <p>

```
  <?php
    // Mengimpor file koneksi.php untuk menghubungkan dengan database
    require_once 'koneksi.php';
    
    // Mengimpor file navbar.php untuk menambahkan navigasi pada halaman
    require_once 'navbar.php';
    
    // Mendefinisikan kelas Kaprodi yang merupakan turunan dari kelas 'database'
    class Kaprodi extends database {
        // Konstruktor untuk kelas Kaprodi, memanggil konstruktor induk untuk inisialisasi koneksi database
        public function __construct() {
            parent::__construct();  
        }

        // Fungsi untuk mengambil data dari tabel 'tbl_lecturers' di database
        public function tampil_data() {
            $sql = "SELECT * FROM tbl_lecturers"; // Query SQL untuk mengambil semua data dari tabel dosen
            $data = $this->baca_data($sql); // Menggunakan fungsi 'baca_data' untuk mengeksekusi query
            return $data; // Mengembalikan hasil data yang diambil
        }
    }

    // Membuat objek dari kelas Kaprodi untuk mengambil data dosen
    $kaprodi1 = new Kaprodi();
    $data = $kaprodi1->tampil_data(); // Menyimpan data hasil query dalam variabel $data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata untuk karakter, pengaturan IE, dan tampilan halaman pada perangkat -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Menghubungkan CSS Bootstrap untuk styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title> <!-- Judul halaman -->
</head>
<body class="bg-light"> <!-- Menambahkan kelas Bootstrap untuk latar belakang yang lebih cerah -->

<div class="container my-4">
    <!-- Bagian judul laporan dosen -->
    <h2 class="mb-4 text-center">LECTURERS REPORT</h2>
    
    <!-- Membuat tabel dengan gaya Bootstrap untuk menampilkan data dosen -->
    <table class="table table-bordered table-striped table-hover">
        <!-- Header tabel -->
        <thead class="table-primary">
        <tr>
            <th scope="col">NO</th> <!-- Kolom Nomor Urut -->
            <th scope="col">ID_LECTURER</th> <!-- Kolom ID Dosen -->
            <th scope="col">NIDN</th> <!-- Kolom NIDN Dosen -->
            <th scope="col">NIP</th> <!-- Kolom NIP Dosen -->
            <th scope="col">NAME</th> <!-- Kolom Nama Dosen -->
            <th scope="col">PHONE</th> <!-- Kolom Nomor Telepon Dosen -->
            <th scope="col">ADDRESS</th> <!-- Kolom Alamat Dosen -->
            <th scope="col">SIGNATURE</th> <!-- Kolom Tanda Tangan Dosen -->
            <th scope="col">ID_POSITION</th> <!-- Kolom ID Jabatan Dosen -->
            <th scope="col">ID_USER</th> <!-- Kolom ID Pengguna -->
            <th scope="col">STATUS</th> <!-- Kolom Status Dosen -->
        </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; // Inisialisasi variabel nomor urut
            // Loop untuk menampilkan data dosen dari database
            foreach($data as $row){
            ?>
            <tr>
                <!-- Menampilkan data dalam tabel untuk setiap kolom -->
                <td><?php echo $no++ ?></td> <!-- Menampilkan nomor urut -->
                <td><?php echo $row['id_lecturer'] ?></td> <!-- Menampilkan ID Dosen -->
                <td><?php echo $row['nidn'] ?></td> <!-- Menampilkan NIDN Dosen -->
                <td><?php echo $row['nip'] ?></td> <!-- Menampilkan NIP Dosen -->
                <td><?php echo $row['name'] ?></td> <!-- Menampilkan Nama Dosen -->
                <td><?php echo $row['phone_number'] ?></td> <!-- Menampilkan Nomor Telepon Dosen -->
                <td><?php echo $row['address'] ?></td> <!-- Menampilkan Alamat Dosen -->
                <td><?php echo $row['signature'] ?></td> <!-- Menampilkan Tanda Tangan Dosen -->
                <td><?php echo $row['id_position'] ?></td> <!-- Menampilkan ID Jabatan Dosen -->
                <td><?php echo $row['id_user'] ?></td> <!-- Menampilkan ID Pengguna Dosen -->
                <td><?php echo $row['status'] ?></td> <!-- Menampilkan Status Dosen -->
            </tr>
            <?php
            }
            ?>
        </tbody>    
    </table>
</div>
</body>
<!-- Menambahkan Bootstrap JavaScript untuk interaktivitas -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
```
</p>

  <li>Lecturer</li>
<p>

```
<?php
    // Memasukkan file koneksi.php yang berisi kode untuk koneksi ke database
    require_once 'koneksi.php';
    // Memasukkan file navbar.php untuk menampilkan navbar di halaman
    require_once 'navbar.php';
    
    // Mendefinisikan kelas Lecturers yang mewarisi (extends) dari kelas 'database'
    class Lecturers extends database {
        // Konstruktor kelas yang memanggil konstruktor parent (kelas 'database') untuk menginisialisasi koneksi database
        public function __construct(){
            parent::__construct();
        }

        // Metode untuk mengambil data dari tabel 'tbl_lecturers' di database
        public function tampil_data(){
            // Query SQL untuk memilih semua data dari tabel 'tbl_lecturers'
            $sql = "SELECT * FROM tbl_lecturers";
            // Memanggil metode 'baca_data' dari kelas 'database' untuk menjalankan query dan menyimpan hasilnya di variabel $data
            $data = $this->baca_data($sql);
            return $data; // Mengembalikan hasil query sebagai array data
        }
    }

    // Membuat objek 'lecturers1' dari kelas Lecturers untuk mengambil data dosen dari database
    $lecturers1 = new Lecturers();
    // Memanggil metode 'tampil_data' untuk mendapatkan semua data dari tabel 'tbl_lecturers'
    $data = $lecturers1->tampil_data();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tag meta untuk pengaturan karakter, kompatibilitas, dan viewport -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link untuk CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Data Admin</title> <!-- Judul halaman -->
</head>
<body class="bg-light">

<div class="container my-4">
    <!-- Tabel Data Dosen -->
    <h2 class="mb-4 text-center">LECTURERS DATA</h2>
    <table class="table table-bordered table-striped table-hover shadow-sm">
        <thead class="table-primary">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ID_DOSEN</th>
                <th scope="col">NIDN</th>
                <th scope="col">NIP</th>
                <th scope="col">NAMA</th>
                <th scope="col">TELEPON</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">TANDA TANGAN</th>
                <th scope="col">ID_POSISI</th>
                <th scope="col">ID_USER</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 1; // Inisialisasi nomor urut mulai dari 1
            // Loop untuk menampilkan data setiap kelas
            foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_lecturer']; ?></td>
                <td><?php echo $row['nidn']; ?></td>
                <td><?php echo $row['nip']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['signature']; ?></td>
                <td><?php echo $row['id_position']; ?></td>
                <td><?php echo $row['id_user']; ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>
<!-- Menambahkan Bootstrap JavaScript untuk interaktivitas -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
```
</p>
  <li>Classes</li>
  <p>

```
<?php
    // Memasukkan file koneksi.php yang berisi kode untuk menghubungkan ke database
    require_once 'koneksi.php';
    // Memasukkan file navbar.php yang berisi kode untuk tampilan navbar
    require_once 'navbar.php';

    // Mendefinisikan kelas Classes yang mewarisi (extends) dari kelas 'database'
    class Classes extends database {
        
        // Konstruktor kelas yang memanggil konstruktor parent (kelas 'database') untuk menginisialisasi koneksi database
        public function __construct() {
            parent::__construct();
        }

        // Metode untuk mengambil data dari tabel 'tbl_classes' di database
        public function tampil_data() {
            // Query SQL untuk memilih semua data dari tabel 'tbl_classes'
            $sql = "SELECT * FROM tbl_classes";
            // Memanggil metode 'baca_data' dari kelas 'database' untuk menjalankan query dan menyimpan hasilnya di variabel $data
            $data = $this->baca_data($sql);
            return $data; // Mengembalikan hasil query sebagai array data
        }
    }

    // Membuat objek 'Classes' untuk mengambil data kelas dari database
    $classes1 = new Classes();
    // Memanggil metode 'tampil_data' untuk mendapatkan semua data dari tabel 'tbl_classes'
    $data = $classes1->tampil_data();
?>
```
  </p>

  <li>Classes View</li>
  <p>

```
<?php
    // Mengimpor file tbl_classes.php yang berisi definisi kelas untuk mengakses data tabel classes
    require_once 'tbl_classes.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Pengaturan metadata untuk karakter dan viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Menghubungkan CSS Bootstrap dari CDN untuk styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>CLASSES DATA</title> <!-- Judul halaman -->
</head>
<body>
    <body class="bg-light"> <!-- Menambahkan kelas Bootstrap untuk latar belakang berwarna terang -->

<div class="container my-4">
    <!-- Bagian judul tabel data kelas -->
    <h2 class="mb-4 text-center">CLASSES DATA</h2>
    <table class="table table-bordered table-striped table-hover">
        <!-- Menentukan header tabel dengan gaya Bootstrap -->
        <thead class="table-primary">
            <tr>
                <th scope="col">NO.</th> <!-- Kolom nomor urut -->
                <th scope="col">ID_CLASS</th> <!-- Kolom ID Kelas -->
                <th scope="col">ID_PROGRAM</th> <!-- Kolom ID Program -->
                <th scope="col">ID_ACADEMIC ADVISOR</th> <!-- Kolom ID Dosen Pembimbing -->
                <th scope="col">CLASS</th> <!-- Kolom Nama Kelas -->
                <th scope="col">ACADEMIC YEAR</th> <!-- Kolom Tahun Akademik -->
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; // Inisialisasi nomor urut mulai dari 1
            // Loop untuk menampilkan data setiap kelas
            foreach($data as $row){
            ?>
            <tr>
                <!-- Menampilkan data untuk setiap kolom -->
                <td><?php echo $no++ ?></td> <!-- Menampilkan nomor urut -->
                <td><?php echo $row['id_class'] ?></td> <!-- Menampilkan ID Kelas -->
                <td><?php echo $row['id_program'] ?></td> <!-- Menampilkan ID Program -->
                <td><?php echo $row['id_academic_advisor'] ?></td> <!-- Menampilkan ID Dosen Pembimbing -->
                <td><?php echo $row['class_name'] ?></td> <!-- Menampilkan Nama Kelas -->
                <td><?php echo $row['academic_year'] ?></td> <!-- Menampilkan Tahun Akademik -->
            </tr> 
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>
<!-- Menghubungkan JavaScript Bootstrap dari CDN untuk fungsionalitas interaktif -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
```
  </p>
</ol>
