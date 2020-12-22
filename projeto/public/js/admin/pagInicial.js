$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(document).ready(function () {
    $.ajax({
        url: "projetos/pag",
        method: "GET",
        dataType: "json",
        success: function (response) {
            urlPagSeguinte = response.next_page_url
            urlPagAnterior = response.first_page_url
            urlPagNum = "projetos/pag"
            pagAtual = response.current_page
        },
        error: function (error) {
        }
    })

    $.ajax({
        url: "projetos/getNum",
        method: "GET",
        dataType: "json",
        success: function (response) {
            totalElementos = response;
        },
        error: function (error) {
        }
    })

});

function criarLinha(elemento) {
    var linha = "<tr>"
    linha = linha + `<td>${elemento.id_projeto}</td>`
    linha = linha + `<td>${elemento.nome}</td>`
    linha = linha + `<td>${elemento.objetivos}</td>`
    linha = linha + `<td><button id="${elemento.id_projeto}" onclick="downloadRegulamento(${elemento.id_projeto})">
                            Download do Regulamento</button></td>`
    linha = linha + `<td>${elemento.publicoAlvo}</td>`
    linha = linha + `<td>${elemento.observacoes}</td>`
    linha = linha + `<td>
                            <a href="#edit" class="edit" data-toggle="modal" onclick="editarProjeto(${elemento.id_projeto})"><i
                                    class="material-icons" data-toggle="tooltip"
                                    title="Edit">&#xE254;</i></a>
                            <a href="#delete" class="delete" data-toggle="modal" onclick="removerProjeto(${elemento.id_projeto})"><i
                                    class="material-icons" data-toggle="tooltip"
                                    title="Delete">&#xE872;</i></a>
                        <td>`
    linha = linha + '</tr>'

    return linha
}

function downloadRegulamento(id) {
    alert("DOWNLOAD" + " || " + id);
}

function editarProjeto(id) {
    var url = "projetos/getPorId/" + id;
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (response) {
            if (response != null) {
                url = 'projetos/edit/' + response.projeto.id_projeto
                $('#formEditar').attr('action', url)
                $('#editPorjetoId').val(response.projeto.id_projeto)
                $('#edit_Nome').val(response.projeto.nome)
                $('#edit_Obj').val(response.projeto.objetivos)
                $('#edit_PublicoAlvo').val(response.projeto.publicoAlvo)
                $('#edit_Obs').val(response.projeto.observacoes)
            }
        },
        error: function (error) {

        }
    })
}

function removerProjeto(id) {
    url = 'projetos/delete/' + id
    $('#formDelete').attr('action', url)
}