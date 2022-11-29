<?php
session_start();
ob_start();
include_once ('conexao.php');
include_once('protect.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista Solicitação</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5 pt-5">
            <div class="w-25 d-flex justify-content-around">
                <div>
                    <p>Cliente: <?php echo $_SESSION['nome'];?></p>
                    <p>Crédito: R$ <?php echo $_SESSION['credito'];?>,00</p>
                </div>
                <span>|</span>
                <a href="logout.php">Sair</a>
            </div>    
            <div class="form-group">
                <table class="table table-borderless">
                    <thead>
                        <h3>Minha lista de solicitações</h3>  
                        <a href="criar_servico.php">Criar nova solicitação</a>
                    </thead>
                    <div class="mt-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                    <tbody>
                        <tr>
                            <th>Numero:</th>
                            <th>Data:</th>
                            <th>Serviço:</th>
                            <th>Status:</th>
                        </tr>
                        <?php 
                        $id = $_SESSION['id'];
                        $query_servico = "  SELECT *
                                            FROM servicos as s
                                            INNER JOIN clientes as c
                                            ON s.id_cliente = c.id
                                            WHERE c.id = $id
                                            ORDER BY numero_id DESC";
                        $result_servico = $conn->prepare($query_servico);
                        $result_servico->execute();

                        while($row_servico = $result_servico->fetch(PDO::FETCH_ASSOC)){
                            // var_dump($row_servico);
                            extract($row_servico);
                        
                        ?>
                        
                        <tr>
                            <td><?php echo "$numero_id"; ?></td> 
                            <td><?php echo "$dia_pedido"; ?></td> 
                            <td><?php echo "$nome_servico"?></td>
                            <td><?php echo "$descricao_servico"?></td>
                            <td>
                                <div class="d-block">
                                    <?php 
                                    if($status_servico == "1"){
                                       echo " <p href='#'>
                                       Aguardando</p>";
                                    }elseif($status_servico == "2"){
                                        echo " <p href='#'>
                                       Executado</p>";
                                    }
                                    ?>
                                    <?php 
                                    if($status_servico == "1"){
                                       echo "
                                       <form method='post' action='excluir_servico.php'>
                                       <input type='hidden' name='id' value='$numero_id'>
                                       <button type='submit' style='border:none; color: #007bff;
                                       text-decoration: none;
                                       background-color: transparent;'>Cancelar</button>
                                       </form>";
                                    }elseif($status_servico == "3"){
                                        echo " <a href='avaliacao.php'>
                                       Avaliar</a>";
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
                <div class="mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
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
                <h5 class="modal-title" id="TituloModalCentralizado">Pendencia informada pelo Prestador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p><?php echo $_SESSION['nome'];?>, seu prestador informou a pendência:</p>
                    <p>Preciso de 10 metros de fio de 2,5mm</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#ExemploModalCentralizado">Ok</button>
            </div>
            </div>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
