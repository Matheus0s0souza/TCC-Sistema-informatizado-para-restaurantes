//============= metodo de pesquisa ======================================

function Pesq()
{

    var DadosForm =$('#Pratos').serialize();

    $.ajax(
        {
            method: 'GET',
            url: 'php/PesquisarPrato.php?Pesquisar',
            data: DadosForm,
            beforeSend: function()
            {
                $("h2").html("Carregando consulta..")
            }            
        })
    
    .done(function(dadosPHP)
    {
        if(dadosPHP!=="Nenhum prato encontrado")
        {
        console.log("Response from server:", dadosPHP);
        $("h2").html("Dados da pesquisa...");
        var prato = JSON.parse(dadosPHP);
        var Tabela = '';
        Tabela += "<tr> <th scope='col'>Imagem</th> <th scope='col'>Id</th> <th scope='col'>Nome do prato</th> <th scope='col'>Ingrediente 1</th> <th scope='col'>Ingrediente 2</th> <th scope='col'>Ingrediente 3</th> <th scope='col'>Preço do prato</th> <th scope='col'>Desconto</th> <th scope='col'>Valor total</th> <th scope='col'>Administração</th> </tr>";

        for(i=0;i<prato.length;i++)
        {
            Tabela += "<tr>";
                Tabela += "<td><img src='imagem/" + prato[i].img + "' alt='" + prato[i].nm_prato + "' style='width: 112px; height: 112px;'></td>";
                Tabela += "<td>"+prato[i].id_prato+"</td>";
                Tabela += "<td>"+prato[i].nm_prato+"</td>";
                Tabela += "<td>"+prato[i].ingredient_names_1+"</td>";
                Tabela += "<td>"+prato[i].ingredient_names_2+"</td>";
                Tabela += "<td>"+prato[i].ingredient_names_3+"</td>";
                Tabela += "<td>R$"+prato[i].preco_prato+"</td>";
                Tabela += "<td>"+prato[i].desconto+"%</td>";
                Tabela += "<td>R$"+prato[i].val_tot+"</td>";
                Tabela += "<td>" + '<button onclick="deletarPrato(' + prato[i].id_prato + ')">Deletar</button>'+
                '<button onclick="editar(' + prato[i].id_prato + ')">Alterar</button>'+
                '<button onclick="alterarImg(' + prato[i].id_prato + ')">Alterar imagem</button>' + "</td>";
                Tabela += "</tr>";
        }
        Tabela += "</table>";
        $("#tabela").html(Tabela);
    }
    else {alert("nenhum prato encontrado")}
    })

    .fail(function()
    {
        alert("falha na consulta");
    });
    
    return false;


}

//-----------------------------------------DELETAR-----------------------------------------------------------

function deletarPrato(idPrato) 
{

    $.ajax({
        method: 'GET',
        url: 'controlePratos.php?Deletar',
        data: { id_prato: idPrato },
        success: function(response) {
            alert("deletado com sucesso");
            location.reload();
        },
        error: function(error) {
            alert("Erro ao deletar prato: " + error);
        }
    });
}


//-----------------------------------------EDITAR-----------------------------------------------------------

function editar(idprato) { 
    console.log(idprato);
    $.ajax({
        
        method: 'GET',
        url: 'controlePratos.php?editar',
        data: { id_prato: idprato },
        beforeSend: function() {
            $("h2").html("Carregando dados do prato...");
        },
        success: function(dadosPHP) {
            // Parse the JSON data 
            //alert(dadosPHP);
            console.log(dadosPHP);
            var prato = JSON.parse(dadosPHP);

            var form = '';
            form += '<form action="php/alterarPratos.php" method="post" id="AltPratos">';
            form += '<label for="id_prato">Id do prato:</label>';
            form += '<input type="text" value= '+ prato[0].id_prato + ' name="idPrato" id="idPrato" readonly><br><br>';

            form += '<label for="Prato">Nome do prato:</label>';
            form += '<input type="text" value= '+ prato[0].nm_prato + ' name="Prato" id="Prato"><br><br>';

            form += '<label for="PratoIngr1">1º ingrediente:</label>';
            form += '<input type="number" value = '+prato[0].prato_ingr_1 + ' name="PratoIngr1" id="PratoIngr1"><br><br>';

            form += '<label for="PratoIngr2">2º ingrediente:</label>';
            form += '<input type="number" value = '+prato[0].prato_ingr_2 + ' name="PratoIngr2" id="PratoIngr2"><br><br>';

            form += '<label for="PratoIngr3">3º ingrediente:</label>';
            form += '<input type="number" value = '+prato[0].prato_ingr_3 + ' name="PratoIngr3" id="PratoIngr3"><br><br>';

            form += '<label for="PrecoPrato">Preço do prato R$:</label>';
            form += '<input type="number" value = '+prato[0].preco_prato + '  name="PrecoPrato" id="PrecoPrato" step="0.01"><br><br>';
            
            form += '<label for="desconto">insira o desconto(%)</label>'
            form += '<input type="number" name="desconto" value = '+prato[0].desconto+ ' id="desconto" step="0.01" max="100" min="0"><br><br></br>'

            form += '<label for="ValTot">Preço do prato descontado R$:</label>';
            form += '<input type="number" value = '+prato[0].Val_Tot + '  name="ValTot" id="ValTot" readonly><br><br>';


            form += '<input type="submit" value="Alterar" name="Alterar" id="Alterar">';
            form += '</form>';

            // Update the table content
            $("#tabAlt").html(form);
        },
        error: function(error) {
            console.error("Error fetching ingredient data:", error);
            alert("Erro ao carregar dados do ingrediente.");
        }
    });
}


//-------------------------------alterarImg-------------------------------------

function alterarImg(idprato) 
{

    $.ajax({
        method: 'GET',
        url: 'controlePratos.php?editar',
        data: { id_prato: idprato },
        beforeSend: function() {
            $("h2").html("Carregando dados do prato...");
        },
        success: function(dadosPHP) {
            // Parse the JSON data 
            //alert(dadosPHP);
            console.log(dadosPHP);
            var prato = JSON.parse(dadosPHP);

            var form = '';
            form += '<form action="php/alterarImgPratos.php" method="POST" enctype="multipart/form-data" id="AltPrato">';
            form += '<label for="id_prato">mudar imagem do id:</label>';
            form += '<input type="text" value= '+ prato[0].id_prato + ' name="idPrato" id="idPrato" readonly><br><br>';
            form += '<label for="Img">Escolha uma imagem:</label>';
            form += '<input type="file" name="Img" id="Img">';
            form += '<input type="submit" value="Alterar" name="Alterar" id="Alterar">';
            form += '</form>';
            $("#tabAlt").html(form);
        },
        error: function(error) {
            console.error("Error ao carregar prato:", error);
            alert("Error ao carregar prato:", error);
        }
    });
}