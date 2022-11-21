<?php
//Incluir a conexao com banco de dados

include_once('conexao.php');
//Receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$tipo = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_STRING);
// var_dump($dados);
var_dump($tipo);
//Verificar se usuario digitou em todos os campos e clicou no botão
if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
      echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
      echo "Preencha sua senha";
    } else {
      if(!isset($_SESSION)) {
        session_start();
      }
      if($tipo == 1){
        $query_cliente = "INSERT INTO clientes
                      (nome, email, senha, credito) VALUES
                      (:nome,:email,:senha, :credito)";

        $cad_cliente = $conn->prepare($query_cliente);
        $cad_cliente->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $cad_cliente->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $cad_cliente->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
        $cad_cliente->bindParam(':credito', $dados['credito'], PDO::PARAM_STR);
        $cad_cliente->execute();
        header("Location: sendemail.php");
      }else{
        $query_prestador = "INSERT INTO prestadores
                    (nome, email, senha) VALUES
                    (:nome,:email,:senha)";
        $cad_prestador = $conn->prepare($query_prestador);
        $cad_prestador->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $cad_prestador->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $cad_prestador->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
        $cad_prestador->execute();
        header("Location: sendemail.php");
      }      
    }
  }
?>