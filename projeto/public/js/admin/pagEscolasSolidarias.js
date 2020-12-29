var carregamento = false;
var idSelecionado = 0;

$(document).ready(function () {
    inicializarDataTable('#tabelaDados');
});

function inicializarDataTable(idTabela) {
    $(idTabela).DataTable({
        "language": {
            "sSearch": "Pesquisar",
            "lengthMenu": "Mostrar _MENU_ registos por página",
            "zeroRecords": "Nehum registo encontrado!",
            "info": "A mostrar a página _PAGE_ de _PAGES_",
            "infoEmpty": "Nehuns registos disponíveis!",
            "infoFiltered": "(filtrados _MAX_ do total de registos)",
            "paginate": {
                "previous": "Anterior",
                "next": "Seguinte"
            }
        }
    });
}

$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

function editar(id, localidade) {
    var url = "escolas/getPorId/" + id;
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (escola) {
            if (escola != null) {
                url = 'escolas/edit/' + escola.id_escolaSolidaria
                $('#formEditar').attr('action', url)
                $('#nome').val(escola.nome)
                $('#telefone').val(escola.telefone)
                $('#telemovel').val(escola.telemovel)
                $('#contactoAssPais').val(escola.contactoAssPais)
                carregarAgrupamentos(false, localidade)
                var disp = escola.disponivel
                $('#disponibilidade').val(disp.toString())
            }
        },
        error: function (error) {
        }
    })
}

function remover(id) {
    url = 'escolas/delete/' + id
    $('#formDelete').attr('action', url)
}

function carregarAgrupamentos(adicionar, localidade) {
    if (adicionar) {
        $('#tableBodyAdd').empty();
        var tabela = $('#tableBodyAdd').dataTable();
        tabela.fnDestroy();
        $("#tableHeadAdd").empty();
        let newheadAdd = `<tr>
                    <th>Nome</th>
                    <th>Localidade</th>
                    <th>Nome Diretor</th>
                    <th>Selecionar</th>
                </tr>`;
        $('#tableHeadAdd').append(newheadAdd)
    }
    else {
        $('#tableBodyEdit').empty();
        var tabela = $('#tableBodyEdit').dataTable();
        tabela.fnDestroy();
        $("#tableHeadEdit").empty();
        let newheadEdit = `<tr>
                    <th>Nome</th>
                    <th>Localidade</th>
                    <th>Nome Diretor</th>
                    <th>Selecionar</th>
                </tr>`;
        $('#tableHeadEdit').append(newheadEdit)
    }
    $.ajax({
        url: 'agrupamentos/getAll',
        method: "GET",
        dataType: "json",
        success: function (agrupamentos) {
            if (agrupamentos != null) {
                for (elemento of agrupamentos) {
                    var linha = '<tr>'
                    linha = linha + `<td>${elemento.nome}</td>`
                    linha = linha + verificaNull(localidade)
                    linha = linha + verificaNull(elemento.nomeDiretor)
                    linha = linha + `<td><a onclick="selecionar(${adicionar}, ${elemento.id_agrupamento}, \'${elemento.nome}\')"><img src="http://projeto3/images/select.png"></img></a></td>`
                    linha = linha + '</tr>'
                    if (adicionar) {
                        $('#tableBodyAdd').append(linha)
                    }
                    else {
                        $('#tableBodyEdit').append(linha)
                    }
                }
                if (adicionar) {
                    inicializada = 
                    inicializarDataTable('#tabelaAdd')
                }
                else {
                    inicializarDataTable('#tabelaEdit')
                }
            }
        },
        error: function (error) {
        }
    })
}

function verificaNull(valor) {
    if (valor != null) {
        return `<td>${valor}</td>`;
    }
    else {
        return '<td> --- </td>';
    }
}

function selecionar(adicionar, id_agrupamento, nome) {
    if(adicionar) {
        $('#agrupamentoAdd').val(id_agrupamento)
        $('#nomeAgrupamentoAdd').val(nome)
    }
    else {
        $('#agrupamento').val(id_agrupamento)
        $('#nomeAgrupamento').val(nome)    
    }
    
}