<?php
/**
 * Created by VisualStudioCode.
 * User: oalves
 * Date: 28/11/2023
 * Description: Arquivo env.php
 */

define ( 'DB_HOST', '');
define ( 'DB_USER', '');
define ( 'DB_PASSWORD', '');
define ( 'DB_NAME', '');

$coon = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>