var carregamento = false;
$(document).ready(function () {
    inicializarDataTable();
});

function inicializarDataTable() {
    $('#tabelaDados').DataTable({
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

function editar(id) {
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
                carregarAgrupamentos(false)
                $('#agrupamento').val(escola.id_agrupamento.toString())
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

function carregarAgrupamentos(adicionar) {
    if(carregamento == false) {
        $.ajax({
            url: 'agrupamentos/getAll',
            method: "GET",
            dataType: "json",
            success: function (agrupamentos) {
                var opcoes = ''
                if (agrupamentos != null) {
                    carregamento = true;
                    for(agrup of agrupamentos) {
                        opcoes = opcoes + `<option value="${agrup.id_agrupamento}">${agrup.nome}</option>`
                    }
                    if(adicionar) {
                        $('#agrupamentosAdd').append(opcoes)   
                    }
                    else {
                        $('#agrupamentos').append(opcoes)   
                    }
                    
                }
            },
            error: function (error) {

            }
        })    
    }
}