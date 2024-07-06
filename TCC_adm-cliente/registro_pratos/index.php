<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/ajax.js"></script>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/registroPrato.css" media="screen">

    <title>Pratos</title>

    
</head>
<meta name="theme-color" content="#eeb16d">
    <meta property="og:title" content="Login">
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
                  <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-1" data-href="..\funcionarios\index.php" href="../registro_pratos/index.php">Pratos </a>
                </p>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-2">
                <p class="u-custom-item u-text u-text-default-lg u-text-default-xl u-text-2">
                  <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-2" data-href="Villas-Boas-Home.html#carousel_8936" href="../registros_ingredientes/index.php">Ingredientes </a>
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
          </div>
        </div><a class="u-file-icon u-icon u-text-custom-color-2 u-icon-1" href="../login_funcionarios/index.php"><img src="css/images/2321232-1187a1e8.png" alt=""></a>
      </div></header>
<body>

<body>
    <div>
    <section class="u-align-center u-clearfix u-section-1" id="formulario">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-default u-text-1">Registro de pratos </h2>
        <div class="u-expanded-width-xs u-form u-form-1">
          
            <div class="u-form-group u-form-name u-label-none">
        <form action="controlePratos.php" method="POST" id="Pratos">
        <div class="u-form-group u-form-name u-label-none">
              <label for="name-3b9a" class="u-label">Name</label>
              <input type="text" id="Prato" name="Prato"  required="" class="u-input u-input-rectangle" placeholder="Insira o nome do prato">
            </div>
            <div class="u-form-email u-form-group u-label-none">
              <label for="ingrediente1" class="u-label">Ingrediente 1</label>
              <input type="text" placeholder="Ingrediente" id="PratoIngr1" name="PratoIngr1" class="u-input u-input-rectangle" required="">
            </div>
            <div class="u-form-group u-label-none u-form-group-3">
              <label for="text-c758" class="u-label">Campo de Entrada</label>
              <input type="text" placeholder="Ingrediente" id="PratoIngr2" name="PratoIngr2" class="u-input u-input-rectangle">
            </div>
            <div class="u-form-group u-label-none u-form-group-3">
              <label for="text-c58" class="u-label">Campo de Entrada</label>
              <input type="text" placeholder="Ingrediente" id="PratoIngr3" name="PratoIngr3" class="u-input u-input-rectangle">
            </div>
            <br>
            <div class="u-form-group u-form-number u-form-number-layout-range-number u-label-none u-form-group-4">
              <label for="number-ae3d" class="u-label">Entrada numérica</label>
              <div class="u-input-row" data-value="0">
              <p class="u-form-group u-form-text u-text u-text-2">Desconto aplicado (%): </p>
                <input type="number" placeholder="" id="number-number-ae3d" class="u-input u-input-rectangle u-text-black" min="0" max="100" step="1" id="desconto" name="desconto">
              </div>
              <br>
              
            </div>
            <p class="u-form-group u-form-text u-text u-text-2">Valor do prato R$ </p>
            <div class="u-form-group u-label-none u-form-group-3">
              <label for="text-c5" class="u-label">Valor do prato</label>
              <input type="number" placeholder="Valor do prato" id="PrecoPrato" name="PrecoPrato" class="u-input u-input-rectangle">
            </div>
            <br>
            <div class="u-align-center-xs u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xl u-form-group u-form-submit">
            <label for="Img">Escolha uma imagem:</label>
            <input type="file" name="Img" id="Img"><br><br>
            <input type="submit" value="Registrar" name="Registrar" id="Registrar" class="u-btn u-btn-submit u-button-style u-custom-color-1 u-btn-1">
            <input type="submit" value="Consultar" name="Pesquisar" id="consultar" class="u-btn u-btn-submit u-button-style u-custom-color-1 u-btn-1">
            <input type="button" value="Pesquisar" name="Pesquisar" id="Pesquisar" onclick="Pesq()" class="u-btn u-btn-submit u-button-style u-custom-color-1 u-btn-1">
        </div>
        </form>
    </section>
    </div>
    
</body>
<div id="tabela">
    
    </div>
    <div id="tabAlt"></div>
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

form#AltPratos {
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

</html>