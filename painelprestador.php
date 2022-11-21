<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Painel do Prestador</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5 pt-5">
            <div class="w-25 d-flex justify-content-around">
                <p>Prestador: jorge@ymail.com</p> 
                <span>|</span>
                <a href="#">Sair</a>
            </div>    
            <div class="form-group">
                <table class="table table-borderless">
                    <thead>
                        <h3>Painel do Prestador</h3>  
                    </thead>
                    <tbody>
                        <th>Novo serviço solicitado:</th>
                        <tr>
                            <td>Cliente:</td>
                            <td>
                                <a href="#">mbelo.br@gmail.com</a>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>Tipo de serviço:</td>
                            <td>Bombeiro Hidráulico</td>
                            <td>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Iniciar</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Serviço:</td>
                            <td>Vazamento em descarga</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <th>Serviço em execução:</th>
                        <tr>
                            <td>Número:</td>
                            <td>8743462</td>
                            
                        </tr>
                        <tr>
                            <td>Serviço:</td>
                            <td>Gasista - Conserto de vazamento</td>
                            <td>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Colocar Pendente</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Cliente:</td>
                            <td>francisco@ymail.com</td>
                            <td>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Concluir</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <th>Serviço Pendentes:</th>
                        <tr>
                            <th>Numero:</th>
                            <th>Data:</th>
                            <th>Serviço:</th>
                            <th>Cliente/Motivo:</th>
                        </tr>
                        <tr>
                            <td>8743462</td> 
                            <td>01/03/2022</td>
                            <td>Bombeiro Hidraulico - Vazamento em descarga</td>
                            <td>ana@yahoo.com.br / Aguardando comprar cano</td>
                            <td><a href="#">Continuar</a></td>
                        </tr>
                        <tr>
                            <td>8273028</td> 
                            <td>20/01/2022</td>
                            <td>Eletricista - Interruptor não funciona</td>
                            <td>claudio@yahoo.com.br / Aguardando comprar interruptor</td>
                            <td><a href="#">Continuar</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#ExemploModalCentralizado">Confirmar</button>
                </div>
            </div> -->
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
                    <p><a href="#">Ir para sua lista de solicitações</a></p>
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
