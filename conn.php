<?php

function conectar()
{
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password = "";
    $dbname = "xss_teste";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexão bem-sucedida!";
        return $conn;
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
        return null;
    }
}

function queryGETAll($conn, $tabela)
{
    try {
        $sql = "SELECT * FROM $tabela";
        $result = $conn->query($sql);

        $dados = array();

        foreach ($result as $row) {
            $dados[] = $row;
        }

        return $dados;
    } catch (PDOException $e) {
        echo "Erro na consulta: " . $e->getMessage();
        return null;
    }
}

function queryPOST($conn, $tabela, $dados)
{
    try {
        $campos = implode(", ", array_keys($dados));
        $valores = ":" . implode(", :", array_keys($dados));

        $sql = "INSERT INTO $tabela ($campos) VALUES ($valores)";
        $stmt = $conn->prepare($sql);

        foreach ($dados as $campo => $valor) {
            $stmt->bindValue(":$campo", $valor);
        }

        $stmt->execute();

        echo "Inserção realizada com sucesso!";
    } catch (PDOException $e) {
        echo "Erro na inserção: " . $e->getMessage();
    }
}

?>
