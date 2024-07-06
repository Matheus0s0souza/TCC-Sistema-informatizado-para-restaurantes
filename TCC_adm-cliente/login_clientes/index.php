<?php
session_start() // inicio de uma session

?>
<!DOCTYPE html>
<head>
  <html lang="pt-BR"></html>
<meta name="viewport" content="initial-scale=1.0">
<script src="js/AjaxLogin.js"></script>
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   function onPageLoad() { //funções que vao ser executadas quando o body carregar
            showSlides();
            session();
        }
let slideIndex = 1;
  showSlides(slideIndex);
  
  // Next/previous controls
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  // Thumbnail image controls
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }
  //dropdown
  // Função para alternar a visibilidade do dropdown
function toggleDropdown() {
  var dropdown = document.getElementById("myDropdown");
  dropdown.classList.toggle("show");
}

// Fecha o dropdown se o usuário clicar fora dele
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


  </script>
</head>
<header>

 <ul class="topnav">
    <li><a href="index.php" class="">Villas Boas</a></li>
    <div class="logo">
      <div class="dropdown">
        <div class="dropdown">
          
          <button onclick="toggleDropdown()" class="dropbtn">Botao</button>
           
          <div id="myDropdown" class="dropdown-content">
            <div class="itembotao">
              <a href="#">Delivery</a>
              <a href="">Fale Conosco</a>
              <a href="#">Sobre nós</a>
            </div>
            
            <div class="rightbotao">
              <a href="login.php">Login</a>
              <a href="cadastro.php">Cadastro</a>
            </div>
          </div>
        </div>
        <div id = "loginSession"></div>
   
      <div class="sumir"><!--a div que os dados coletados serão jogados no caso só foi o nome-->   
      <li class="right"><a href="login.php">Login</a></li>
      <li class="right"><a href="cadastro.php">Cadastro</a></li>
    </div>
    
    <div class="sumir">
  <div class="itemnav">
    <li><a href="#">Delivery</a></li>
    <li><a href="#">Fale Conosco</a></li>
    <li><a href="#">Sobre nós</a></li>
  </div>
  </div>
  </div>
  </ul>
  

  </header>
<body onload= "onPageLoad()">

  <div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="img/img1.avif" style="width:100%">
      <div class="text"></div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="img/img2.jpg" style="width:100%">
      <div class="text"></div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="img/img3.jpg" style="width:100%">
      <div class="text"></div>
    </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>
  </div>
  
  <div class="menu">
    <div class="item">
        <img src="img/imgcard1.jpg" alt="Item 1">
        <h3>Item 1</h3>
        <p>Descrição do Item 1.</p>
        <span>R$ 10,00</span>
    </div>
    <div class="item">
        <img src="img/imgcard2.jpg" alt="Item 2">
        <h3>Item 2</h3>
        <p>Descrição do Item 2.</p>
        <span>R$ 15,00</span>
    </div>
  <div class="item">
    <img src="img/imgcard3.jpg" alt="Item 3">
    <h3>Item 3</h3>
    <p>Descrição do Item 3.</p>
    <span>R$ 17,00</span>
  </div>
  <div class="item">
    <img src="img/imgcard4.jpg" alt="Item 4">
    <h3>Item 4</h3>
    <p>Descrição do Item 4.</p>
    <span>R$ 19,00</span>
  </div>
  <div class="item">
    <img src="img/imgcard5.jpg" alt="Item 5">
    <h3>Item 5</h3>
    <p>Descrição do Item 5.</p>
    <span>R$ 21,00</span>
  </div>
  <div class="item">
    <img src="img/imgcard6.jpg" alt="Item 6">
    <h3>Item 6</h3>
    <p>Descrição do Item 6.</p>
    <span>R$ 23,00</span>
  </div>
    
</div>

</body>
</html>
