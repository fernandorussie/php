<?php
    
    include_once('conexao.php');
    include_once('protect.php');
    $tipo = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_STRING);
    // $id_selected = $_POST['str_id'];
    // var_dump($_POST['str_id']);
    $aleatorio = rand(1,2);
   
    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serviço Fácil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  </head>

<body>
    <div class="container mt-5 pt-5">
    <h2>Escolha o serviço desejado</h2>
    <form  id="form" class="form-horizontal mt-5" method="post" action="confirma_servico.php">
        <div>
            <div class="row mt-5">
                <div class="col-2">
                    <label for="" class="">Tipo de Serviço:</label>
                </div>
                <div class="col-3">
                    
                    <select class="custom-select" name="nome_servico" id="select-tipo-servico" required>
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
                            $id_servico = $cod_servico;
                    ?>
                        <option value="<?=$cod_servico?>">
                            <?=$nome_servico?>
                        </option>
                    <?php             
                        }
                        
                    ?>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2">
                    <label for="" class="">Serviço:</label>
                </div>
                <div class="col-5">
                    <select multiple class="form-control" name="descricao_servico" id="subcategoria" required></select>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-2">
                    <label for="dia_pedido">Escolha a data para o serviço:</label>
                </div>
                <div class="col-5">
                    <input type="date" name="dia_pedido" id="" required>
                </div>
            </div>
            <div class="">
                <div class="col-sm-offset-2 col-sm-10 mt-5">
                    <button type="submit" class="btn btn-default">Escolher</button>
                </div>
            </div>
        </div>
        
        <input style="display:none;" id="cod_produto" type="hidden" name="cod_produto">
        <input style="display:none" type="hidden" name="status_servico" value="1">
        <input style="display:none" type="hidden" name="id_prestador" value="<?=$aleatorio?>">
        <input style="display:none" type="hidden" name="email_prestador" value="prestado<?=$aleatorio?>@teste.com.br">
        <input style="display:none" type="hidden" name="preco_produto" value="">
    </form>
    </div>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 

    <script src="./index.js"></script>
    <script>


        $(document).ready(()=>{
            $("#subcategoria").on("change", function()
            {
                var value = this.value;
                $("#cod_produto").val(value);
                console.log(value);
            }
            );
        });

</script>
</body>

</html>