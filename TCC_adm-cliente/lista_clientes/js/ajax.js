//============= metodo de pesquisa ======================================

function Pesq()
{

    var DadosForm = $('#pesqCliente').serialize();
    console.log('Form data:', DadosForm);

    $.ajax(
        {
            method: 'GET',
            url: 'php/controleListaCliente.php?Pesquisar',
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
        
        if(dadosPHP!=="nenhum cliente encontrado")
        {
        $("h2").html("Dados da pesquisa...");
        var cliente = JSON.parse(dadosPHP);
        var Tabela = '';
        Tabela += "<tr> <th scope='col'>ID</th> <th scope='col'>Nome</th> <th scope='col'>Email</th> <th scope='col'>Cpf</th> <th scope='col'>Telefone</th> <th scope='col'>Endereço</th>";
        

        for(i=0;i<cliente.length;i++)
        {
            Tabela += "<tr>";
                Tabela += "<td>"+cliente[i].id+"</td>";
                Tabela += "<td>"+cliente[i].nome+"</td>";
                Tabela += "<td>"+cliente[i].email_func+"</td>";
                Tabela += "<td>"+cliente[i].cpf+"</td>";
                Tabela += "<td>"+cliente[i].tel+"</td>";
                Tabela += "<td>"+cliente[i].ende+"</td>";
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

