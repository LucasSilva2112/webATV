<?php
$host = 'mysql.jrcf.dev';
$username = 'usrapp'; 
$password = '010203';
$database = 'db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";

$conn->close();
?>