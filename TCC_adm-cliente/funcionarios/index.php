<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/cadFuncionario.css" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/ajax.js"></script>

    <title>Funcionários</title>

    <style>
     
        
        div#tabela{
            margin-top: 5%;
            display: ruby-text;
        }
/* Estilização geral da tabela */
table {
  width: 100%;
  max-width: 100%;
  border-collapse: collapse;
  font-family: Arial, sans-serif;
  font-size: 0.9rem;
  margin: 20px auto;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  overflow: hidden;
}

/* Cabeçalhos da tabela */
th {
  background-color: #4CAF50; /* Cor de fundo dos cabeçalhos */
  color: white; /* Cor do texto dos cabeçalhos */
  text-align: center;
  padding: 12px 15px;
  font-weight: bold;
}

/* Células da tabela */
td {
  border: 1px solid #ddd;
  padding: 12px 15px;
  text-align: center;
}

/* Linhas da tabela */
tr {
  background-color: #f9f9f9; /* Cor de fundo das linhas */
}

/* Estilo para as linhas pares */
tr:nth-of-type(even) {
  background-color: #f1f1f1;
}

/* Efeito de hover nas linhas */
tr:hover {
  background-color: #f5f5f5;
}

/* Responsividade */
@media (max-width: 600px) {
  table, thead, tbody, th, td, tr {
    display: block;
    width: 100%;
  }

  th[scope='col'] {
    display: none;
  }

  td {
    border: none;
    position: relative;
    padding-left: 50%;
    text-align: left;
  }

  td:before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 50%;
    padding-left: 10px;
    font-weight: bold;
    text-align: left;
  }

  tr {
    margin-bottom: 10px;
    display: block;
  }
}

/* Tabela alterar prato */

form#Altfuncionario {
    background-color: white; /* Cor de fundo do formulário */
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Sombra do formulário */
  width: 100%;
  max-width: 400px; /* Largura máxima do formulário */
  box-sizing: border-box;
  margin: auto;
  margin-top: 5%;
}
    </style>
</head>
<meta name="theme-color" content="#eeb16d">
    <meta property="og:title" content="cadFuncionario">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="./" data-include-products="true" class="u-body u-xl-mode" data-lang="pt"><header class="u-clearfix u-custom-color-1 u-header" id="sec-14ca" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
        
          
        <a href="../index.php" class="u-image u-logo u-image-1" data-image-width="499" data-image-height="499" title="Villas Boas Home">
          <img src="css/images/logolaranja.png" class="u-logo-image u-logo-image-1">
        </a>
        <div class="u-hidden-sm u-hidden-xs u-layout-grid u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-1">
                <p class="u-custom-item u-text u-text-1">
                  <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-1" href="../registro_pratos/index.php">Pratos </a>
                </p>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-2">
                <p class="u-custom-item u-text u-text-default-lg u-text-default-xl u-text-2">
                  <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-2" href="../registros_ingredientes/index.php">Ingredientes </a>
                </p>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-3">
                <p class="u-custom-item u-text u-text-default-lg u-text-default-xl u-text-3">
                  <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-3" href="../funcionarios/index.php">Funcionários </a>
                </p>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-2">
                <p class="u-custom-item u-text u-text-default-lg u-text-default-xl u-text-2">
                  <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-2" data-href="Villas-Boas-Home.html#carousel_8936" href="Villas-Boas-Home.html#sec-5865"> </a>
                </p>
              </div>
            </div>
          </div>
        </div><a class="u-file-icon u-icon u-text-custom-color-2 u-icon-1" href="../login_funcionarios/index.php"><img src="css/images/2321232-1187a1e8.png" alt="" style="margin-top: -15px;"></a>
      </div></header>

<body>
    <div>
        <section id="formulario" class="u-align-center u-clearfix u-section-1">
        <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-default u-text-1">Cadastro de funcionários </h2>
        <div class="u-form u-form-1">
            <form action="controleFunc.php" method="POST" enctype="multipart/form-data" id="funcionario" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" style="padding: 10px">
                <label for="NmFunc">Nome do funcionario:</label>
                <input type="text" name="NmFunc" id="NmFunc" class="u-input u-input-rectangle"><br><br>
                <label for="Email">Email:</label>
                <input type="text" name="Email" id="Email" class="u-input u-input-rectangle"><br><br>
                <label for="Senha">Senha:</label>
                <input type="text" name="Senha" id="Senha" class="u-input u-input-rectangle"><br><br>
                <label for="Cpf">Cpf:</label>
                <input type="text" name="Cpf" id="Cpf" class="u-input u-input-rectangle"><br><br>
                <label for="Cargo">Cargo:</label>
                <input type="text" name="Cargo" id="Cargo" class="u-input u-input-rectangle"><br><br>
                <label for="Hier">Hierarquia:</label>
                <input type="text" name="Hier" id="Hier" class="u-input u-input-rectangle"><br><br>
                <label for="Img">Escolha uma imagem:</label>
                <input type="file" name="Img" id="Img"><br><br>
                <div style="padding:20px; margin:auto;">
                <input type="submit" value="Registrar" name="Registrar" id="Registrar" class="u-btn u-btn-submit u-button-style u-custom-color-2 u-btn-1">
                <input type="submit" value="consultar" name="Pesquisar" id="consultar" class="u-btn u-btn-submit u-button-style u-custom-color-2 u-btn-1">
                <input type="button" value="Pesquisar" name="Pesquisar" id="Pesquisar" onclick="Pesq()" class="u-btn u-btn-submit u-button-style u-custom-color-2 u-btn-1">
                </div>
            </form>
        </section>
    </div>
    <div id="tabela">
    </div>
<di id= "tabAlt"></div>
</body>

</html>