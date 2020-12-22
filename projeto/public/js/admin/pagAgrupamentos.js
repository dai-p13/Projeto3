$(document).ready(function () {

    $.ajax({
        url: "agrupamentos/pag",
        method: "GET",
        dataType: "json",
        success: function (response) {
            urlPagSeguinte = response.next_page_url
            urlPagAnterior = response.first_page_url
            urlPagNum = response.path
            pagAtual = response.current_page
        },
        error: function (error) {
        }
    })

    $.ajax({
        url: "agrupamentos/getNum",
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
    linha = linha + `<td>${elemento.id_agrupamento}</td>`
    linha = linha + `<td>${elemento.nome}</td>`
    linha = linha + `<td>${elemento.telefone}</td>`
    linha = linha + `<td>${elemento.email}</td>`
    linha = linha + `<td>${elemento.nomeDiretor}</td>`
    linha = linha + `<td>
                    <a href="#edit" class="edit" data-toggle="modal" onclick="editar(${elemento.id_agrupamento})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></a>
                    <a href="#delete" class="delete" data-toggle="modal" onclick="remover(${elemento.id_agrupamento})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Delete">&#xE872;</i></a>
                <td>`
    linha = linha + '</tr>'

    return linha
}

function editar(id) {
    var url = "agrupamentos/getPorId/" + id;
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (agrupamento) {
            if (agrupamento != null) {
                url = 'agrupamentos/edit/' + agrupamento.id_agrupamento
                $('#formEditar').attr('action', url)
                $('#nome').val(agrupamento.nome)
                $('#email').val(agrupamento.email)
                $('#telefone').val(agrupamento.telefone)
                $('#nomeDiretor').val(agrupamento.nomeDiretor)
            }
        },
        error: function (error) {

        }
    })
}

function remover(id) {
    url = 'agrupamentos/delete/' + id
    $('#formDelete').attr('action', url)
}