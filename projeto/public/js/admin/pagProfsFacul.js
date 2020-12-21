$(document).ready(function () {

    $.ajax({
        url: "profsFaculdade/pag",
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
        url: "profsFaculdade/getNum",
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
    linha = linha + `<td>${elemento.id_professorFaculdade}</td>`
    linha = linha + `<td>${elemento.nome}</td>`
    linha = linha + `<td>${elemento.cargo}</td>`
    linha = linha + `<td>${elemento.telemovel}</td>`
    linha = linha + `<td>${elemento.telefone}</td>`
    linha = linha + `<td>${elemento.email}</td>`
    linha = linha + `<td>${elemento.observacoes}</td>`
    if(elemento.disponivel == 0) {
        linha = linha + `<td>Disponível</td>`    
    }
    else {
        linha = linha + `<td>Indisponível</td>` 
    }
    linha = linha + `<td>
                    <a href="#edit" class="edit" data-toggle="modal" onclick="editar(${elemento.id_professorFaculdade})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></a>
                    <a href="#delete" class="delete" data-toggle="modal" onclick="remover(${elemento.id_professorFaculdade})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Delete">&#xE872;</i></a>
                <td>`
    linha = linha + '</tr>'

    return linha
}

function editar(id) {
    var url = "profsFaculdade/getPorId/" + id;
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (profFacul) {
            if (profFacul != null) {
                url = 'profsFaculdade/edit/' + profFacul.id_professorFaculdade
                $('#formEditar').attr('action', url)
                $('#nome').val(profFacul.nome)
                $('#cargo').val(profFacul.cargo)
                $('#telemovel').val(profFacul.telemovel)
                $('#telefone').val(profFacul.telefone)
                $('#email').val(profFacul.email)
                var disp = profFacul.disponivel
                $('#disponibilidade').val(disp.toString())
                $('#observacoes').val(profFacul.observacoes)
            }
        },
        error: function (error) {

        }
    })
}

function remover(id) {
    url = 'profsFaculdade/delete/' + id
    $('#formDelete').attr('action', url)
}