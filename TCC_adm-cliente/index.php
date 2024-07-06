<?php
session_start(); //iniciar o session
//var_dump($_SESSION['dados']);
//echo json_encode($_SESSION['dados']);
if($_SESSION['dados'] == null){
    header("Location: login_funcionarios/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
           <link rel="stylesheet" href="css/administrador.css" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/ajaxLoginFunc.js"></script>
</head>

    
    <body data-path-to-root="./" data-include-products="true" class="u-body u-xl-mode" data-lang="pt"><header class="u-clearfix u-custom-color-1 u-header" id="sec-14ca" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
        
    <a href="login_funcionarios/index.php" class="u-image u-logo u-image-1" data-image-width="499" data-image-height="499" title="Villas Boas Home">
      <img src="css/images/logolaranja.png" class="u-logo-image u-logo-image-1">
    </a>
    
    <div class="u-hidden-sm u-hidden-xs u-layout-grid u-list u-list-1">
      <div class="u-repeater u-repeater-1">
        <div class="u-align-center u-container-style u-list-item u-repeater-item">
          <div class="u-container-layout u-similar-container u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-1">
            <p class="u-custom-item u-text u-text-1">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-1" data-href="registro_pratos/index.php" href="registro_pratos/index.php">Pratos </a>
            </p>
          </div>
        </div>
        <div class="u-container-style u-list-item u-repeater-item">
          <div class="u-container-layout u-similar-container u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-2">
            <p class="u-custom-item u-text u-text-default-lg u-text-default-xl u-text-2">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-2" data-href="Villas-Boas-Home.html#carousel_8936" href="registros_ingredientes/index.php">Ingredientes </a>
            </p>
          </div>
        </div>
        <div class="u-container-style u-list-item u-repeater-item">
          <div class="u-container-layout u-similar-container u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-3">
            <p class="u-custom-item u-text u-text-default-lg u-text-default-xl u-text-3">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-3" href="funcionarios/index.php">Funcionários </a>
            </p>
          </div>
        </div>
      </div>
    </div><a class="u-file-icon u-icon u-text-custom-color-2 u-icon-1" href="login_funcionarios/index.php"><img src="css/images/2321232-1187a1e8.png" alt=""></a>
  </div></header>
    <section class="u-align-center u-clearfix u-custom-color-1 u-section-1" src="" id="carousel_e61a">
      <div class="u-expanded-width u-shape u-shape-rectangle u-white u-shape-1"></div>
      <h2 class="u-align-center u-text u-text-body-color u-text-1" data-animation-name="customAnimationIn" data-animation-duration="1500">Área do administrador </h2>
      <Br><br><br>

      <div class="u-align-center u-container-style u-custom-color-3 u-list-item u-radius u-repeater-item u-shape-round u-video-cover u-list-item-3" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
              <h4 class="u-align-center u-text u-text-4"> Informações do login atual</h4>
              <body onload="onPageLoad()">
              <div id="perfilFunc"></div>  
          
            </div>
          </div>
          
          <a href="#" id="logout" onclick="logout()">LogOut</a>
      <div class="u-layout-grid u-list u-list-1">
        <div class="u-repeater u-repeater-1">
          <div class="u-align-center u-container-style u-custom-color-3 u-list-item u-radius u-repeater-item u-shape-round u-video-cover u-list-item-1" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
              <h4 class="u-align-center u-text u-text-2">Registro de pratos </h4>
              <a href="registro_pratos/index.php" class="u-active-none u-align-center u-border-1 u-border-active-grey-60 u-border-hover-white u-border-no-left u-border-no-right u-border-no-top u-border-white u-btn u-button-style u-custom-item u-hover-none u-none u-text-custom-color-2 u-btn-1">Acesse </a>
            </div>
          </div>
          <div class="u-align-center u-container-style u-custom-color-3 u-list-item u-radius u-repeater-item u-shape-round u-video-cover u-list-item-2" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2">
              <h4 class="u-align-center u-text u-text-3">Editar funcionários</h4>
              <a href="funcionarios/index.php" class="u-active-none u-align-center u-border-1 u-border-active-grey-60 u-border-hover-white u-border-no-left u-border-no-right u-border-no-top u-border-white u-btn u-button-style u-custom-item u-hover-none u-none u-text-custom-color-2 u-btn-2">acesse </a>
            </div>
          </div>
          <div class="u-align-center u-container-style u-custom-color-3 u-list-item u-radius u-repeater-item u-shape-round u-video-cover u-list-item-3" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
              <h4 class="u-align-center u-text u-text-4">Registro de ingredientes </h4>
              <a href="registros_ingredientes/index.php" class="u-active-none u-align-center u-border-1 u-border-active-grey-60 u-border-hover-white u-border-no-left u-border-no-right u-border-no-top u-border-white u-btn u-button-style u-custom-item u-hover-none u-none u-text-custom-color-2 u-btn-3">Acesse </a>
            </div>
          </div>
          <div class="u-align-center u-container-style u-custom-color-3 u-list-item u-radius u-repeater-item u-shape-round u-video-cover u-list-item-3" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
              <h4 class="u-align-center u-text u-text-4">Alterar senha </h4>
              <a href="alterarSenha/index.php" class="u-active-none u-align-center u-border-1 u-border-active-grey-60 u-border-hover-white u-border-no-left u-border-no-right u-border-no-top u-border-white u-btn u-button-style u-custom-item u-hover-none u-none u-text-custom-color-2 u-btn-3">Acesse </a>
            </div>
          </div>
          <div class="u-align-center u-container-style u-custom-color-3 u-list-item u-radius u-repeater-item u-shape-round u-video-cover u-list-item-3" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
              <h4 class="u-align-center u-text u-text-4">Lista de clientes </h4>
              <a href="lista_clientes/index.php" class="u-active-none u-align-center u-border-1 u-border-active-grey-60 u-border-hover-white u-border-no-left u-border-no-right u-border-no-top u-border-white u-btn u-button-style u-custom-item u-hover-none u-none u-text-custom-color-2 u-btn-3">Acesse </a>
            </div>
          </div>
          <div class="u-align-center u-container-style u-custom-color-3 u-list-item u-radius u-repeater-item u-shape-round u-video-cover u-list-item-4" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-4">
              <h4 class="u-align-center u-text u-text-5">Lista de clientes do whatsapp </h4>
              <a href="https://web.whatsapp.com/" class="u-active-none u-align-center u-border-1 u-border-active-grey-60 u-border-hover-white u-border-no-left u-border-no-right u-border-no-top u-border-white u-btn u-button-style u-custom-item u-hover-none u-none u-text-custom-color-2 u-btn-4">acesse </a>
            
            </div>
          </div>
          
        </div>
      
       
      </div>
    </section>
   
   
</body>
<style>
  #perfilFunc{
    color: white;
    margin-top: 30px;
    font-size: 10px;
    
  }
  
  #logout{
    font-size: 25px;
  }
</style>

</html>
