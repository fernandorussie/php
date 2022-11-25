<?php
session_start();
ob_start();
include_once ('conexao.php');
include_once('protect.php');



//Logout simples
// if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
//     $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
//     header("Location: index.php");
// }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Painel do Prestador</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    </head>
    <body>
        <div class="container mt-5 pt-5">
            <div class="w-25 d-flex justify-content-around">
                <p>Prestador: <?php echo $_SESSION['nome'];?></p> 
                <span>|</span>
                <a href="logout.php">Sair</a>
            </div>    
            <div class="form-group">
                <table class="table table-borderless">
                    <thead>
                        <h3>Painel do Prestador</h3>  
                    </thead>
                    <tbody>
                        <th>Novo serviço solicitado:</th>
                        <tr>
                            <th>Cliente:</th>
                            <th>Tipo de serviço:</th>
                            <th>Serviço:</th>
                            
                        </tr>
                        <?php 
                        $id = $_SESSION['id'];
                        $query_servico = "  SELECT *
                                            FROM servicos as s
                                            INNER JOIN prestadores as p
                                            ON s.id_prestador = p.id
                                            WHERE p.id = $id
                                            ORDER BY numero_id DESC
                                            ";

                        $result_servico = $conn->prepare($query_servico);
                        $result_servico->execute();
                        
                        while($row_servico = $result_servico->fetch(PDO::FETCH_ASSOC)){
                            // var_dump($row_servico);
                            extract($row_servico);
                        
                            if($status_servico == "0"){

                        ?>
                        <tr>
                            <td>
                                <a href="#"><?php echo "$email_cliente";?></a>
                            </td>
                            <td><?php echo "$nome_servico";?></td>
                            <td><?php echo "$descricao_servico";?></td>
                            <tr>
                                <td>
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Iniciar</button>
                                    </div>
                                </td>
                            </tr>
                        </tr>
                        <?php }} ?>
                    </tbody>
                    <tbody id="selecao_status">
                        <th>Serviço em execução:</th>
                        <tr>
                            <th>Numero:</th>
                            <th>Cliente:</th>
                            <th>Serviço:</th>
                        </tr>
                        <?php
                            $query_servico = "  SELECT *
                                                FROM servicos as s
                                                INNER JOIN prestadores as p
                                                ON s.id_prestador = p.id
                                                WHERE p.id = $id
                                                ORDER BY numero_id ASC
                                                ";

                            $result_servico = $conn->prepare($query_servico);
                            $result_servico->execute();
                            while($row_servico = $result_servico->fetch(PDO::FETCH_ASSOC)){
                                // var_dump($row_servico);
                                extract($row_servico);
                                
                                if($status_servico == "1"){
                            $id_pedido = $numero_id;
                        ?>
                            
                                    <tr>
                                        <td><?php echo "$numero_id";?></td>
                                        <td><?php echo "$email_cliente";?></td>
                                        <td><?php echo "$descricao_servico";?></td>
                                        <tr>
                                            <td>
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-default">Colocar Pendente</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-sm-offset-2 col-sm-10">
                                                <input type="radio" name="<?=$numero_id?>" value="8">
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <form id="favoritar" action="update_status.php" method="POST">
                                            <input type="hidden" id="id_usuario" name="id_usuario">
                                            <input type="hidden" id="nota" name="nota">
                                        </form>
                                    </tr>
                                    <?php 
                                    break;
                                    
                                }elseif($status_servico == "4"){
                                    
                                    
                                    ?>
                                    <td>
                                        <h3>Não há serviço em execução</h3>
                                    </td>
                                    <?php
                                    break;
                                }
                            }
                                    ?>
                    </tbody>
                    <tbody>
                        <th>Serviço Pendentes:</th>
                        <tr>
                            <th>Numero:</th>
                            <th>Data:</th>
                            <th>Serviço:</th>
                            <th>Cliente/Motivo:</th>
                        </tr>
                        <?php
                            $query_servico = "  SELECT *
                                                FROM servicos as s
                                                INNER JOIN prestadores as p
                                                ON s.id_prestador = p.id
                                                WHERE p.id = $id
                                                ORDER BY numero_id ASC
                                                ";

                            $result_servico = $conn->prepare($query_servico);
                            $result_servico->execute();
                            while($row_servico = $result_servico->fetch(PDO::FETCH_ASSOC)){
                                // var_dump($row_servico);
                                extract($row_servico);
                                
                                if($status_servico == "2"){

                        ?>
                        <tr>
                            <td><?php echo "$numero_id";?></td> 
                            <td><?php echo "$dia_pedido";?></td>
                            <td><?php echo "$nome_servico";?> - <?php echo "$descricao_servico";?></td>
                            <td><?php echo "$email_cliente";?> / Aguardando comprar cano</td>
                            <td><a href="#">Continuar</a></td>
                        </tr>
                        <?php }}?>
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


        <script>
            $(function() {
                $("#selecao_nota input[type=radio]").bind("click",
                function()
                {
                    var str_id = this.name;
                    $("#id_usuario").val( str_id[1]);
                    $("#nota").val( this.value);
                    $("#favoritar").submit();
                }
                );
            });
        </script>
    </body>
</html>
