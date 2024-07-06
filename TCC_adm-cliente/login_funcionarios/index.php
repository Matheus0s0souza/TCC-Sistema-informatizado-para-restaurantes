<?php
session_start();
unset($_SESSION['dados']);
//var_dump($_SESSION['dados']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/nicepage.css">
    <title>Login_funcionario</title>
    
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
       <a class="u-file-icon u-icon u-text-custom-color-2 u-icon-1" href="../login_funcionarios/index.php" style="margin: 30px;"><img src="css/images/2321232-1187a1e8.png" alt=""></a>
      </div></header>
      </div></header>
<body>

<body>
    <div class="divLog">
        <form action="php/controleLoginFunc.php" method="get">
        <section class="u-clearfix u-custom-color-2 u-section-1" id="sec-226b">
        <div class="u-clearfix u-sheet u-valign-middle-xl u-sheet-1">
        <div class="custom-expanded u-align-left u-container-style u-group u-white u-group-1">
          <div class="u-container-layout u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-1">
            <h2 class="u-align-left u-text u-text-custom-color-1 u-text-1">Login </h2>
            <div class="custom-expanded u-align-left u-form u-form-1">
            <label for="email" class="u-label">Email</label>
            <input type="email" name="Email" id="Email" placeholder="Insira seu e-mail" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle">
            <label for="Senha" class="u-label">Senha:</label>
            <input type="password" name="Senha" id="Senha" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" placeholder="Insira sua senha">
            <br>
            <input type="submit" value="Login" name="Login" id="LoginBotao" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-2">
            <input type="submit" value="Recuperar Senha" name="RecSen" id="RecSen" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-2">


        </div> 
        </div> 
        </div> 
        </div>    
        </section>
        </form>
    </div>
</body>
</html>
