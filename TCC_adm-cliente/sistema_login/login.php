<?php
session_start()

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/nicepage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    
</head>
<meta name="theme-color" content="#eeb16d">
    <meta property="og:title" content="Login">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="./" data-include-products="true" class="u-body u-xl-mode" data-lang="pt"><header class="u-clearfix u-custom-color-1 u-header" id="sec-14ca" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
        
        <a href="\projeto_tcc_adm_upload_img_2_1_4/home/index.php" class="u-image u-logo u-image-1" data-image-width="499" data-image-height="499" title="Villas Boas Home">
          <img src="css/images/logolaranja.png" class="u-logo-image u-logo-image-1">
        </a>
        <div class="u-hidden-sm u-hidden-xs u-layout-grid u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-1">
                <p class="u-custom-item u-text u-text-1">
                  <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-1" data-href="\projeto_tcc_adm_upload_img_2_1_4/home/index.php#carousel_8936" href="\projeto_tcc_adm_upload_img_2_1_4/home/index.php#carousel_8936">Cardápio </a>
                </p>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-2">
                <p class="u-custom-item u-text u-text-default-lg u-text-default-xl u-text-2">
                  <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-2" data-href="\projeto_tcc_adm_upload_img_2_1_4/home/index.php#carousel_8936" href="\projeto_tcc_adm_upload_img_2_1_4/home/index.php#sec-5865">Quem somos </a>
                </p>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-3">
                <p class="u-custom-item u-text u-text-default-lg u-text-default-xl u-text-3">
                  <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-3" data-href="#" href="\projeto_tcc_adm_upload_img_2_1_4/home/index.php#sec-40e7">Fale conosco </a>
                </p>
              </div>
            </div>
          </div>
        </div><span class="u-file-icon u-icon u-text-custom-color-2 u-icon-1" data-href="Registro.html" data-target="_blank"><img src="css/images/2321232-1187a1e8.png" alt=""></span><span class="u-file-icon u-hidden-sm u-hidden-xs u-icon u-text-custom-color-2 u-icon-2"><img src="css/images/3514491-f62ccdbf.png" alt=""></span>
      </div></header>
<body>

<div class="box">
    
   <form action="controleLogin.php" method ="POST" >
    
   <section class="u-clearfix u-custom-color-2 u-section-1" id="sec-226b">
      <div class="u-clearfix u-sheet u-valign-middle-xl u-sheet-1">
        <div class="custom-expanded u-align-left u-container-style u-group u-white u-group-1">
          <div class="u-container-layout u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-1">
            <h2 class="u-align-left u-text u-text-custom-color-1 u-text-1">Login </h2>
            <div class="custom-expanded u-align-left u-form u-form-1">
              <form action="https://forms.nicepagesrv.com/v2/form/process" class="u-clearfix u-form-spacing-28 u-form-vertical u-inner-form" style="padding: 0px;" source="email" name="form">
                <div class="u-form-email u-form-group">
                  <label for="email-5a14" class="u-label" wfd-invisible="true">E-mail:</label>
                  <input type="email" placeholder="Insira seu e-mail" id="email-5a14" name="email" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required="" id="email">
                </div>
                <div class="u-form-group u-form-group-2">
                  <label for="text-8ee3" class="u-label">Senha:</label>
                  <input type="password" placeholder="Insira sua senha" id="text-8ee3" name="senha" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" id="senha">
                </div>
                <p class="u-form-group u-form-text u-text u-text-custom-color-2 u-text-2">
                  <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-1" href="\projeto_tcc_adm_upload_img_2_1_4/sistema_login/cadastro.php">Não possui login?&nbsp;cadastre-se aqui<br>
                  </a>
                </p>
                
                  <input type="submit" value="Enviar" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-2" wfd-invisible="true" name="entrar" id="entrar">
                
                <div class="u-form-send-message u-form-send-success" wfd-invisible="true"> Thank you! Your message has been sent. </div>
                <div class="u-form-send-error u-form-send-message" wfd-invisible="true"> Unable to send your message. Please fix errors then try again. </div>
                <input type="hidden" value="" name="recaptchaResponse" wfd-invisible="true">
                <input type="hidden" name="formServices" value="">
              </form>
            </div>
          </div>
        </div>
        <div class="custom-expanded u-hidden-sm u-hidden-xs u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-container-align-left u-container-style u-custom-color-3 u-list-item u-repeater-item u-list-item-1">
              <div class="u-container-layout u-similar-container u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                <h5 class="u-align-left u-text u-text-3"><span class="u-file-icon u-icon u-text-palette-3-base"><img src="css/images/3059407-a33608e5.png" alt=""></span>&nbsp;Contato
                </h5>
                <p class="u-align-left u-text u-text-4">1 (234) 567-891, 1 (234) 987-654</p>
              </div>
            </div>
            <div class="u-container-align-left u-container-style u-custom-color-3 u-list-item u-repeater-item u-list-item-2">
              <div class="u-container-layout u-similar-container u-valign-middle-lg u-valign-middle-xl u-container-layout-3">
                <h5 class="u-align-left u-text u-text-5"><span class="u-file-icon u-icon u-text-palette-3-base"><img src="css/images/535239-5de83b82.png" alt=""></span>&nbsp;Local
                </h5>
                <p class="u-align-left u-text u-text-6">121 Rock Sreet, 21 Avenue, New York, NY 92103-9000</p>
              </div>
            </div>
            <div class="u-container-align-left u-container-style u-custom-color-3 u-list-item u-repeater-item u-list-item-3">
              <div class="u-container-layout u-similar-container u-valign-middle-lg u-valign-middle-xl u-container-layout-4">
                <h5 class="u-align-left u-text u-text-7"><span class="u-file-icon u-icon u-text-palette-3-base u-icon-3"><img src="css/images/2841985-7e11ec36.png" alt=""></span>&nbsp;horário de serviço
                </h5>
                <p class="u-align-left u-text u-text-8">Mon – Fri …… 10 am – 8 pm, Sat, Sun ....… Closed</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-2b81"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Restaurante Villas Boas </p>
      </div></footer>
</body>
</html>