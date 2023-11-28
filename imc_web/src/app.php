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