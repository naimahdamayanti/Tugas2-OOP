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