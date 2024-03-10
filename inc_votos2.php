<?php
include 'inc_titulopg.php';
include 'inc_menupg.php';
?>

<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-12">
            <h2> Situação do Voto </h2>
            <?php
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $idC = $_POST['idfilme'];

            include 'inc_conecta.php';



            $sql = "INSERT INTO votos (cod_filmes, nome, email)
                 VALUES ('$idC', '$nome', '$email')";


            echo "<p> Nome: $nome </p>";
            echo "<p> Email: $email </p>";


            // executa a instrução sql acima
            if ($conn->query($sql) === TRUE) {
                // obtém o id do registro inserido
                $last_id = $conn->insert_id;
                echo "<h3 class='text-primary'> Voto Confirmado, Obrigado Pela Colaboração... </h3>";
                $votosUser = "SELECT COUNT(*) c FROM votos WHERE email='$email'";
                $result = $conn->query($votosUser);

                $rows = $result->fetch_all();
                $votos = $rows[0][0];
                echo "<h4 class='fs-1'> Você tem <span class='text-info fs-2'> $votos </span> votos<h4>";
                if ($votos >= 50) {
                    echo "<button type='submit' id='ingresso' class='btn btn-info btn-lg aria-pressed='true' btn-block'>Trocar pontos por ingresso</button>";
                    echo "
                    <script>
                let btn_ticket = document.getElementById('ingresso');
                btn_ticket.addEventListener('click', function () {
                    document.location.href = 'inc_ingresso.php';
                       })
            </script>
            ";
                }

            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }


            $conn->close();


            ?>
        </div>
    </div>
</div>
<?php
include 'inc_rodape.php';
