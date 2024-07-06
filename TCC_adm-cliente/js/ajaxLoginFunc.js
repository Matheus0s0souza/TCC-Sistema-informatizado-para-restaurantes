function session() {
    $.ajax({
        method: "GET",
        url: "login_funcionarios/php/controleLoginFunc.php",
        data: { logado: true },
        beforeSend: function() {
            $("h3").html("carregando consulta...");
        }
    })
    .done(function(dadosPHP) {
        console.log(dadosPHP); 
        var Perfil = JSON.parse(dadosPHP);
        var Bloco = '<img id="imgPerfil" src="funcionarios/imagem/' + Perfil.img + '" style="width: 112px; height: 112px;"><br>';
        Bloco += '<h3 id="Nome">Nome: ' + Perfil.nm_func + '</h3>';
        Bloco += '<h3 id="Cpf">Cpf: ' + Perfil.cpf_func + '</h3>';
        Bloco += '<h3 id="Cargo">Cargo: ' + Perfil.cargo + '</h3>';
        $("#perfilFunc").html(Bloco);
    })
    .fail(function(xhr, status, error) {
        console.error("Erro ao procurar o session: ", status, error);
    });
}

function logout() {
    $.ajax({
        url: 'login_funcionarios/php/controleLoginFunc.php',
        type: 'GET',
        data: { logout: true },
        success: function(response) {
            window.location.href = 'login_funcionarios/';
        },
        error: function(xhr, status, error) {
            console.error('Logout failed: ', status, error);
        }
    });
}

function onPageLoad() {
    session(); // Function to check session via AJAX
}
