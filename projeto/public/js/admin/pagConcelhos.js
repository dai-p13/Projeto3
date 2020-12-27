$(document).ready(function () {

    $.ajax({
        url: "concelhos/pag",
        method: "GET",
        dataType: "json",
        success: function (response) {
            urlPagSeguinte = response.next_page_url
            urlPagAnterior = response.first_page_url
            urlPagNum = "concelhos/pag"
            pagAtual = response.current_page
        },
        error: function (error) {
        }
    })

    $.ajax({
        url: "concelhos/getNum",
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
    linha = linha + `<td>${elemento.id_concelho}</td>`
    linha = linha + `<td>${elemento.nome}</td>`
    linha = linha + `<td>
                    <a href="#edit" class="edit" data-toggle="modal" onclick="editar(${elemento.id_concelho})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></a>
                    <a href="#delete" class="delete" data-toggle="modal" onclick="remover(${elemento.id_concelho})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Delete">&#xE872;</i></a>
                <td>`
    linha = linha + '</tr>'

    return linha
}

function editar(id) {
    var url = "concelhos/getPorId/" + id;
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (concelho) {
            if (concelho != null) {
                url = 'concelhos/edit/' + concelho.id_concelho
                $('#formEditar').attr('action', url)
                $('#nome').val(concelho.nome)
            }
        },
        error: function (error) {

        }
    })
}

function remover(id) {
    url = 'concelhos/verificaRbe/' + id
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        url: url,
        method: "GET",
        success: function (msg) {
            if (msg != null && msg != '') {
                $('#titulo').text("Erro");
                $('#mensagem').text(msg);
                $('#msg').modal('show');
            }
            if(msg == '') {
                url = 'concelhos/delete/' + id
                $('#formDelete').attr('action', url)
                $('#delete').modal("show");
            }
        },
        error: function (error) {
        }
    })
}