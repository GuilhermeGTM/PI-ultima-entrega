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
            $email= $_POST["email"];                  
            $idC= $_POST['idfilme'];  
            
            include 'inc_conecta.php';
             
             
          
            $sql = "INSERT INTO votos (cod_filmes, nome, email)
                 VALUES ('$idC', '$nome', '$email')";
                
 
            echo "<p> Nome: $nome </p>";
            echo "<p> Email: $email </p>";
           
           
            // executa a instrução sql acima
            if ($conn->query($sql) === TRUE) {
                // obtém o id do registro inserido
                $last_id = $conn->insert_id;
                echo "<h3> Voto Confirmado, Obrigado Pela Colaboração... </h3>";
                $votosUser = "SELECT COUNT(*) c FROM votos WHERE email='$email'";
                $result = $conn->query($votosUser);

                $rows = $result->fetch_all();
                $votos = $rows[0][0];
                echo "<h4> Você tem <span class='text-info'> $votos </span> votos<h4>";
                          
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
