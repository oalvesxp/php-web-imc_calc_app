<?php
/**
 * Created by VisualStudioCode.
 * User: oalves
 * Date: 28/11/2023
 * Description: Arquivo env.php
 */

define ( 'DB_HOST', 'localhost');
define ( 'DB_USER', 'imc_user');
define ( 'DB_PASSWORD', 'password');
define ( 'DB_NAME', 'imc_db');

$coon = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>