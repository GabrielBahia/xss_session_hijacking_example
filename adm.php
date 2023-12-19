<?php 
include "conn.php";

$conn = conectar();
$access_token = $_COOKIE['access_token'];
$result = $conn->query("SELECT * FROM usuarios WHERE access_token='$access_token'")->fetch(PDO::FETCH_OBJ);
if($result == false) {
  header('Location: login.php');
}

$usuarios = queryGETAll($conn, "usuarios");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="styleAdm.css">
</head>
<body>
<div class="block">
    <div><h2>Painel Adm</h2></div>

    <form action="logout.php">
      <button class="logout" type="submit">Sair</button>
    </form>

    <div class="table-block">
        <div class="titleTable">
            <h3>Lista de Usuários</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Foto</th>
              <th scope="col">Tornar Adm</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($usuarios as $usuario) {?>
            <tr>
              <form action="/tornar-adm.php">
                <input name="id" value=<?= $usuario['id'] ?> hidden></input>
                <td><?= $usuario['nome'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td><img style="width:50px;" src='<?= $usuario['imagem_url'] ?>' alt="Foto de perfil"></td>
                <td><button type="submit">!</button></td>
              </form>
            </tr>
            <?php } ?>
          </tbody>
        </div>
        
      </div>
    </table>

</body>
</html>