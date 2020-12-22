$(document).ready(function () {

    $.ajax({
        url: "trocasAgrupamento/pag",
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
        url: "trocasAgrupamento/getNum",
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
    linha = linha + `<td>${elemento.id_troca}</td>`
    linha = linha + `<td>${elemento.agrupamentoAntigo}</td>`
    linha = linha + `<td>${elemento.novoAgrupamento}</td>`
    linha = linha + `<td>${elemento.observacoes}</td>`
    linha = linha + `<td>
                    <a href="#edit" class="edit" data-toggle="modal" onclick="editar(${elemento.id_troca})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></a>
                    <a href="#delete" class="delete" data-toggle="modal" onclick="remover(${elemento.id_troca})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Delete">&#xE872;</i></a>
                <td>`
    linha = linha + '</tr>'

    return linha
}

function editar(id) {
    var url = "trocasAgrupamento/getPorId/" + id;
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (troca) {
            if (troca != null) {
                url = 'trocasAgrupamento/edit/' + troca.id_troca
                $('#formEditar').attr('action', url)
                $('#agrupamentoAntigo').val(troca.agrupamentoAntigo)
                $('#novoAgrupamento').val(troca.novoAgrupamento)
                $('#observacoes').val(troca.observacoes)
            }
        },
        error: function (error) {

        }
    })
}

function remover(id) {
    url = 'trocasAgrupamento/delete/' + id
    $('#formDelete').attr('action', url)
}