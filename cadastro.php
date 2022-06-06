<?php

session_start();
// include('inserir.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2? família=Poppins:wght@200;400;500;700&display=swap" rel="stylesheet">
    
    <style>
      html, body {
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Roboto, Arial, sans-serif;
      font-size: 15px;
      }
      form {
      border: 5px solid #f1f1f1;
      }
      .s-input{
      width: 100%;
      padding: 16px 8px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      }
      .end{
        display: flex;
        width: 90%;
        padding: 16px 8px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        margin-left: 10px;
      }
      .select{
        border: 1px solid #ccc;
      }
      .endereco{
        display: flex;
      }
      
      button {
      background-color: #4286f4;
      color: white;
      padding: 14px 0;
      border: none;
      cursor: pointer;
      width: 48%;
      }
      button:hover {
      opacity: 0.8;
      }
      h1 {
      text-align:center;
      font-size:18;
      }
      .formcontainer {
      text-align: center;
      margin: 24px 50px 12px;
      }
      .container {
      padding: 16px 0;
      text-align:left;
      }
    
    </style>
    <title>Cadastro</title>
  </head>
  <body>

    <form method="post" action="inserir.php">
      
    <h1>CADASTRAR</h1>
      <div class="formcontainer">
        <div class="container">

          <label for="nome"><strong>CEP</strong></label>
          <input class="s-input" type="text" value="<?php echo $_SESSION['cepend']; ?>" placeholder="Entre com o cep..." name="cep" id="cep" >
          <button type="submit" name="buscar" value="buscar" disabled="disabled" id="buscarCep">Buscar</button><br>


          <label for="nome"><strong>Nome</strong></label>
          <input class="s-input" type="text" placeholder="Entre com o nome..." name="nome" id="nome" required>

          <label for="endereco"><strong>Endereço</strong></label>
          <div class="endereco">
            <select class="select"  name="estado" id="estado">
              <option <?php if($_SESSION['estado'] == 'AC'){echo("selected");}?> value="AC">AC</option>
              <option <?php if($_SESSION['estado'] == 'AL'){echo("selected");}?> value="AL">AL</option>
              <option <?php if($_SESSION['estado'] == 'AP'){echo("selected");}?> value="AP">AP</option>
              <option <?php if($_SESSION['estado'] == 'AM'){echo("selected");}?> value="AM">AM</option>
              <option <?php if($_SESSION['estado'] == 'BA'){echo("selected");}?> value="BA">BA</option>
              <option <?php if($_SESSION['estado'] == 'CE'){echo("selected");}?> value="CE">CE</option>
              <option <?php if($_SESSION['estado'] == 'DF'){echo("selected");}?> value="DF">DF</option>
              <option <?php if($_SESSION['estado'] == 'ES'){echo("selected");}?> value="ES">ES</option>
              <option <?php if($_SESSION['estado'] == 'GO'){echo("selected");}?> value="GO">GO</option>
              <option <?php if($_SESSION['estado'] == 'MA'){echo("selected");}?> value="MA">MA</option>
              <option <?php if($_SESSION['estado'] == 'MT'){echo("selected");}?> value="MT">MT</option>
              <option <?php if($_SESSION['estado'] == 'MS'){echo("selected");}?> value="MS">MS</option>
              <option <?php if($_SESSION['estado'] == 'MG'){echo("selected");}?> value="MG">MG</option>
              <option <?php if($_SESSION['estado'] == 'PA'){echo("selected");}?> value="PA">PA</option>
              <option <?php if($_SESSION['estado'] == 'PB'){echo("selected");}?> value="PB">PB</option>
              <option <?php if($_SESSION['estado'] == 'PR'){echo("selected");}?> value="PR">PR</option>
              <option <?php if($_SESSION['estado'] == 'PE'){echo("selected");}?> value="PE">PE</option>
              <option <?php if($_SESSION['estado'] == 'PI'){echo("selected");}?> value="PI">PI</option>
              <option <?php if($_SESSION['estado'] == 'RJ'){echo("selected");}?> value="RJ">RJ</option>
              <option <?php if($_SESSION['estado'] == 'RN'){echo("selected");}?> value="RN">RN</option>
              <option <?php if($_SESSION['estado'] == 'RS'){echo("selected");}?> value="RS">RS</option>
              <option <?php if($_SESSION['estado'] == 'RO'){echo("selected");}?> value="RO">RO</option>
              <option <?php if($_SESSION['estado'] == 'RR'){echo("selected");}?> value="RR">RR</option>
              <option <?php if($_SESSION['estado'] == 'SC'){echo("selected");}?> value="SC">SC</option>
              <option <?php if($_SESSION['estado'] == 'SP'){echo("selected");}?> value="SP">SP</option>
              <option <?php if($_SESSION['estado'] == 'SE'){echo("selected");}?> value="SE">SE</option>
              <option <?php if($_SESSION['estado'] == 'TO'){echo("selected");}?> value="TO">TO</option>
            </select>
            <input class="end" type="text" value="<?php echo $_SESSION['cidade']; ?>" placeholder="Ex:Cidade" name="cidade" id="cidade" required>
          </div>

        <label for="rua"><strong>Rua</strong></label>
        <input class="s-input" type="text" value="<?php echo $_SESSION['rua']; ?>" placeholder="Entre com rua" name="rua" id="rua">

        <label for="numero"><strong>Numero</strong></label>
        <input class="s-input" type="text" placeholder="Entre com o numero" name="numero" id="numero">

        <label for="referencia"><strong>Referência</strong></label>
        <input class="s-input" type="text" placeholder="Entre com uma referência" name="referencia" id="referencia" required>

        <label for="descricao"><strong>Descrição</strong></label>
        <input class="s-input" type="text" placeholder="Entre com uma descrição" name="descricao" id="descricao" required>
      </div>
      <button type="submit" value="voltar" id="voltar" name="voltar"><strong>VOLTAR</strong></button>
      <button type="submit" id="cadastro" value="cadastro" name="cadastro"><strong>CADASTRAR</strong></button>
      </div>
    </form>

      <script>
        var cep = document.getElementById("cep");
        var buscarCep = document.getElementById("buscarCep");
        var btnCadastro = document.getElementById("cadastro");
        var btnvoltar = document.getElementById("voltar");

        
        cep.onkeyup = function() {

          document.getElementById("cidade").required = false;
           document.getElementById("referencia").required = false;
           document.getElementById("descricao").required = false;
           document.getElementById("nome").required = false;

          if (cep.value.length == 8) {
              buscarCep.disabled = false;
          } else {
              buscarCep.disabled = true;
          }
        }

        btnvoltar.onclick = function(){
          
          document.getElementById("cidade").required = false;
           document.getElementById("referencia").required = false;
           document.getElementById("descricao").required = false;
           document.getElementById("nome").required = false;

        }
        
        btnCadastro.onclick = function(){
          document.getElementById("cidade").required = true;
           document.getElementById("referencia").required = true;
           document.getElementById("descricao").required = true;
           document.getElementById("nome").required = true;

        }
        
      </script>
  </body>
</html>