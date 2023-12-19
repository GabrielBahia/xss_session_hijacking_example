<?php
include "conn.php";


if(strlen($_GET['name']) > 0 && strlen($_GET['email']) > 0 && strlen($_GET['password']) > 0 && strlen($_GET['imagem_url']) > 0) {
  $nome = $_GET['name'];
  $email = $_GET['email'];
  $senha = $_GET['password'];
  $imagem_url = $_GET['imagem_url'];

  $conn = conectar();
  $result = $conn->query("INSERT INTO usuarios (nome, email, senha, imagem_url, is_admin)
  VALUES ('$nome', '$email', '$senha', '$imagem_url', false);");

  header('Location: aviso.php');
}

?>