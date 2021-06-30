<?php

require 'database.php';
class Auth extends Database
{
   function register($data)
   {
      $nama = htmlspecialchars($data["nama"]);
      $username = htmlspecialchars($data["username"]);
      $password = htmlspecialchars(md5($data["password"]));
      $level = htmlspecialchars($data["level"]);

      $sql = $this->koneksi->query("INSERT INTO user VALUES (null, '$nama', '$username', '$password', '$level')");

      if($sql) {
         // insert_id = mengambil id terakhir tb user, saat menambahkan data
         $last_id = $this->koneksi->insert_id;
         $this->koneksi->query("INSERT INTO anggota VALUES (null, '$last_id', null, null, null, null)");
         return $this->koneksi->affected_rows;
      } else {
         echo $this->koneksi->error;
      }
   }

   function login($data)
   {
      $username = htmlspecialchars($data['username']);
      $password = htmlspecialchars(md5($data['password']));
      // ambil data berdasarkan username yang diinputkan
      $user = $this->koneksi->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
      $row = $user->fetch_assoc();
      // var_dump($row); die;
      // cek apakah username ada ?
      if($row != null) {
         $_SESSION['id'] = $row['id_user'];
         $_SESSION['nama'] = $row['nama'];
         $_SESSION['username'] = $row['username'];
         $_SESSION['level'] = $row['level'];
         if($row['level'] == 0) {
            header("Location: ../theme-backend.php");
         } else {
            header("Location: ../theme-backend.php");
         }
      } else {
         echo "<script>alert('Username/Password Salah!');window.location='login.php';</script>";
      }
   }

   public function isLoggedIn()
   {
      // Apakah user_session sudah ada di session 
      if (isset($_SESSION['id'])) {
         return true;
      }  
   }

   public function logout()
   {
      // Hapus session 
      session_destroy();
      // Hapus user_session 
      unset($_SESSION['id']);
      unset($_SESSION['nama']);
      unset($_SESSION['username']);
      unset($_SESSION['level']);
      echo "<script>alert('Berhasil Keluar Akun.');window.location='login.php';</script>";
   }


}