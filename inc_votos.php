<!DOCTYPE html>
<html>
<?php
include 'inc_titulopg.php';
include 'inc_conecta.php';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/votos.css" rel="stylesheet">
    
</head>


<body>



    <div class="row text-left col-lg-12" style="display:flex; align-items:center; justify-content:center;">

        <!-- enctype="multipart/form-data" permite ao form enviar arquivos -->

        <form role="form" method="post" action="inc_votos2.php" enctype="multipart/form-data" class="col-lg-6">


            <div class="col-sm-11">

                <div class="col-sm-12">
                    <div class="form-group ">
                        <label for="descricao" class="text-left">Informe seus dados para prosseguir:</label>
                        <input type="text" class="form-control " id="nome" name="nome" required placeholder="Nome"
                            require autofocus style="margin-bottom:1rem;">
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email"
                            required autofocus>
                    </div>
                </div>
                <div class="form-group  text-center">
                    <input type="submit" class="btn btn-danger" value="Enviar">
                    <input type="reset" class="btn btn-warning" value="Limpar">

                </div>
            </div>
            <?php
            if (isset($_GET['id'])) {
                // Obtém o ID do filme da URL
                $idfilme = $_GET['id'];
                echo "<input style='display:none;' type='hidden' value='$idfilme' name='idfilme' id='idfilme' checked";
            }
            ?>
        </form>
        <div class="image-display col-lg-6">
            <?php
            // Verifica se o parâmetro ID foi fornecido na URL
            
            if (isset($_GET['id'])) {
                // Obtém o ID do filme da URL
                $idfilme = $_GET['id'];
                echo "<input style='display:none;' type='hidden' value='$idfilme' name='idfilme' id='idfilme' checked";

                // Consulta para obter detalhes do filme com base no ID
                $query = "SELECT * FROM filmes WHERE id = $idfilme";
                $result = $conn->query($query);

                // Verifica se a consulta retornou algum resultado
                if ($result->num_rows > 0) {
                    // Obtém os detalhes do filme
                    $filme = $result->fetch_assoc();
                    // Exibe as informações do filme na tela
            
                    echo "<h2>" . $filme['nome'] . "</h2>";
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
        </div>

    </div>



    <div class="col-lg-12 text-center p-6 bg-danger mb-2">
        <h3>A cada <span class="font-weight-bold text-danger">50</span> votos você troca por um ingresso, aproveite!</h3>
    </div>

</body>

</html>
<?php
include 'inc_rodape.php';
?>