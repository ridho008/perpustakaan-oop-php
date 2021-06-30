<?php 
session_start();
require '../../config/auth.php';
$db = new Auth();
$db->logout(); 
?>