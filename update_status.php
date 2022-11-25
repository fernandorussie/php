<?php

    include_once('conexao.php');
    require_once("protect.php");
    $status = $_POST["nota"];
    // echo $dados['nota'];
    // var_dump($numero_id);
    // var_dump($status);
    // echo $_POST["id_usuario"];
    // $status = $_POST["status"];
  
    // $query_update = "   UPDATE servicos 
    //                     SET status_servico = :status_servico
    //                     WHERE numero_id = :id";

    // $result_update = $conn->prepare($query_update);
    // $result_update->bindParam(":status_servico", $status, PDO::PARAM_STR);
    // $result_update->execute();

//   if($result_update)
//   {
//     echo "deu bom!";
//   }
//   else {
//     echo 'Error';
//   }