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

function verificaNull(valor) {
    if (valor == null) {
        return `<td> ---- </td>`;
    }
    else {
        return `<td>${valor}</td>`;
    }
}

function editarUtilizador(id) {
    var url = "utilizadores/getPorId/" + id;
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (user) {
            if (user != null) {
                url = 'utilizadores/editUtilizador/' + user.id_utilizador
                $('#formEditarUtilizador').attr('action', url)
                $('#nomeUtilizador').val(user.nomeUtilizador)
                $('#nome').val(user.nome)
                $('#password').val(user.password)
                $('#departamento').val(user.departamento)
                var tipoUser = user.tipoUtilizador
                $('#tipoUtilizador').val(tipoUser.toString())
                $('#telefone').val(user.telefone)
                $('#telemovel').val(user.telemovel)
                $('#email').val(user.email)
            }
        },
        error: function (error) {

        }
    })
}

function removerUtilizador(id) {
    url = 'utilizadores/deleteUtilizador/' + id
    $('#formDeleteUtilizador').attr('action', url)
}