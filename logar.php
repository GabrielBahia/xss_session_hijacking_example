<?php
include "conn.php";

if (isset($_GET['email']) && isset($_GET['password'])) {
    $email = $_GET['email'];
    $password = $_GET['password'];
    if (autenticarUsuario($email, $password)) {
        $token = gerarTokenAcesso();
        salvarTokenAcessoNoBanco($email, $token);
        salvarTokenNoCookie($token);

        header('Location: adm.php');
        exit;
    }else {
        header('Location: login.php');
    }
}

function autenticarUsuario($email, $password) {
    $conn = conectar();
    $result = $conn->query("SELECT * FROM usuarios WHERE email='$email' and senha='$password'")->fetch(PDO::FETCH_OBJ);    
    if($result != false && isset($result->is_admin) && boolval($result->is_admin) == true) {
        return true;
    }
    return false;
}

function gerarTokenAcesso() {
    return md5(uniqid());
}

function salvarTokenAcessoNoBanco($email, $token) {
    $conn = conectar();
    $usuario = $conn->query("UPDATE usuarios SET access_token='$token' WHERE email='$email'");
}

function salvarTokenNoCookie($token) {
    setcookie("access_token", $token, time() + (7 * 24 * 60 * 60), "/");
}
?>