<?php
//Incluir a conexao com banco de dados

include_once('conexao.php');
//Receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump($dados);

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
      $query_usuario = "INSERT INTO usuarios
                    (nome, email, senha, credito) VALUES
                    (:nome,:email,:senha, :credito)";

      $cad_usuario = $conn->prepare($query_usuario);
      $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
      $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
      $cad_usuario->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
      $cad_usuario->bindParam(':credito', $dados['credito'], PDO::PARAM_STR);
      $cad_usuario->execute();
      header("Location: sendemail.php");
    }
  }
?>