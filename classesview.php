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