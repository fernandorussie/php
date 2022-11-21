<?php
	$tipo = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_STRING);
  
  // if(isset($_POST['email']) || isset($_POST['senha'])) {

  //   if(strlen($_POST['email']) == 0) {
  //     echo "Preencha seu e-mail";
  //   } else if(strlen($_POST['senha']) == 0) {
  //     echo "Preencha sua senha";
  //   } else {
  //     if(!isset($_SESSION)) {
  //       session_start();
  //     }
  //     $query_usuario = "INSERT INTO usuarios
  //                   (nome, email, senha) VALUES
  //                   (:nome,:email,:senha)";
  //     $cad_usuario = $mysqli->prepare($query_usuario);
  //     $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
  //     $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
  //     $cad_usuario->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
  //     $cad_usuario->execute();
  //     header("Location: sendemail.php");
  //   }
  // }

  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div class="container mt-5 p-5" style="background-color: #B0C4DE;">
      <h3>Cadastro de <?= $tipo; ?></h3> 

      <form  class="form-horizontal" method="POST" action="processa.php">
        <div class="form-group">
          <label class="col-sm-2 control-label" for="nome">Nome</label>
          <div class="col-sm-10">
            <input type="text" name="nome" id="nome" class="form-control" />
          </div>
          <label class="col-sm-2 control-label" for="email">E-mail</label>
          <div class="col-sm-10">
            <input type="text" name="email" id="email" class="form-control" />
          </div>
          <label class="col-sm-2 control-label" for="senha">Senha</label>
          <div class="col-sm-10">
            <input type="password" name="senha" id="senha" class="form-control" />
          </div>
          <label class="col-sm-2 control-label" for="confirmacao">Redigite</label>
          <div class="col-sm-10">
            <input type="password" name="senha" id="confirmacao" class="form-control" />
            <input style="display:none" type="number" name="credito" value="0">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10 d-flex justify-content-between">
          <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#ExemploModalCentralizado">Confirmar</button>
          <a href="index.php">Voltar</a>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
