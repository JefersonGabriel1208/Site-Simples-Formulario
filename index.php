<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Museu De Computação</title>
    <link rel="stylesheet" type="text/css" href="novo.css?v=1.0" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div>
        <h1 id="titulo">Doações Para Museu de Computação Prof.Odelar Leite Linhares</h1><br>
        <section>
    </div>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>


    <form method="POST" action="proc_cad_img.php" enctype="multipart/form-data">

        <fieldset class="grupo">
            <div class="campo">
                <label for="Nome"><strong>1.Nome do doador:</strong> </label>
                <input type="text" name="nome" placeholder="Nome Completo" required><br>
            </div>

            <div class="campo">
                <label for="email"><strong>2.Email para contato:</strong></label>
                <input type="email" name="email" placeholder="Seu melhor e-mail"><br>
            </div>


            <div class="campo">
                <label for="telefone"><strong>3.Telefone:</strong></label>
                <input type="text" name="telefone" placeholder="Celular com DDD "><br>
            </div>

            <div class="campo">
                <label for="Endereco"><strong>4.Endereço de coleta:</strong> </label>
                <textarea rows="6" style="width: 26em" name="endereco" placeholder="inclua Rua, número, cidade e CEP"></textarea><br>
            </div>

            <div class="campo">
                <label><strong>5. O que você esta doando?</strong></label>
                <textarea rows="6" style="width: 26em" name="qualproduto" placeholder="Computadores,Periféricos, calculadoras, etc. ."></textarea><br>

            </div>

            <div class="campo">
                <label><strong>6.Marca e modelo do objeto doado:</strong></label>
                <input type="text" name="marcaemodelo" placeholder="Marca, modelo, ano. ."><br>
            </div>

        </fieldset>

        <footer>
            <p>&copy;<strong> Por favor nos envie uma foto do objeto que deseja doar ao nosso museu, no E-mail abaixo:<strong></p>
        </footer>
        <footer>
            <p>&copy;<strong>claudio@icmc.usp.br</strong></p>
        </footer><br>

        <div>
            <input name="SendCadImg" type="submit" value="Enviar">
        </div>



        <footer>
            <p>&copy; 2024 - Museu de Computação São Carlos - Todos os direitos reservados</p>
            <p><strong></p><a href="https://mc.icmc.usp.br/" style='color:white;' target="_blank"> https//mc.icmc.usp.br/</a></strong> </p>
        </footer><br>

    </form>

    <div class="foto">
        <img id="imagem" src="logo.jpeg" alt="logo">
    </div>
    </section>
</body>

</html>