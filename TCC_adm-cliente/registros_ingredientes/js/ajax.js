//============= metodo de pesquisa ======================================

function Pesq()
{

    var DadosForm =$('#ingredientes').serialize();

    $.ajax(
        {
            method: 'GET',
            url: 'controleIngredientes.php?Pesquisar',
            data: DadosForm,
            beforeSend: function()
            {
                $("h2").html("Carregando consulta..")
            }
        })
    
    .done(function(dadosPHP)
    {
        if(dadosPHP!=="nenhum ingrediente encontrado")
        {
        $("h2").html("Dados da pesquisa...");
        var ingr = JSON.parse(dadosPHP);
        var Tabela = '';
        Tabela += "<tr> <th scope='col'>Id</th> <th scope='col'>Noome</th> <th scope='col'>Gramas</th> <th scope='col'>Descrição</th> <th scope='col'>Administração</th> </tr>";
        for(i=0;i<ingr.length;i++)
        {
            Tabela += "<tr>";
                Tabela += "<td>"+ingr[i].id_ingr+"</td>";
                Tabela += "<td>"+ingr[i].nm_ingr+"</td>";
                Tabela += "<td>"+ingr[i].gra_ingr+"</td>";
                Tabela += "<td>"+ingr[i].desc_ingr+"</td>";                                                         //mudar os nomes das funções
                Tabela += "<td>" + '<button onclick="deletarIngr(' + ingr[i].id_ingr + ')">Deletar</button>'+'<button onclick="editar(' + ingr[i].id_ingr + ')">Alterar</button>'+ "</td>";
                Tabela += "</tr>";
        }
        Tabela += "</table>";
        $("#tabela").html(Tabela);
    }
    else {alert("nenhum ingrediente encontrado")}
    })

    .fail(function()
    {
        alert("falha na consulta");
    });
    
    return false;


}

//-----------------------------------------DELETAR--------------------------------------------------------

function deletarIngr(idingr) 
{

    $.ajax({
        method: 'GET',
        url: 'controleIngredientes.php?Deletar',
        data: { id_ingr: idingr },
        success: function(response) {
            alert("deletado com sucesso");
            location.reload();
        },
        error: function(error) {
            alert("Erro ao deletar prato: " + error);
        }
    });
}

//-----------------------------------------EDITAR--------------------------------------------------------

function editar(idingr) {  //mudar os nomes das funções
    console.log(idingr);
    $.ajax({
        method: 'GET',
        url: 'controleIngredientes.php?editar',
        data: { id_ingr: idingr },
        beforeSend: function() {
            $("h2").html("Carregando dados do ingrediente...");
        },
        success: function(dadosPHP) {
            // Parse the JSON data 
            alert(dadosPHP);
            var ingr = JSON.parse(dadosPHP);
            console.log(dadosPHP);     

            var form = '';
            form += '<form action="controleIngredientes.php" method="get" id="Altingredientes">';
            form += '<label for="id_ingre">Id do ingrediente:</label>';
            form += '<input type="text" value= '+ingr[0].id_ingr+' name="id_ingr" id="id_ingr" readonly><br><br>';
            form += '<label for="ingre">Nome do ingrediente:</label>';
            form += '<input type="text" name="ingre" value= ' +ingr[0].nm_ingr +' id="ingre"><br><br>';
            form += '<label for="gramas">Gramas (g):</label>';
            form += '<input type="number" name="gramas" value= '+ingr[0].gra_ingr+' id="gramas"><br><br>';
            form += '<label for="descricao">Descrição:</label>';
            form += '<textarea name="descricao" id="descricao" cols="30" rows="1" maxlength="190">'+ ingr[0].desc_ingr+'</textarea>';
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
