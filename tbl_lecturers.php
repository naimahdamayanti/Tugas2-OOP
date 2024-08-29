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
