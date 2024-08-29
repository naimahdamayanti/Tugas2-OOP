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
