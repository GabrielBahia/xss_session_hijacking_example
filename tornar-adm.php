<?php
include "conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = conectar();
    $conn->query("UPDATE usuarios SET is_admin = true WHERE id=$id");

    header('Location: adm.php');
}
?>