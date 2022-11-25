<?php
    
    include_once('conexao.php');
    include_once('protect.php');
    $tipo = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_STRING);
   
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serviço Fácil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
  </head>

<body>
    <div class="container mt-5 pt-5">
    <h2>Escolha o serviço desejado</h2>
    <form  class="form-horizontal mt-5" method="post" action="criar_solicitacao.php">
    <div class="row mt-5">
        <div class="col-2">
            <label for="" class="">Tipo de Serviço</label>
        </div>
        <div class="col-3">
            
            <select class="custom-select" name="nome_servico" id="select-tipo-servico">
                <option selected>Escolha o Tipo</option>
            <?php 
                $id = $_SESSION['id'];
                $query_lista_produto = "    SELECT *
                                            FROM lista_produto_servico";
                $result_lista_produto = $conn->prepare($query_lista_produto);
                $result_lista_produto->execute();

                while($row_lista_produto = $result_lista_produto->fetch(PDO::FETCH_ASSOC)){
                    // var_dump($row_lista_produto);
                    extract($row_lista_produto);
                
            ?>
                <option><?=$nome_servico?></option>
            <?php             
                }
                
            ?>
            </select>
        </div>
        
        </div>
        <div class="row mt-2">
            <div class="col-5">
               
            <select multiple class="form-control" id="exampleFormControlSelect2" name="descricao_servico">
                <?php 
                    
                    $query_produto = "  SELECT *
                                        FROM produto_servico as ps 
                                        INNER JOIN lista_produto_servico as lps 
                                        WHERE ps.cod_produto = lps.cod_servico 
                                        LIMIT 3";
                    $result_produto = $conn->prepare($query_produto);
                    $result_produto->execute();

                    while($row_produto = $result_produto->fetch(PDO::FETCH_ASSOC)){
                        // var_dump($row_lista_produto);
                        extract($row_produto);
                    
                ?>
                    <option><?=$nome_produto?></option>
                <?php 
                    } 
                ?>    
            </select>
                <!-- <textarea class="form-control" name="descricao_servico" size="3" id="validationTextarea" placeholder="" required></textarea> -->
            </div>
        </div>
        <div class="">
            <div class="col-sm-offset-2 col-sm-10 mt-3">
                <button type="submit" class="btn btn-default">Escolher</button>
            </div>
        </div>
        <input style="display:none" type="hidden" name="preco_servico" value="80">
        <input style="display:none" type="hidden" name="status_servico" value="1">
        <input style="display:none" type="hidden" name="id_prestador" value="2">
        <input style="display:none" type="hidden" name="email_prestador" value="prestado2@teste.com.br">
        <input style="display:none" type="hidden" name="dia_pedido" value="<?php date('d/m/Y'); ?>">
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>  

    <script></script>
</body>

</html>