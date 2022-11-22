<?php
session_start();
ob_start();
include_once('conexao.php');

//Exemplo com criptografia de senha:

// echo password_hash(senha1, PASSWORD_DEFAULT);

//SEGUNDA FORMA DE LOGIN COM PDO
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(isset($_POST['email']) || isset($_POST['senha'])){
  if(strlen($_POST['email']) == 0){
    echo "Preencha seu email!";
  }elseif(strlen($_POST['senha']) == 0){
    echo "Preencha sua senha!";
  }else{
    var_dump($dados['tipo_login']);
    if($dados['tipo_login'] == 'cliente'){
      $query_usuario = "SELECT id,nome, email, senha, credito 
                        FROM clientes
                        WHERE email = :email 
                        LIMIT 1";
      $result_usuario = $conn->prepare($query_usuario);
      $result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
      $result_usuario->execute();
  
      if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        // var_dump($row_usuario);
        if($dados['senha'] === $row_usuario['senha']){
          // if(password_verify($dados['senha'], $row_usuario['senha'])){
          echo "Usuário logado!";
          $_SESSION['id'] = $row_usuario['id'];
          $_SESSION['nome'] = $row_usuario['nome'];
          $_SESSION['credito'] = $row_usuario['credito'];
          header("Location: listasolicitacao.php");
        }else{
          $_SESSION['msg'] = "Erro: Usuário ou senha inválida!";
        }
      }else{
        $_SESSION['msg'] = "Erro: Usuário ou senha inválida!";
      }
    }elseif($dados['tipo_login'] == 'prestador'){
      $query_usuario = "SELECT id,nome, email, senha 
                        FROM prestadores
                        WHERE email = :email 
                        LIMIT 1";
      $result_usuario = $conn->prepare($query_usuario);
      $result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
      $result_usuario->execute();
  
      if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        // var_dump($row_usuario);
        if($dados['senha'] === $row_usuario['senha']){
          // if(password_verify($dados['senha'], $row_usuario['senha'])){
          echo "Usuário logado!";
          $_SESSION['id'] = $row_usuario['id'];
          $_SESSION['nome'] = $row_usuario['nome'];
          header("Location: painelprestador.php");
        }else{
          $_SESSION['msg'] = "Erro: Usuário ou senha inválida!";
        }
      }else{
        $_SESSION['msg'] = "Erro: Usuário ou senha inválida!";
      }
    }
  }
  if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
}



// if (!empty($dados['SendLogin'])) {
//     var_dump($dados);
//     $query_usuario = "SELECT id, email, senha 
//                       FROM usuarios 
//                       WHERE email = :email 
//                       LIMIT 1";
//     $result_usuario = $conn->prepare($query_usuario);
//     $result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
//     $result_usuario->execute();

//     if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
//       $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
//       var_dump($row_usuario);
//       if(password_verify($dados['senha'], $row_usuario['senha'])){
//         echo "Usuário logado!";
//         
//       }else{
//         $_SESSION['msg'] = "Erro: senha inválida!";
//       }
//     }else{
//       $_SESSION['msg'] = "Erro: Usuário ou senha inválida!";
//     }
  
//   if(isset($_SESSION['msg'])){
//     echo $_SESSION['msg'];
//     unset($_SESSION['msg']);
//   }
// }

//Primeira forma de LOGIN
// if(isset($_POST['email']) || isset($_POST['senha'])) {

//   if(strlen($_POST['email']) == 0) {
//     echo "Preencha seu e-mail";
//   } else if(strlen($_POST['senha']) == 0) {
//     echo "Preencha sua senha";
//   } else {

//     $email = $pdo->quote($_POST['email']);
//     $senha = $pdo->quote($_POST['senha']);

//     $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
//     $sql_query = $pdo->query($sql_code) or die("Falha na execução do código SQL: " . $pdo->error);

//     $quantidade = $sql_query->num_rows;

//     if($quantidade == 1) {
        
//       $usuario = $sql_query->fetch_assoc();

//       if(!isset($_SESSION)) {
//         session_start();
//       }

//       $_SESSION['id'] = $usuario['id'];
//       $_SESSION['nome'] = $usuario['nome'];

//       header("Location: listasolicitacao.php");

//     } else {
//       echo "Falha ao logar! E-mail ou senha incorretos";
//     }

//   }
// }
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

    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body>

    <div class="container mt-5 p-5" style="background-color: #B0C4DE;">

      <h2>Tela de Login</h2>
      <form  class="form-horizontal mt-5" method="POST" action="">
      
        <div class="form-group">
          <label class="col-sm-2 control-label" for="email">E-mail</label>
          <div class="col-sm-10">
            <input type="text" name="email" id="email" class="form-control" value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>"/>
          </div>
          <label class="col-sm-2 control-label" for="senha">Senha</label>
          <div class="col-sm-10">
            <input type="password" name="senha" id="senha" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10 input-login">
            <button type="submit" class="btn btn-default">Entrar</button>
            <label for="tipo_login">Selecione a fomra de login
              <select name="tipo_login" class="form-control" id="tipo_login" tabindex="3">
                <option value="cliente" selected>Cliente</option>
                <option value="prestador">Prestador</option>
                <option value="administrador">Administrador</option>
              </select>
            </label>
          </div>
        </div>
        <p><a href="cadastro.php?tipo=1" value="1">Quero ser cliente do Serviço Fácil</a></p>
        <p><a href="cadastro.php?tipo=2" value="2">Sou profissional e quero me candidatar a prestar serviços</a></p>
      </form>
      </div>
    </body>
    </html>


        