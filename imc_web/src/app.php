<?php
/**
 * Created by VisualStudioCode.
 * User: oalves
 * Date: 28/11/2023
 * Description: Calculador de IMC 
 */

session_start();
require_once("../app/etc/env.php");

if (isset($_POST['calcular'])) {
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $imc = $peso / ($altura * $altura);
    $imc = number_format($imc, 2, '.', '');
        
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $contato = $_POST['contato'];
    $data = $_POST['data'];
    $done = true;

    $_SESSION['imc'] = $imc;    
    $_SESSION['done'] = $done;

    // Query para armazenar os dados no banco
    $mysql_query = "INSERT INTO pacientes (NOME, CPF, CONTATO, ALTURA, PESO, IMC, DATA_COLETA) VALUES ('$nome', '$cpf', '$contato', '$altura',  '$peso', '$imc', '$data')";
    $result = mysqli_query($conn, $mysql_query);
    if (!$result) {
        die("Failed to insert data into MySQL: " . mysqli_erro($conn));
    }
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>