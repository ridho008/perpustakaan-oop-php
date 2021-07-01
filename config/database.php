<?php
class Database{
   public $host = "localhost";
   public $username = "root";
   public $password = "";
   public $database = "app_perpustakaan_oop";
   public $koneksi;
 
   function __construct(){
      // session_start();
      $this->koneksi = new mysqli($this->host, $this->username, $this->password,$this->database);
      if($this->koneksi){
         // echo "Koneksi database MySQL dan PHP Berhasil";
      }else{
         echo "Koneksi database MySQL dan PHP Gagal ";
      }
   }

   function base_url($url = null)
   {
      $base_url = "http://localhost/perpustakaan-oop-php/";
      if($url != null) {
         return $base_url . $url;
      } else {
         return $base_url;
      }
   }
}