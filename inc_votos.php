<!DOCTYPE html>
<html>
<?php
include 'inc_titulopg.php';
include 'inc_menupg.php';
include 'inc_conecta.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/votos.css" rel="stylesheet">
    
</head>
    <body>


<div class="col-sm-9">
    <div class="row">  
    
       <?php 
         // Verifica se o parâmetro ID foi fornecido na URL
         
    if(isset($_GET['id'])) {
    // Obtém o ID do filme da URL
    $idfilme = $_GET['id'];
    echo "<input style='display:none;' type='radio' value='$idfilme' name='idfilme' id='idfilme' checked";
    
    // Consulta para obter detalhes do filme com base no ID
    $query = "SELECT * FROM filmes WHERE id = $idfilme";
    $result = $conn->query($query);
    
    // Verifica se a consulta retornou algum resultado
    if($result->num_rows > 0) {
        // Obtém os detalhes do filme
        $filme = $result->fetch_assoc();
        // Exibe as informações do filme na tela
        ?>
         <div>
        <?php
        
        echo '<strong class= "titulo">' . $filme["nome"] . '</strong>';  ?> </div> <?php

        echo "<p><strong>Gênero:</strong> " . $filme['genero'] . "</p>";
        echo "<td> <img src='figuras/$idfilme.jpg' style='width: 200px; height: 300px; float: left' > </td>";
        ?>
        <div>
            <?php echo '<p class ="elemento" >' . $filme['sinopse'] . '</p>' ?>
        </div>
        <?php
        // Adicione mais campos conforme necessário
    } else {
        // Se nenhum filme correspondente foi encontrado, exibe uma mensagem de erro
        echo "Nenhum filme encontrado com o ID fornecido.";
    }
} else {
    // Se nenhum ID de filme foi fornecido na URL, exibe uma mensagem de erro
    echo "ID do filme não fornecido.";
}
                        ?>
        <!-- enctype="multipart/form-data" permite ao form enviar arquivos -->
 
        <form role="form" method="post" action="inc_votos2.php" enctype="multipart/form-data">
 
                                 
            <div class="col-sm-1"></div> 

 
            <div class="col-sm-11">  
 
                <div class="col-sm-8">
                    <br></br>
                    <div class="form-group">
                    <?php 
                        
                        $idfilme = $_GET['id'];
                   
                       
                        echo "<input style='display:none;' type='radio' value='$idfilme' name='idfilme' id='idfilme' checked";
                        
                        ?>

                        <label for="descricao">Informe seus dados para prosseguir:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome" require autofocus>
 
                    </div>
                </div>
                <div class="col-sm-8">    
 
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
 
                    </div>
 
                </div>
 
                <div class="col-sm-12">    
 
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Enviar">
                        <input type="reset" class="btn btn-warning" value="Limpar">
 
                    </div>    
 
                </div>
        </form>
    </div>
 
</div> 
 
</div>
</div>
    </body>
</html>
<?php
include 'inc_rodape.php';
?>
