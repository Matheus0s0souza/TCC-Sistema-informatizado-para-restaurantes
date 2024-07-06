
//a função do ajax que ira mandar requisitar os dados quando o login for feito
function session()
{
    $.ajax(
        {
            method: 'POST',
            url: 'controleLogin.php?logado',
            data: { logado: true },
            beforeSend: function()
            {
                $("h2").html("Carregando consulta..")
            }
        })
        .done(function(dadosPHP)
        {
            console.log(dadosPHP);
            if (dadosPHP == "nada")
                {
                document.getElementById("loginSession").hidden = true; 
                console.log(dadosPHP); 
                           
                } 
            else
            {
            try{
                
            console.log("console data: "+dadosPHP);
                if(dadosPHP !== "login invalido")
                {
                var log = JSON.parse(dadosPHP);
                $("#loginSession").html(log.nome+"<button onclick= logOut()>logout</button>"); 
                //apos coletar os dados no caso somente o nome ele vai exibir no id do loginSession
                }
                else {$("#loginSession").html("erro no login"+log);}}
                catch(error)
                {
                //se a caso de erro sera exibido aqui no console
                console.error("Error parsing JSON:", error);
                $("#loginSession").html("Erro ao processar os dados: "+ dadosPHP);
                }
            }
        })
        .fail(function(xhr, status, error) {
            // se der erro na procura será exibido aqui
            console.error("Error fetching session data:", status, error);
        }
    
    )
};


function logOut(){
    console.log("ainda está chamando");
    $.ajax(
        {
            method: 'POST',
            url: 'controleLogin.php?logOut',
            data: { logOut: true },
            success: function(response) {
                alert("deslogado com sucesso"+response);
                location.reload();
            },
            error: function(error) {
                alert("Erro ao deslogar: " + error);
            }
        });
};