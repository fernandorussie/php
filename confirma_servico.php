<?php
    include_once('conexao.php');
    include_once('protect.php');
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    $id = $_SESSION['id'];
    $cod_produtoForm = $dados['cod_produto'];
    // print_r($cod_produtoForm);
    $query_produto = "    SELECT *
                          FROM produto_servico";
    $result_produto = $conn->prepare($query_produto);
    $result_produto->bindParam(':cod_servico', $cod_produto, PDO::PARAM_STR);
    $result_produto->execute();

    while($row_produto = $result_produto->fetch(PDO::FETCH_ASSOC)){
        
        extract($row_produto);
        if($cod_produto != $cod_produtoForm){
            // echo "Error: ".$row_produto;
        }else{
            // var_dump($row_produto);
            // echo $cod_produto;
            $dados['preco_produto'] = $preco_produto;
            $dados['descricao_servico'] = $nome_produto;
            // echo $preco_produto;
            // echo $nome_produto;
        }
    }


    if($dados['nome_servico'] == "1"){
        $dados['nome_servico'] = 'Bombeiro Hidraulico';
      }elseif($dados['nome_servico'] == "2"){
        $dados['nome_servico'] = 'Carpintaria';
      }elseif($dados['nome_servico'] == "3"){
        $dados['nome_servico'] = 'Eletricista';
      }elseif($dados['nome_servico'] == "3"){
        $dados['nome_servico'] = 'Chaveiro';
    };
   
    if($dados){
        // echo $dados['dia_pedido']('d/m/Y', strtotime($dados['dia_pedido']));
        $dados['dia_pedido'] = date('d / m / Y', strtotime ($dados['dia_pedido']));
    }
    // var_dump($dados);
    $nome_servico = $dados['nome_servico'];
    $descricao_servico = $dados['descricao_servico'];
    $dia_pedido = $dados['dia_pedido'];
    $status_servico = $dados['status_servico'];
    $id_prestador = $dados['id_prestador'];
    $email_prestador = $dados['email_prestador'];
    $preco_produto = $dados['preco_produto'];
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Confirmar Preço</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container mt-5">
            <h3>Confirme o preço do serviço</h3>      
            <div class="form-group">
                <table class="table table-hover">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tipo de serviço:</td>
                            <td><?php echo $dados['nome_servico']?></td>
                        </tr>
                        <tr>
                            <td>Serviço:</td>
                            <td><?php echo $dados['descricao_servico']?></td>
                        </tr>
                        <tr>
                            <td>Preço:</td>
                            <td>R$ <?php echo $dados['preco_produto']?>,00</td>
                        </tr>
                        <tr>
                            <td>Seu crédito:</td>
                            <td>R$ <?php echo $_SESSION['credito'];?>,00</td>
                        </tr>
                        <tr>
                            <td>Valor a ser cobrado:</td>
                            <td>R$ <?php echo 200 - $_SESSION['credito'];?>,00</td>
                        </tr>
                        <tr>
                            <td>Dia agendado:</td>
                            <td><?php echo $dados['dia_pedido'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group d-flex">
                <div class="col-sm-offset-2 col-sm-10" id="box_button">
                <form id="favoritar" action="criar_dados_banco.php" method="POST">
                        <input type="hidden" id="nome_servico" name="nome_servico" value="<?php echo $nome_servico?>">
                        <input type="hidden" id="descricao_servico" name="descricao_servico" value="<?php echo $descricao_servico?>">
                        <input type="hidden" id="dia_pedido" name="dia_pedido" value="<?php echo $dia_pedido?>">
                        <input type="hidden" id="status_servico" name="status_servico" value="<?php echo $status_servico?>">
                        <input type="hidden" id="id_prestador" name="id_prestador" value="<?php echo $id_prestador?>">
                        <input type="hidden" id="email_prestador" name="email_prestador" value="<?php echo $email_prestador?>">
                        <input type="hidden" id="email_prestador" name="preco_produto" value="<?php echo $preco_produto?>">
                        <button type="submit" id="btn_criar" class="btn btn-default" data-toggle="modal" data-target="#ExemploModalCentralizado">Confirmar</button>
                        <button type="" class="btn btn-default">
                            <a href="painelcliente.php">Cancelar</a>
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Solicitação Confirmada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php 
                    $query_servico = "  SELECT numero_id
                                        FROM servicos as s
                                        INNER JOIN clientes as c
                                        ON s.id_cliente = c.id
                                        WHERE c.id = $id
                                        ORDER BY numero_id DESC
                                        LIMIT 1";
                    $result_servico = $conn->prepare($query_servico);
                    $result_servico->execute();

                    while($row_servico = $result_servico->fetch(PDO::FETCH_ASSOC)){
                        // var_dump($row_servico);
                        extract($row_servico);
                    
                    ?>
                        <p>Numero de solicitação:<?php echo "$numero_id"; ?></p>
                    <?php    
                    }   
                    ?>
                    <p>Prestador: <?php echo $dados['email_prestador']?></p>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <p><a href="painelcliente.php">Ir para sua lista de solicitações</a></p>
                </div>
            </div>
            </div>
        </div>
        </div>
                
        
        <script>
            $("#btn_criar").click(function(event) {

            event.preventDefault();

            /* Cria uma requisiçãod o tipo POST */
            const request = new Request("criar_dados_banco.php", {
            method: "POST",
            body: new FormData( document.querySelector("#favoritar") )
            });

            /* Executa a requisição e retorna o resultado */
            fetch(request).then( response => {
            return response.text(); // ou return response.json();
            } )
            .then ( result => {
            console.log( result );
            });

            });
        </script>
    </body>
</html>