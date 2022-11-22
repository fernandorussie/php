<?php
$tipo = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_STRING);
include_once('protect.php');
include_once('conexao.php');
echo uniqid(rand(), true)
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serviço Fácil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>  
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
                <option>Bombeiro</option>
                <option>Eletricista</option>
                <option>Mecanico</option>
            </select>
        </div>
        </div>
        <div class="row mt-2">
            <div class="col-5">
                <!-- <ul>
                    <li>Vazamento em torneira</li>
                    <li>Vazamento em descarga</li>
                    <li>Vazamento no teto</li>
                </ul> -->
                <textarea class="form-control" name="descricao_servico" size="3" id="validationTextarea" placeholder="" required></textarea>
            </div>
        </div>
        <div class="">
            <div class="col-sm-offset-2 col-sm-10 mt-3">
                <button type="submit" class="btn btn-default">Escolher</button>
            </div>
        </div>
        <!-- <input style="display:none" type="text" name="numero_id" value=""> -->
        <input style="display:none" type="hidden" name="preco_servico" value="80">
        <input style="display:none" type="hidden" name="status_servico" value="1">
    </form>
    </div>
</body>

</html>