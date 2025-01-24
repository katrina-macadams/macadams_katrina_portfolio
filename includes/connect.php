<?php
$dsn = "mysql:host=localhost;dbname=portfolio;charset=utf8mb4";
try {
$connection = new PDO($dsn, 'root', 'root');
// this creates a PDO object 
} catch (Exception $e) {
  error_log($e->getMessage());
  exit('unable to connect');
}
?>

<!-- http://localhost:8888/macadams_katrina_portfolio/index.php -->