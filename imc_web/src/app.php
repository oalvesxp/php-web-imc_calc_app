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
}

?>