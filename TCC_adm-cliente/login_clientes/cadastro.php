

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cadastro.css">


    
</head>
<script>
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
              <a href="#">Fale Conosco</a>
              <a href="#">Sobre nós</a>
            </div>
            
            <div class="rightbotao">
              <a href="login.php">Login</a>
              <a href="cadastro.php">Cadastro</a>
            </div>
          </div>
        </div>
      
      <div class="sumir">
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



<body>

<div class="box">
    
   <form action="controleLogin.php" method ="POST" >
    
        <div class="legend"><legend><b>Cadastre-se</b></legend></div>
        <br>

        <div class="inputbox">
            <input type="text" name="nome" id="nome" class="inputUser" >
            <label for="nome" class="labelInput">Nome completo</label>
        </div>
        <br><br>

        <div class="inputbox">
            <input type="email" name="email" id="email" class="inputUser" >
            <label for="email" class="labelInput">E-mail</label>
        </div>
        <br><br>
		
        <div class="inputbox">
            <input type="password" name="senha" id="senha" class="inputUser" >
            <label for="senha" class="labelInput">Senha</label>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="tel" name="tel" id="tel" class="inputUser">
            <label for="numero" class="labelInput">telefone</label>
        </div>
        <br><br>

        
            <label for="cpf"><b>CPF</b></label>
            <input type="text" name="cpf" id="cpf"  >
        
        <br><br>

        <div class="inputbox">
            <input type="text" name="ende" id="ende" class="inputUser" >
            <label for="endereco" class="labelInput">Endereço</label>
        </div>
        <br><br>
        <a href="login.php">Já tem cadastro?</a>
        <br>
       
      <input type="submit" name="cadastrar" id="cadastrar">
    
    

  </form>

</div>
    
</body>
</html>