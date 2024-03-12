<?php
include 'inc_titulopg.php';
include 'inc_conecta.php';

?>


<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-9">
            <h2> Vote no Filme </h2>
        </div>
        <div class="col-sm-2" style="margin-left: 8%;">
            <h2> <a href="inc_grafico.php" class="btn btn-danger btn-block" role="button"> Resultado </a> </h2>
        </div>
        <div class="container-fluid">
            <table class="table w-auto">
                
                <thead>
                    <tr>
                        
                        <th class="text-center"> Nome do Filme </th>
                        <th class="text-center"> Genero </th>
                        <th class="text-center"> Nota </th>
                        <th class="text-center"> Foto </th>
                                               
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    include 'inc_conecta.php';

// variável contendo comando para recuperar os registros cadastrados no banco de dados
                    $sql = "SELECT id, nome, genero, nota FROM filmes ORDER BY id";
// executa a instrução SQL
                    $result = $conn->query($sql);

// num_rows: indica o número de registros obtidos
                    if ($result->num_rows > 0) {
                        
                        $total= 0;
                        //obtem numero de registros selecionados
                        $num = $result-> num_rows;
// output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $nome = $row['nome'];
                            $clube = $row['genero'];
                            $nota = $row['nota'];
                            
                           
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['genero'] . "</td>";
                            echo "<td> <i style='color:#EEA236; padding:1rem'class='bi bi-star-fill'></i>". $row["nota"] . "</td>";
                            echo "<td > <img src='figuras/$id.jpg' style='width: 25%; height: 25%'> </td>";
                            echo "<td><a href='inc_votos.php?id=$id'  class='btn btn-danger btn-lg' role='button'> Votar </a>
                          </td></tr>";
                        }
                    } else {
                        echo "Não há Filmes cadastrados";
                    }
                    
                  
                    
                    $conn->close();
                    ?>            
                </tbody>
            </table>
        </div>        
    </div>         
</div> 
</div>
<?php
include 'inc_rodape.php';