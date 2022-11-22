<?php
//Incluir a conexao com banco de dados
include_once('conexao.php');
include_once('protect.php');
//Receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);

//Verificar se usuario preencheu todos os campos e clicou no botão
if(isset($_POST['nome_servico']) || isset($_POST['descricao_servico'])) {

    if($_POST['nome_servico'] == 'Escolha o Tipo') {
      echo "Escolha o tipo de serviço!";
    } else if(strlen($_POST['descricao_servico']) == 0) {
      echo "Preencha a descrição!";
    } else {
      if(!isset($_SESSION)) {
        session_start();
      }
        $query_criar_servico = "INSERT INTO servicos
                      (numero_id, nome_servico, descricao_servico, preco_servico, status_servico) VALUES
                      (:numero_id,:nome_servico,:descricao_servico,:preco_servico,:status_servico)";

        $cad_servico = $conn->prepare($query_criar_servico);
        $cad_servico->bindParam(':numero_id', $dados['numero_id'], PDO::PARAM_STR);
        $cad_servico->bindParam(':nome_servico', $dados['nome_servico'], PDO::PARAM_STR);
        $cad_servico->bindParam(':descricao_servico', $dados['descricao_servico'], PDO::PARAM_STR);
        $cad_servico->bindParam(':preco_servico', $dados['preco_servico'], PDO::PARAM_STR);
        $cad_servico->bindParam(':status_servico', $dados['status_servico'], PDO::PARAM_STR);
        $cad_servico->execute();
        header("Location: preco.php");
    }      
}
?>