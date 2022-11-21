<?php
//Conexão com MySQL
// $host = 'localhost';
// $usuario = 'root';
// $senha = '';
// $database = 'login';

// $mysqli = new mysqli($host, $usuario, $senha, $database);

// if($mysqli->connect_errno) {
//     die("Falha ao conectar ao banco de dados: (" . $mysqli->connect_errno. ")".$mysqli->connect_error);
// }

//Conexão com PDO
$host = 'localhost';
$usuario = 'root';
$senha = '';
$database = 'login';

try{
    $conn = new PDO("mysql:host=$host;dbname=" . $database, $usuario, $senha);
    // echo "Conexão com banco de dados realizado com sucesso!";
} catch(PDOException $error){
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado" . $error->getMessage();
} 
?>