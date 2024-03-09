<?php
session_start();
$mensagem = "";

// verifica se existe a variavel $_POST["email"]
// se existe: o formulario foi preenchido
if (isset($_POST["email"])){
   
    //obtem os campos preenchidos do formulario
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    // inclui o codigo de conexao com o BD
    include "inc_conecta.php";
    
    
    // consulta verificar se e-mail e senha estão cadastrados
    $sql = "SELECT * FROM usuarios where email='$email' and senha=md5('$senha') ";
    // executa o comando SQL
    $result = $conn->query($sql);

    // se encontrou 1 registro
if ($result->num_rows == 1) {
    
    // recupera a linha obtida da consulta SQL
    $row = $result->fetch_assoc();
    
    //define as variaveis de sessao
    $_SESSION["usuario"] = $row["nome"];
    $_SESSION["logado"] = 1;
    
    // carrega a página principal da área restrita
    header("location: index.php");
    
    
} else {
    $mensagem = "Login/Senha incorretos";
}
$conn->close();
    
    
    
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Top Filmes - Área Acesso Restrito</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/login.css" rel="stylesheet">
    <div style=" padding: 50px; text-align: center; background: #242F49; margin-top: -3em; display: flex;">
      <img src="./icones/Movie Projector.png" alt="" style="width:4em">
      <img src="./icones/Film Reel.png" alt="" style="width:4em">
    </div>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <div>
          <h2 style="font-family: monospace;">Login</h2>
          <img src="./icones/icon-user.png" alt="a" style="width: 35px; margin-left: 18em; margin-top: -5em;">
        </div>
        <div style="margin-bottom: 1.5em;">
          <h4 style="font-family: monospace;"></h4>
          <input style="border-radius: 0.5em;" type="email" id="inputEmail" name="email" class="form-control" placeholder="E-mail de Acesso" required autofocus>
          <h4 style="font-family: monospace;"> </h4>
          <input style="border-radius: 0.5em; type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
        </div>
        
        <button class="btn btn-lg btn-danger btn-block" style="border-radius: 16px;" type="submit">Entrar</button>
      </form>
        <h4 class="text-center text-danger"> <?= $mensagem ?> </h4>
    </div> <!-- /container -->
    <div class="col-sm-5"></div>
    <div class="col-sm-2">
         <h2> <a href="pagina_comercial.php" class="btn btn-primary btn-block" role="button" style="border-radius: 8px;"> Pagina Comercial </a> </h2>
        </div>
     
  </body>
</html>
