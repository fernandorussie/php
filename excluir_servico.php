<?php
	include_once('conexao.php');
	
	session_start();
	ob_start();
	$id = $_POST["id"];
var_dump($id);
    $query_servicos = " DELETE FROM servicos 
                        WHERE numero_id = :id";
	$result_excluir = $conn->prepare($query_servicos);
	$result_excluir->bindParam(":id", $id, PDO::PARAM_STR);
	$result_excluir->execute();
    
var_dump($result_excluir);

	if( $result_excluir )
	{
        header("Location: painelcliente.php");
	}else{
        echo 'Error';
    }
    