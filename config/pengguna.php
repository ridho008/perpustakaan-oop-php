<?php

require 'database.php';
class Pengguna extends Database
{
   function getAllUsers()
   {
      $data = $this->koneksi->query("SELECT * FROM user");
      while($row = $data->fetch_assoc()){
         $hasil[] = $row;
      }
      return $hasil;
   }

   function insertUser($data)
   {
      $nama = htmlspecialchars($data["nama"]);
      $username = htmlspecialchars($data["username"]);
      $password = htmlspecialchars(md5($data["password"]));
      $level = htmlspecialchars($data["level"]);

      if ($level != 0) {
         $sql = $this->koneksi->query("INSERT INTO user VALUES (null, '$nama', '$username', '$password', '$level') ") or die(mysqli_error($this->koneksi));

         if($sql) {
            // insert_id = mengambil id terakhir tb user, saat menambahkan data
            $last_id = $this->koneksi->insert_id;
            $this->koneksi->query("INSERT INTO anggota VALUES (null, '$last_id', null, null, null, null)");
            return $this->koneksi->affected_rows;
         } else {
            echo $this->koneksi->error;
         }
      } else {
         $this->koneksi->query("INSERT INTO user VALUES (null, '$nama', '$username', '$password', '$level') ") or die(mysqli_error($this->koneksi));
         return $this->koneksi->affected_rows;
      }
      

   }

   function getByIdUser($id_user)
   {
      $query = mysqli_query($this->koneksi,"SELECT * FROM user WHERE id_user = '$id_user'");
      return $query->fetch_assoc();
   }

   function updateUser($data)
   {
      $id_user = htmlspecialchars($data["id_user"]);
      $nama = htmlspecialchars($data["nama"]);
      $username = htmlspecialchars($data["username"]);
      $password = htmlspecialchars(md5($data["password"]));
      $level = htmlspecialchars($data["level"]);

      $this->koneksi->query("UPDATE user SET nama = '$nama', username = '$username', password = '$password', level = '$level' WHERE id_user = '$id_user'") or die(mysqli_error($this->koneksi));
      return $this->koneksi->affected_rows;
   }

   function deleteUser($id_user)
   {
      $this->koneksi->query("DELETE FROM user WHERE id_user = '$id_user'") or die(mysqli_error($this->koneksi));
      return $this->koneksi->affected_rows;
   }
}