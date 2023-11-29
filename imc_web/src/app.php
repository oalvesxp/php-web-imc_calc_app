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
        die("Failed to insert data into MySQL: " . mysqli_error($conn));
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
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="container col-sm-6 d-flex-column justify-content-center vh-100">
        <div class="row content">
            <div class="row">
                <div class="col">
                    <table class="table" id="table">
                        <thead>
                            <tr class="center">
                                <th scope="col" colspan="3" class="center">VEJA A INTERPRETAÇÃO DO IMC</th>
                            </tr>
                            <tr>
                                <th scope="col">IMC</th>
                                <th scope="col">CLASSIFICAÇÃO</th>
                                <th scope="col">OBESIDADE (GRAU)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="
                                <?php
                                    if ($done && $imc < 18.5) {
                                        echo "table-success";
                                    }
                                ?>
                            ">
                                <td>MENOR QUE 18,5</td>
                                <td>MAGREZA</td>
                                <td>0</td>
                            </tr>
                            <tr class="
                                <?php
                                    if ($done && $imc >= 18.5 && $imc <= 24.9) {
                                        echo "table-success";
                                    }
                                ?>
                            ">
                                <td>ENTRE 18,5 E 24,9</td>
                                <td>NORMAL</td>
                                <td>0</td>
                            </tr>
                            <tr class="
                                <?php
                                    if ($done && $imc >= 25 && $imc <= 29.9) {
                                        echo "table-success";
                                    }
                                ?>
                            ">
                                <td>ENTRE 25 E 29,9</td>
                                <td>SOBREPESO</td>
                                <td>I</td>
                            </tr>
                            <tr class="
                                <?php
                                    if ($done && $imc >= 30 && $imc <= 39.9) {
                                        echo "table-success";
                                    }
                                ?>
                            ">
                                <td>ENTRE 30 E 39,9</td>
                                <td>OBRESIDADE</td>
                                <td>II</td>
                            </tr>

                            <tr class="
                                <?php
                                    if ($done && $imc >= 40) {
                                        echo "table-success";
                                    }
                                ?>
                            ">
                                <td>MAIOR QUE 40,0</td>
                                <td>OBRESIDADE GRAVE</td>
                                <td>III</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="col-sm-3">
                <div class= "alert alert-success" role="alert" >
                    <strong>SEU IMC: <?php echo $imc; ?></strong>
                </div>
            </div>                
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb1">© 2023 Osvaldo Alves</p>
            <p class="mb1">® Todos os direitos reservados</p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>