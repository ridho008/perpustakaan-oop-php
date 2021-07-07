<?php
require 'database.php';
class Anggota extends Database
{
   function getAllMembers()
   {
      $data = $this->koneksi->query("SELECT * FROM anggota INNER JOIN user ON anggota.id_user = user.id_user");
      while($row = $data->fetch_assoc()){
         $hasil[] = $row;
      }
      return $hasil;
   }

   function insertMember($data)
   {
      $nama = htmlspecialchars($data["nama"]);
      $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
      $alamat = htmlspecialchars($data["alamat"]);
      $jk = htmlspecialchars($data["jk"]);
      $no_telp = htmlspecialchars($data["no_telp"]);

      $this->koneksi->query("INSERT INTO anggota VALUES (null, '$nama', '$tgl_lahir', '$alamat', '$jk', '$no_telp') ") or die(mysqli_error($this->koneksi));
      return $this->koneksi->affected_rows;
   }

   function getByIdMember($id_anggota)
   {
      $query = mysqli_query($this->koneksi,"SELECT * FROM anggota INNER JOIN user ON anggota.id_user = user.id_user WHERE id_anggota = '$id_anggota'");
      return $query->fetch_assoc();
   }

   function getJoinByIdMemberUser($id_user)
   {
      $query = mysqli_query($this->koneksi,"SELECT * FROM anggota INNER JOIN user ON anggota.id_user = user.id_user WHERE anggota.id_user = '$id_user'") or die(mysqli_error($this->koneksi));
      return $query->fetch_assoc();
   }

   function updateMember($data)
   {
      $id_anggota = htmlspecialchars($data["id_anggota"]);
      // $nama = htmlspecialchars($data["nama"]);
      $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
      $alamat = htmlspecialchars($data["alamat"]);
      $jk = htmlspecialchars($data["jk"]);
      $no_hp = htmlspecialchars($data["no_hp"]);

      $this->koneksi->query("UPDATE anggota SET tgl_lahir = '$tgl_lahir', alamat = '$alamat', jk = '$jk', no_hp = '$no_hp' WHERE id_anggota = '$id_anggota'") or die(mysqli_error($this->koneksi));
      return $this->koneksi->affected_rows;
   }

   function deleteMember($id_anggota)
   {
      $this->koneksi->query("DELETE FROM anggota WHERE id_anggota = '$id_anggota'") or die(mysqli_error($this->koneksi));
      return $this->koneksi->affected_rows;
   }

   function updateProfile($id_anggota)
   {
      $id_anggota = htmlspecialchars($data["id_anggota"]);
      $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
      $alamat = htmlspecialchars($data["alamat"]);
      $jk = htmlspecialchars($data["jk"]);
      $no_telp = htmlspecialchars($data["no_telp"]);

      $this->koneksi->query("UPDATE anggota SET tgl_lahir = '$tgl_lahir', alamat = '$alamat', jk = '$jk', no_hp = '$no_telp' WHERE id_anggota = '$id_anggota'") or die(mysqli_error($this->koneksi));
      return $this->koneksi->affected_rows;
   }

   
}