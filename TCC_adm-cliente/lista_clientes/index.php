<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/ajax.js"></script>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/registroPrato.css" media="screen">


    <title>funcionarios</title>

    
</head>
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
    <div>
        <section id="formulario" class="u-align-center u-clearfix u-section-1">
        <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-default u-text-1">Lista de clientes </h2>
        <div class="u-expanded-width-xs u-form u-form-1">
          
            <div class="u-form-group u-form-name u-label-none">
            <form action="php/controleListaCliente.php" method="POST"  id="pesqCliente">
            <div class="u-form-group u-form-name u-label-none">
                <label for="NmCliente" class="u-label">Nome do cliente: </label>
                <input type="text" name="NmCliente" id="NmCliente" class="u-input u-input-rectangle" placeholder="Insira o nome do cliente"><br><br>
                <label for="Email" class="u-label">Email do cliente:</label>
                <input type="text" name="EmailCliente" id="EmailCliente" class="u-input u-input-rectangle" placeholder="Insira o email do cliente"><br><br>
                <label for="Cpf" class="u-label">Cpf do cliente:</label>
                <input type="text" name="Cpf" id="Cpf" class="u-input u-input-rectangle" placeholder="Insira o cpf do cliente"><br><br>
                <label for="tel" class="u-label">telefone: </label>
                <input type="tel" name="tel" id="tel" class="u-input u-input-rectangle" placeholder="Insira o telefone do cliente"><br><br>
                <label for="ende" class="u-label">Endereço: </label>
                <input type="text" name="Ende" id="Ende" class="u-input u-input-rectangle" placeholder="Insira o endereço do cliente"><br><br>
                <input type="button" value="Pesquisar" name="Pesquisar" id="Pesquisar" onclick="Pesq()" class="u-btn u-btn-submit u-button-style u-custom-color-1 u-btn-1">
            </div>  
            </form>
            </div>    
            </div>   
            </div>   
           
        </section>
    </div>
    <div id="tabela">
    </div>
<div id= "tabAlt"></div>
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
</body>

</html>