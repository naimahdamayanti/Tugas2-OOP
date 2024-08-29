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