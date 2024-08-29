<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Deklarasi metadata dan pengaturan tampilan responsif -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Memuat CSS Bootstrap untuk memperindah tampilan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Lecturers Data</title>
</head>
<body class="bg-light">

<!-- Kontainer utama untuk menampilkan tabel data dosen -->
<div class="container my-4">
    <h2 class="mb-4 text-center">LECTURERS DATA</h2>
    <!-- Membuat tabel dengan Bootstrap untuk menampilkan data dosen -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-primary">
            <!-- Baris header tabel -->
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ID_LECTURER</th>
                <th scope="col">NIDN</th>
                <th scope="col">NIP</th>
                <th scope="col">NAME</th>
                <th scope="col">PHONE</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">SIGNATURE</th>
                <th scope="col">ID_POSITION</th>
                <th scope="col">ID_USER</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Inisialisasi variabel untuk nomor urut
            $no = 1;
            // Looping untuk menampilkan setiap baris data dosen
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

<!-- Memuat JavaScript Bootstrap untuk interaksi UI -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>