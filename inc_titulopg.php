<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title> Top Filmes </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <script src="bootstrap/jquery.js"></script>
    <script src="bootstrap/bootstrap.js"></script>
</head>

<body>
    <div>

        <div style=" background: #242F49; color: white; display:flex; align-items:center; justify-content:center; padding:1rem" class="navbar navbar-expand-lg ">
            <div class="col-sm-6">
                <img src="./icones/Movie Projector.png" alt="" style="width:4em">
                <img src="./icones/Film Reel.png" alt="" style="width:4em">
            </div>
            <div class="col-sm-4">
                <?php
                include 'inc_menupg.php';
                ?>
            </div>
            <div class="col-sm-4 text-center d-flex-2">
                <img src="./icones/icon-user.png" alt="a" style="width: 10%; height:10%; margin-top: 0.5em; ">
                <h4 style="font-family: monospace;"> Usuário: PI Senac</h4>
                <a href="logout.php" class="btn btn-danger">  Sair </a>
            </div>
    </div>