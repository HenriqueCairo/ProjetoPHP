<?php

$host = 'localhost'; //especifica o nome do host onde o banco de dados MySQL esta hospedado
$db = 'Alpha'; //Nome do banco de dados que vamos conectar
$user = 'root'; //usuario do BD
$pass = ''; //senha do BD 
$charset = 'utf8mb4'; //define o numero de caracteres usado para comunicaçao com o banco de dados 

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false,
];

try{
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo 'Conexão bem sucedida';
}catch (\PDOException $e){
    echo 'Erro ao conectar com o banco de dados:' .
    $e->getMessage();
}
?>
