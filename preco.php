<?php
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Confirmar Preço</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                            <td>Bombeiro Hidráulico</td>
                        </tr>
                        <tr>
                            <td>Serviço:</td>
                            <td>Vazamento em descarga</td>
                        </tr>
                        <tr>
                            <td>Preço:</td>
                            <td>R$ 200,00</td>
                        </tr>
                        <tr>
                            <td>Seu crédito:</td>
                            <td>R$ 10,00</td>
                        </tr>
                        <tr>
                            <td>Valor a ser cobrado:</td>
                            <td>R$ 190,00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group d-flex">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#ExemploModalCentralizado">Confirmar</button>
                    <button type="submit" class="btn btn-default">
                        <a href="listasolicitacao.php">Cancelar</a>
                        </button>
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
                    <p>Numero de solicitação: 8727362</p>
                    <p>Prestador: artur@gmail.com</p>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <p><a href="listasolicitacao.php">Ir para sua lista de solicitações</a></p>
                </div>
            </div>
            </div>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
