<?php
include "conn.php";

if (isset($_COOKIE['access_token'])) {
  $access_token = $_COOKIE['access_token'];
  $conn = conectar();
  $conn->query("UPDATE usuarios SET access_token = NULL WHERE access_token = '$access_token'");

  unset($_COOKIE['access_token']); 
  setcookie('access_token', '', -1, '/');

  header('Location: login.php');
}
?>