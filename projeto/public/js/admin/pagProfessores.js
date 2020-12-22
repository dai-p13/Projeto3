$(document).ready(function () {

    $.ajax({
        url: "professores/pag",
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
        url: "professores/getNum",
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
    linha = linha + `<td>${elemento.id_professor}</td>`
    linha = linha + `<td>${elemento.nome}</td>`
    linha = linha + `<td>${elemento.telefone}</td>`
    linha = linha + `<td>${elemento.telemovel}</td>`
    linha = linha + `<td>${elemento.email}</td>`
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
    var url = "professores/getPorId/" + id;
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (professor) {
            if (professor != null) {
                url = 'professores/edit/' + professor.id_professor
                $('#formEditar').attr('action', url)
                $('#nome').val(professor.nome)
                $('#telefone').val(professor.telefone)
                $('#telemovel').val(professor.telemovel)
                $('#email').val(professor.email)
            }
        },
        error: function (error) {

        }
    })
}

function remover(id) {
    url = 'professores/delete/' + id
    $('#formDelete').attr('action', url)
}