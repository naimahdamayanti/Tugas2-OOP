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
