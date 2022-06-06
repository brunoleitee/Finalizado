<?php

session_start();

$_SESSION['cidade'] = '';
$_SESSION['rua'] = '';
$_SESSION['estado'] = '';
$_SESSION['cepend'] = '';

require_once "Conexao.php";

if (isset($_POST["buscar"])) {
  // API Consulta de CEP


  if (isset($_POST['cep'])) {
    $NO_CEP = $_POST['cep'];
    $_SESSION['cepend'] = $NO_CEP;
  }

  $url = "http://viacep.com.br/ws/" . $NO_CEP . "/json/";
  $CEP = json_decode(file_get_contents($url));

  if (isset($CEP->logradouro)) {
    $_SESSION['cidade'] = $CEP->localidade;
    $_SESSION['rua'] = $CEP->logradouro;
    $_SESSION['estado'] = $CEP->uf;
  } else {
    echo '
        <script>
          window.alert("CEP não localizado!");
        </script>
    ';
  }
  echo '
        <script>
          location.href="cadastro.php";
        </script>
      ';
}

//  Botao VOLTAR

if (isset($_POST["voltar"])) {
  echo '
    <script>
      location.href="index.php";
    </script>
  ';
}

if (isset($_POST["cadastro"])) {

  try {

    $nome = $_POST['nome'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $referencia = $_POST['referencia'];
    $descricao = $_POST['descricao'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $cep = $_POST['cep'];

    $query = $Conexao->prepare('INSERT INTO cadastro(nome,estado,cidade,referencia,descricao,rua,numero,cep)VALUES (:nome,:estado,:cidade,:referencia,:descricao,:rua,:numero,:cep)');

    $query->bindParam('nome', $nome, PDO::PARAM_STR);
    $query->bindParam('estado', $estado, PDO::PARAM_STR);
    $query->bindParam('cidade', $cidade, PDO::PARAM_STR);
    $query->bindParam('referencia', $referencia, PDO::PARAM_STR);
    $query->bindParam('descricao', $descricao, PDO::PARAM_STR);
    $query->bindParam('rua', $rua, PDO::PARAM_STR);
    $query->bindParam('numero', $numero, PDO::PARAM_STR);
    $query->bindParam('cep', $cep, PDO::PARAM_STR);
    $query->execute();

    echo '
       <script>
         window.alert("Dados inseridos com sucesso!");
         location.href="cadastro.php";
       </script>
       ';
  } catch (Exception $e) {
    echo '
       <script>
         window.alert("Erro ao inserir dados");
         location.href="cadastro.php";
       </script>
       ';
    // echo $e->getMessage();
  }
}
