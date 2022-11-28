<?php
session_start();
//Incluir a conexao com banco de dados
include_once('conexao.php');
include_once('protect.php');

echo $id = $_SESSION['id'];
echo $email = $_SESSION['email'];
//Receber os dados do formulário

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);
echo $dados['descricao_servico'];
echo $dados['nome_servico'];

$query_criar_servico = 'INSERT INTO servicos (nome_servico,descricao_servico, preco_produto, status_servico, id_cliente, email_cliente, id_prestador, email_prestador, dia_pedido) 
                        VALUES (:nome_servico, :descricao_servico,:preco_produto, :status_servico, :id_cliente, :email_cliente, :id_prestador, :email_prestador, :dia_pedido)';
$cad_servico = $conn->prepare($query_criar_servico);
$cad_servico->bindParam(':nome_servico', $dados['nome_servico'], PDO::PARAM_STR);
$cad_servico->bindParam(':descricao_servico', $dados['descricao_servico'], PDO::PARAM_STR);
$cad_servico->bindParam(':preco_produto', $dados['preco_produto'], PDO::PARAM_STR);
$cad_servico->bindParam(':status_servico', $dados['status_servico'], PDO::PARAM_STR);
$cad_servico->bindParam(':id_cliente', $id, PDO::PARAM_STR);
$cad_servico->bindParam(':email_cliente', $email, PDO::PARAM_STR);
$cad_servico->bindParam(':id_prestador', $dados['id_prestador'], PDO::PARAM_STR);
$cad_servico->bindParam(':email_prestador', $dados['email_prestador'], PDO::PARAM_STR);
$cad_servico->bindParam(':dia_pedido', $dados['dia_pedido'], PDO::PARAM_STR);
$cad_servico->execute();

print_r($cad_servico);
header('Location: confirma_servico.php');
?>

