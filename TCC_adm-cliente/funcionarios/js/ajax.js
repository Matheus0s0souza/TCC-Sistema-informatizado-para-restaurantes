//============= metodo de pesquisa ======================================

function Pesq()
{

    var DadosForm = $('#funcionario').serialize();
    console.log('Form data:', DadosForm);

    $.ajax(
        {
            method: 'GET',
            url: 'php/PesquisaFunc.php?Pesquisar',
            data: DadosForm,
            beforeSend: function()
            {
                $("h2").html("Carregando consulta..")
            },
            success: function(request, status, error)
            {
                console.log("request: ",request.responseText);
                console.log("status: ",status.responseText);
                console.log("erro: ",error.responseText);
            }
        })
    
    .done(function(dadosPHP)
    {
        console.log('Response:', dadosPHP);
        
        if(dadosPHP!=="nenhum funcionario encontrado")
        {
        $("h2").html("Dados da pesquisa...");
        var Func = JSON.parse(dadosPHP);
        var Tabela = '';
        Tabela += "<tr><td>img</td><td>Id</td><td>Nome</td><td>email</td><td>senha</td><td>cpf</td><td>cargo</td><td>hierarquia</td><td>administração</td></tr>";

        for(i=0;i<Func.length;i++)
        {
            Tabela += "<tr>";
                Tabela += "<td><img src='imagem/" + Func[i].img + "' alt='" + Func[i].nm_func + "' style='width: 112px; height: 112px;'></td>";
                Tabela += "<td>"+Func[i].id_func+"</td>";
                Tabela += "<td>"+Func[i].nm_func+"</td>";
                Tabela += "<td>"+Func[i].email_func+"</td>";
                Tabela += "<td>"+Func[i].senha_func+"</td>";
                Tabela += "<td>"+Func[i].cpf_func+"</td>";
                Tabela += "<td>"+Func[i].cargo+"</td>";
                Tabela += "<td>"+Func[i].hierarquia+"</td>";
                Tabela += "<td>" + '<button onclick="deletarIngr(' + Func[i].id_func + ')">Deletar</button>'+
                '<button onclick="editar(' + Func[i].id_func + ')">Editar</button>' + 
                '<button onclick="alterarImg(' + Func[i].id_func + ')">Alterar imagem</button>' + "</td>";
                Tabela += "</tr>";
        }
        Tabela += "</table>";
        $("#tabela").html(Tabela);
    }
    else {alert("nenhum funcionario encontrado")}
    })

    .fail(function(dadosPHP)
    {
        alert("falha na consulta: "+dadosPHP+"");
    });
    
    return false;


}

//----------------------------------DELETAR FUNCIONARIO-----------------------------------------


function deletarIngr(IdFunc) 
{

    $.ajax({
        method: 'GET',
        url: 'controleFunc.php?Deletar',
        data: { id_func: IdFunc },
        success: function(response) {
            alert("deletado com sucesso");
            location.reload();
        },
        error: function(error) {
            alert("Erro ao deletar prato: " + error);
        }
    });
}

//----------------------------------EDITAR FUNCIONARIO-----------------------------------------

function editar(Idfunc){
    console.log(Idfunc);
    $.ajax({
        
        method: 'GET',
        url: 'controleFunc.php?editar',
        data: { id_func: Idfunc },
        beforeSend: function() {
            $("h2").html("Carregando dados do prato...");
        },
        success: function(dadosPHP) {
            // Parse the JSON data 
            //alert(dadosPHP);
            console.log(dadosPHP);
            var Func = JSON.parse(dadosPHP);

            var form = '';
            form += '<form action="php/alterarFunc.php" method="POST" id="Altfuncionario">';
            form += '<label for="id_func">Id do funcionario:</label>';
            form += '<input type="text" value= '+ Func[0].id_func + ' name="idfunc" id="idfunc" readonly><br><br>';
            
            form += '<label for="NmFunc">Nome do funcionario:</label>';
            form += '<input type="text" value= '+ Func[0].nm_func + ' name="NmFunc" id="NmFunc"><br><br>';
            
            form += '<label for="Email">Email:</label>';
            form += '<input type="text" value= '+ Func[0].email_func + ' name="Email" id="Email"><br><br>';
            
            form += '<label for="Senha">Senha:</label>';
            form += '<input type="text" value= '+ Func[0].senha_func + ' name="Senha" id="Senha"><br><br>';
            
            form += '<label for="Cpf">Cpf:</label>';
            form += '<input type="text" value= '+ Func[0].cpf_func + '  name="Cpf" id="Cpf"><br><br>';

            form += '<label for="Cargo">Cargo:</label>';
            form += '<input type="text" value= '+ Func[0].cargo + ' name="Cargo" id="Cargo"><br><br>';

            form += '<label for="Hier">Hierarquia:</label>';
            form += '<input type="text" value= '+ Func[0].hierarquia  + ' name="Hier" id="Hier"><br><br>';

            form += '<input type="submit" value="Alterar" name="Alterar" id="Alterar">';
            form += '</form>';
            
            $("#tabAlt").html(form);
        },
        error: function(error) {
            console.error("Error ao carregar funcionario:", error);
            alert("Error ao carregar funcionario:", error);
        }
    });
}

//-------------------------------alterarImg-------------------------------------

function alterarImg(IdFunc) 
{

    $.ajax({
        method: 'GET',
        url: 'controleFunc.php?editar',
        data: { id_func: IdFunc },
        beforeSend: function() {
            $("h2").html("Carregando dados do prato...");
        },
        success: function(dadosPHP) {
            // Parse the JSON data 
            //alert(dadosPHP);
            console.log(dadosPHP);
            var Func = JSON.parse(dadosPHP);

            var form = '';
            form += '<form action="php/alterarImgFunc.php" method="POST" enctype="multipart/form-data" id="Altfuncionario">';
            form += '<label for="id_func">mudar imagem do id:</label>';
            form += '<input type="text" value= '+ Func[0].id_func + ' name="idfunc" id="idfunc" readonly><br><br>';
            form += '<label for="Img">Escolha uma imagem:</label>';
            form += '<input type="file" name="Img" id="Img">';
            form += '<input type="submit" value="Alterar" name="Alterar" id="Alterar">';
            form += '</form>';
            $("#tabAlt").html(form);
        },
        error: function(error) {
            console.error("Error ao carregar funcionario:", error);
            alert("Error ao carregar funcionario:", error);
        }
    });
}