$(document).ready(function () {

    $.ajax({
        url: "universidades/pag",
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
        url: "universidades/getNum",
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
    linha = linha + `<td>${elemento.id_universidade}</td>`
    linha = linha + `<td>${elemento.tipo}</td>`
    linha = linha + `<td>${elemento.nome}</td>`
    linha = linha + `<td>${elemento.curso}</td>`
    linha = linha + `<td>${elemento.telefone}</td>`
    linha = linha + `<td>${elemento.telemovel}</td>`
    linha = linha + `<td>${elemento.email}</td>`
    if(elemento.disponivel == 0) {
        linha = linha + `<td>Disponível</td>`    
    }
    else {
        linha = linha + `<td>Indisponível</td>` 
    }
    linha = linha + `<td>
                    <a href="#edit" class="edit" data-toggle="modal" onclick="editar(${elemento.id_universidade})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></a>
                    <a href="#delete" class="delete" data-toggle="modal" onclick="remover(${elemento.id_universidade})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Delete">&#xE872;</i></a>
                <td>`
    linha = linha + '</tr>'

    return linha
}

function editar(id) {
    var url = "universidades/getPorId/" + id;
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (uni) {
            if (uni != null) {
                url = 'universidades/edit/' + uni.id_universidade
                $('#formEditar').attr('action', url)
                $('#curso').val(uni.curso)
                $('#tipo').val(uni.tipo)
                $('#nome').val(uni.nome)
                $('#telefone').val(uni.telefone)
                $('#telemovel').val(uni.telemovel)
                $('#email').val(uni.email)
                var disp = uni.disponivel
                $('#disponibilidade').val(disp.toString())
            }
        },
        error: function (error) {

        }
    })
}

function remover(id) {
    url = 'universidades/delete/' + id
    $('#formDelete').attr('action', url)
}