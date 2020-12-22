$(document).ready(function () {

    $.ajax({
        url: "ilustradores/pag",
        method: "GET",
        dataType: "json",
        success: function (response) {
            urlPagSeguinte = response.next_page_url
            urlPagAnterior = response.first_page_url
            urlPagNum = "ilustradores/pag"
            pagAtual = response.current_page
        },
        error: function (error) {
        }
    })

    $.ajax({
        url: "ilustradores/getNum",
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
    linha = linha + `<td>${elemento.id_ilustradorSolidario}</td>`
    linha = linha + `<td>${elemento.nome}</td>`
    linha = linha + `<td>${elemento.telefone}</td>`
    linha = linha + `<td>${elemento.telemovel}</td>`
    linha = linha + `<td>${elemento.email}</td>`
    linha = linha + `<td>${elemento.observacoes}</td>`
    linha = linha + `<td>${elemento.volumeLivro}</td>`
    if(elemento.disponivel == 0) {
        linha = linha + `<td>Disponível</td>`    
    }
    else {
        linha = linha + `<td>Indisponível</td>` 
    }
    linha = linha + `<td>
                    <a href="#edit" class="edit" data-toggle="modal" onclick="editar(${elemento.id_ilustradorSolidario})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></a>
                    <a href="#delete" class="delete" data-toggle="modal" onclick="remover(${elemento.id_ilustradorSolidario})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Delete">&#xE872;</i></a>
                <td>`
    linha = linha + '</tr>'

    return linha
}

function editar(id) {
    var url = "ilustradores/getPorId/" + id;
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (ilustrador) {
            if (ilustrador != null) {
                url = 'ilustradores/edit/' + ilustrador.id_ilustradorSolidario
                $('#formEditar').attr('action', url)
                $('#nome').val(ilustrador.nome)
                $('#telefone').val(ilustrador.telefone)
                $('#telemovel').val(ilustrador.telemovel)
                $('#email').val(ilustrador.email)
                $('#volumeLivro').val(ilustrador.volumeLivro)
                var disp = ilustrador.disponivel
                $('#disponibilidade').val(disp.toString())
                $('#observacoes').val(ilustrador.observacoes)
            }
        },
        error: function (error) {

        }
    })
}

function remover(id) {
    url = 'ilustradores/delete/' + id
    $('#formDelete').attr('action', url)
}