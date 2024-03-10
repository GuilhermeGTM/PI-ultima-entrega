<?php
include 'inc_titulopg.php';
?>

<div class="container text-center flex">
    <script>
        function imprime(ticket) {
            ticket = document
            print(ticket)
        };
        function handleClickReturn() {
            let voltar = document.getElementById('btn-voltar');
            voltar.addEventListener('click', function () {
                document.location.href = 'pagina_comercial.php';
            })
    }
    </script>
    <div class="col text-left">
        <h1> Obrigado(a) pelo seu voto, aqui está seu ingresso</h1>
        <h3>Ingresso válido por apenas 15 dias, aproveite</h3>
    </div>




    <form class="col">
        <figure class="text-center">
            <img src="icones/ticket.png" alt="ingresso" class="figure-img img-fluid mx-auto rounded"
                style="width:40rem; height:40rem;">
        </figure>
        <div>
            <button type="button" class="btn btn-info btn-lg aria-pressed='true'" value="imprimir" name="imprimir"
                onclick="imprime()"> Imprimir <i class="bi bi-printer"></i>
            </button>
            <button type="button" id="btn-voltar" class="btn btn-success btn-lg aria-pressed='true'" value="voltar"
                name="voltar" onclick="handleClickReturn()"> Voltar </button>

        </div>


    </form>
</div>

<?php
include 'inc_rodape.php';