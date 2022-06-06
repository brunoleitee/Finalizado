<?php

require_once "Conexao.php";

try {
    $Conexao    = Conexao::getConnection();
} catch (Exception $e) {
    function_alert($e->getMessage());
    exit;
}

if (isset($_POST["cadastrar"])) {
    echo '
    <script>
      location.href="cadastro.php";
    </script>
  ';
}

if (isset($_POST["buscar"])) {



    try {

        // $tipobusca =
        $tipobusca = $_POST['tipobusca'];
        if ($tipobusca == '1') {
            $cep = $_POST['buscar'];
            $nome = '';
        } else {
            $cep = '';
            $nome = $_POST['buscar'];
        }

        $query = $Conexao->prepare('SELECT *          
                                    FROM Consulta(:CEP,:nome)
                                    ORDER BY nome;');

        $query->bindParam('CEP', $cep, PDO::PARAM_STR);
        $query->bindParam('nome', $nome, PDO::PARAM_STR);
        $query->execute();

        $Resultado = $query->fetchAll();

        $QtRegistros = count($Resultado);

        if ($QtRegistros == 0) {
            function_alert('Nenhum endereço localizado.');
        }
    } catch (Exception $e) {
        function_alert($e->getMessage());
        exit;
    }
}

function function_alert($message)
{
    echo "<script>alert('$message');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2? família=Poppins:wght@200;400;500;700&display=swap" rel="stylesheet">
    <title>Ponto Turistico</title>
    <style>
        * {
            margin: 0;
        }

        body {
            width: 100vw;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
        }

        .s-header {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            height: 10rem;
        }

        .s-main-cadastro {
            text-align: center;
            border: 1px solid #ccc;
            padding: 40px;
            margin: 10px 70px;
        }

        .s-main-pesquisa {
            text-align: center;
            border: 1px solid #ccc;
            padding: 40px;
            margin: 10px 70px;
            color: rgb(0, 0, 0);
        }

        .s-main {
            margin-top: 4rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            color: rgb(0, 0, 0);
        }

        .s-input {
            font-size: 16px;
            width: 100%;
            padding: 10px;
            background: transparent;
            color: rgb(0, 0, 0);
            letter-spacing: 2px;
            border: none;
            outline: none;
            border-bottom: 1px solid #ccc;
            margin-top: 1rem;
        }

        /* Botao */

        button {
            background-color: #4286f4;
            border: none;
            border-radius: 4px;
            padding: 10px;
            margin-top: 1rem;
            color: rgb(255, 255, 255);
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        .s-button-1 {
            margin-top: 40px;
            cursor: pointer;
        }

        /* Tabela */
        table {
            margin-top: 40px;
            font-size: 20px;
            border-collapse: collapse;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        .s-tabela {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        tr td {
            padding: 15px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="s-header">
            <img src="./assets/LOGO.png" alt="">
            <h1>Seu ponto turístico</h1>
        </nav>
    </header>

    <form class="s-main" method="post">
        <div class="s-main-cadastro">
            <label>Cadastrar um ponto turístico</label><br>
            <button type="submit" name="cadastrar" id="cadastrar" value="cadastrar" class="s-button-1">Cadastrar</button>
        </div>

        <div class="s-main-pesquisa">
            <label>Encontre um Ponto Turístico</label><br>

            <input type="radio" id="local" name="tipobusca" value="0" checked>
            <label for="local">Local</label>

            <input type="radio" id="cep" name="tipobusca" value="1">
            <label for="cep">CEP</label>


            <input type="text" class="s-input" name="buscar" placeholder="Pesquise um local">
            <button type="submit" name="pesquisar" id="pesquisar" value="pesquisar">Pesquisar</button>
        </div>

        <!-- TABELA FORMULARIO -->
    </form>
    <h2>Locais Localizados</h2><br>
    <div hidden id="Tabela" name="Tabela" class="s-tabela">
        <table class="tabela" border=1>
            <tr>
                <td>Nome</td>
                <td>Estado</td>
                <td>Cidade</td>
                <td>Rua</td>
                <td>Numero</td>
                <td>Referência</td>
                <td>Descrição</td>
                <td>CEP</td>
            </tr>
            <?php
            if (isset($Resultado)) {
                foreach ($Resultado as $result) {
            ?>
                    <tr>
                        <td><?php echo $result['nome']; ?></td>
                        <td><?php echo $result['estado']; ?></td>
                        <td><?php echo $result['cidade']; ?></td>
                        <td><?php echo $result['rua']; ?></td>
                        <td><?php echo $result['numero']; ?></td>
                        <td><?php echo $result['referencia']; ?></td>
                        <td><?php echo $result['descricao']; ?></td>
                        <td><?php echo $result['cep']; ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
    <script>
        var Tabela = document.getElementById("Tabela");

        var QtRegistros = "<?php echo "$QtRegistros" ?>";

        if (QtRegistros > 0) {
            Tabela.hidden = false;
        }
    </script>
</body>

</html>