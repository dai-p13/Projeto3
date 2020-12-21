$(document).ready(function () {

    $.ajax({
        url: "rbes/pag",
        method: "GET",
        dataType: "json",
        success: function (response) {
            urlPagSeguinte = response.next_page_url
            urlPagAnterior = response.first_page_url
            pagAtual = response.current_page
        },
        error: function (error) {
        }
    })

    $.ajax({
        url: "rbes/getNum",
        method: "GET",
        dataType: "json",
        success: function (response) {
            totalElementos = response;
        },
        error: function (error) {
        }
    })

});

$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

function criarLinha(elemento) {
    var linha = "<tr>"
    linha = linha + `<td>${elemento.id_rbe}</td>`
    linha = linha + `<td>${elemento.regiao}</td>`
    linha = linha + `<td>${elemento.nomeCoordenador}</td>`
    var nomeConcelho = getNomeConcelho(elemento.id_concelho)
    if(nomeConcelho != null) {
        linha = linha + `<td>${nomeConcelho}</td>`    
    }
    else {
        linha = linha + `<td> --- </td>`  
    }
    if(elemento.disponivel == 0) {
        linha = linha + `<td>Disponível</td>`    
    }
    else {
        linha = linha + `<td>Indisponível</td>` 
    }
    linha = linha + `<td>
                    <a href="#edit" class="edit" data-toggle="modal" onclick="editar(${elemento.id_rbe})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></a>
                    <a href="#delete" class="delete" data-toggle="modal" onclick="remover(${elemento.id_rbe})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Delete">&#xE872;</i></a>
                <td>`
    linha = linha + '</tr>'

    return linha
}

function editar(id) {
    var url = "rbes/getPorId/" + id;
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (rbe) {
            if (rbe != null) {
                url = 'rbes/edit/' + rbe.id_rbe
                $('#formEditar').attr('action', url)
                $('#regiao').val(rbe.regiao)
                $('#nome').val(rbe.nome)
                carregarConcelhos(false)
                $('#concelho').val(rbe.id_concelho.toString())
                var disp = rbe.disponivel
                $('#disponibilidade').val(disp.toString())
            }
        },
        error: function (error) {

        }
    })
}

function remover(id) {
    url = 'rbes/delete/' + id
    $('#formDelete').attr('action', url)
}

function carregarConcelhos(adicionar) {
    $.ajax({
        url: 'concelhos/getAll',
        method: "GET",
        dataType: "json",
        success: function (concelhos) {
            var opcoes = ''
            if (concelhos != null) {
                for(concelho of concelhos) {
                    opcoes = opcoes + `<option value="${concelho.id_concelho}">${concelho.nome}</option>`
                }
                if(adicionar) {
                    $('#concelhosAdd').append(opcoes)   
                }
                else {
                    $('#concelho').append(opcoes)   
                }
                
            }
        },
        error: function (error) {

        }
    })
    
    $('#concelhos').append();
}

function getNomeConcelho(id) {
    var url = `concelhos/getPorId/` + id
    var nome = ''
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (concelho) {
            var opcoes = ''
            if (concelho != null) {
                nome = concelho.nome
            }
        },
        error: function (error) {
        }
    })

    if(nome != '') {
        return nome;
    }
    else {
        return null;
    }
}