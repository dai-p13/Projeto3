var id_projeto = 0;
var ano = 0;
var idTipo = 0;
var tipoSelect = "";
var inicializada = false;
var existe = false;

$(document).ready(function () {

    $.ajax({
        url: "gerirProjeto/getParticipantes",
        method: "GET",
        dataType: "json",
        success: function (response) {
            id_projeto = response.id_projeto
            ano = response.ano
            carregarAnos()
            carregarEntidades(response)
            carregarContadores(response)
            carregarEscolas(response)
            carregarIlustradores(response)
            carregarJuris(response)
            carregarProfessores(response)
            carregarProfsFac(response)
            carregarRbe(response)
            carregarUniversidade(response)
        },
        error: function (error) {
        }
    })

    $("#formAdd").submit(function (e) {
        if (existe) {
            return false;
        }
    })
});

function carregarAnos() {
    let numIteracoes = ano - 2020;
    let i = 1;
    let opcoes = "";
    let novoAno = ano
    while (i <= numIteracoes) {
        opcoes = opcoes + `<option value="${novoAno}">${novoAno}</option>`;
        novoAno = novoAno - 1
        i++;
    }

    $('#anos').prepend(opcoes);
    $("#anos").val(ano);
}

function carregarEntidades(response) {
    let entidades = response.entidades
    if (entidades != null && entidades.length > 0) {
        for (entidade of entidades) {
            let linha = criarLinha(entidade, 'entidade')
            $('#tableBody').append(linha)
        }
    }
}

function carregarContadores(response) {
    let entidades = response.contadores
    if (entidades != null && entidades.length > 0) {
        for (entidade of entidades) {
            let linha = criarLinha(entidade, 'contador')
            $('#tableBody').append(linha)
        }
    }
}

function carregarEscolas(response) {
    let escolas = response.escolas
    if (escolas != null && escolas.length > 0) {
        for (escola of escolas) {
            let linha = criarLinha(escola, 'escola')
            $('#tableBody').append(linha)
        }
    }
}

function carregarIlustradores(response) {
    let ilustradores = response.ilustradores
    if (ilustradores != null && ilustradores.length > 0) {
        for (ilustrador of ilustradores) {
            let linha = criarLinha(ilustrador, 'ilustrador')
            $('#tableBody').append(linha)
        }
    }
}

function carregarJuris(response) {
    let juris = response.juris
    if (juris != null && juris.length > 0) {
        for (juri of juris) {
            let linha = criarLinha(juri, 'juri')
            $('#tableBody').append(linha)
        }
    }
}

function carregarProfessores(response) {
    let professores = response.professores
    if (professores != null && professores.length > 0) {
        for (professor of professores) {
            criarLinha(professor, 'professor')
        }
    }
}

function carregarProfsFac(response) {
    let profsFac = response.profsFac
    if (profsFac != null && profsFac.length > 0) {
        for (prof of profsFac) {
            let linha = criarLinha(prof, 'profFacul')
            $('#tableBody').append(linha)
        }
    }
}

function carregarRbe(response) {
    let rbes = response.rbes
    if (rbes != null && rbes.length > 0) {
        for (rbe of rbes) {
            let linha = criarLinha(rbe, 'rbe')
            $('#tableBody').append(linha)
        }
    }
}

function carregarUniversidade(response) {
    let universidades = response.universidades
    if (universidades != null && universidades.length > 0) {
        for (uni of universidades) {
            let linha = criarLinha(uni, 'universidade')
            $('#tableBody').append(linha)
        }
    }
}

function criarLinha(elemento, tipo) {
    var linha = "<tr>"
    if (tipo != 'rbe') {
        linha = linha + `<td>${elemento.nome}</td>`
        linha = linha + verificaNull(elemento.telefone)
        linha = linha + verificaNull(elemento.telemovel)
        linha = linha + verificaNull(elemento.email)
        linha = linha + '<td> --- </td>'
        switch (tipo) {
            case 'entidade':
                linha = linha + `<td>Entidade Oficial</td>`
                linha = linha + `<td>Participante</td>`
                linha = linha + '</tr>'
                break;
            case 'contador':
                linha = linha + `<td>Contador</td>`
                linha = linha + `<td>Participante</td>`
                linha = linha + '</tr>'
                break;
            case 'escola':
                linha = linha + `<td>Escola Solidária</td>`
                linha = linha + `<td>Participante</td>`
                linha = linha + '</tr>'
                break;
            case 'ilustrador':
                linha = linha + `<td>Ilustrador Solidário</td>`
                linha = linha + `<td>Participante</td>`
                linha = linha + '</tr>'
                break;
            case 'juri':
                linha = linha + `<td>Juri</td>`
                linha = linha + `<td>Participante</td>`
                linha = linha + '</tr>'
                break;
            case 'professor':
                var cargoUrl = `cargosProfessor/getPorIdProfessor/` + elemento.id_professor + "-" + id_projeto + "-" + ano;
                $.ajax({
                    url: cargoUrl,
                    method: "GET",
                    dataType: "json",
                    success: function (response) {
                        linha = linha + `<td>Professor</td>`
                        linha = linha + `<td>${response.nomeCargo}</td>`
                        linha = linha + '</tr>'
                        $('#tableBody').append(linha)
                    },
                })
                break;
            case 'profFacul':
                linha = linha + `<td>Professor de Faculdade</td>`
                linha = linha + `<td>Participante</td>`
                linha = linha + '</tr>'
                break;
            case 'universidade':
                linha = linha + `<td>Universidade</td>`
                linha = linha + `<td>Participante</td>`
                linha = linha + '</tr>'
                break;
        }
    }
    else {
        linha = linha + `<td>${elemento.nomeCoordenador}</td>`
        linha = linha + '<td> --- </td>'
        linha = linha + '<td> --- </td>'
        linha = linha + '<td> --- </td>'
        linha = linha + `<td>${elemento.regiao}</td>`
        linha = linha + `<td>RBE</td>`
        linha = linha + `<td>Participante</td>`
        linha = linha + '</tr>'
    }

    return linha;
}

function verificaNull(valor) {
    if (valor != null) {
        return `<td>${valor}</td>`;
    }
    else {
        return '<td> --- </td>';
    }
}

function realizarPesquisa() {
    let tipo = $('#tipos').val();
    let anoSelecionado = $('#anos').val();
    let pesq = $('#pesquisa').val();
    if (pesq == "") {
        pesq = null;
    }
    let urlPesq = 'gerirProjeto/pesquisaParticipantes/' + tipo + '-' + anoSelecionado + '-' + pesq;
    $.ajax({
        url: urlPesq,
        method: "GET",
        dataType: "json",
        success: function (response) {
            $("#tableBody").empty();
            id_projeto = response.id_projeto
            ano = response.ano
            carregarEntidades(response)
            carregarEscolas(response)
            carregarContadores(response)
            carregarIlustradores(response)
            carregarJuris(response)
            carregarProfessores(response)
            carregarProfsFac(response)
            carregarRbe(response)
            carregarUniversidade(response)
        },
        error: function (error) {
        }
    })
}

$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

function criarLinhasAdd(elementos, rbe) {
    if (!rbe) {
        for (elemento of elementos) {
            let linha = "<tr>";
            linha = linha + `<td>${elemento.nome}</td>`
            linha = linha + verificaNull(elemento.telefone)
            linha = linha + verificaNull(elemento.telemovel)
            linha = linha + verificaNull(elemento.email)
            let idSelect = `elemento.${idTipo}`;
            linha = linha + '<td><button onclick="selecionar(' + idSelect + ', \'' + elemento.nome + '\')"><img src="http://projeto3/images/select.png"></img></a></td>'
            linha = linha + '</tr>'
            $('#tableBodyAdd').append(linha)
        }
    }
    else {
        for (elemento of elementos) {
            let linha = "<tr>";
            linha = linha + `<td>${elemento.nomeCoordenador}</td>`
            linha = linha + `<td>${elemento.regiao}</td>`
            linha = linha + `<td>${elemento.nome}</td>`
            let idSelect = `elemento.${idTipo}`;
            linha = linha + '<td><button onclick="selecionar(' + idSelect + ', \'' + elemento.nomeCoordenador + '\')"><img src="http://projeto3/images/select.png"></img></a></td>'
            linha = linha + '</tr>'
            $('#tableBodyAdd').append(linha)
        }
        let newhead = '<tr><th>Nome do Coordenador</th><th>Região</th><th>Concelho</th><th>Selecionar</th></tr>'
        $('#tableHeadAdd').append(newhead)
    }
}

function realizarFiltragemTipo() {
    let tipo = $('#tiposAdd').val();
    carregarTabela(tipo);
}

function inicializarDataTable() {
    $('#tabelaAdd').DataTable({
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

function inicializarTabela() {
    $('#divForm').hide();
    $('#divErro').hide();
    $('#divErro').empty();
    if (!inicializada) {
        inicializada = true;
        idTipo = 'id_ilustradorSolidario'
        $.ajax({
            url: 'ilustradores/getDisponiveis',
            method: "GET",
            dataType: "json",
            success: function (response) {
                $("#tableBodyAdd").empty();
                tipoSelect = "ilustrador"
                criarLinhasAdd(response, false);
                inicializarDataTable();
            },
            error: function (error) {
            }
        })
    }
}

function carregarTabela(tipo) {
    var tabela = $('#tabelaAdd').dataTable();
    tabela.fnDestroy();
    $("#tableHeadAdd").empty();
    let newhead = `<tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Telemóvel</th>
                <th>Email</th>
                <th>Selecionar</th>
            </tr>`;
    $('#tableHeadAdd').append(newhead)
    switch (tipo) {
        case 'ilustradores':
            idTipo = 'id_ilustradorSolidario'
            $.ajax({
                url: 'ilustradores/getDisponiveis',
                method: "GET",
                dataType: "json",
                success: function (response) {
                    $("#tableBodyAdd").empty();
                    tipoSelect = "ilustrador"
                    criarLinhasAdd(response, false)
                    inicializarDataTable()
                },
                error: function (error) {
                }
            })
            break;
        case 'contadores':
            idTipo = 'id_contadorHistorias'
            $.ajax({
                url: 'contadores/getDisponiveis',
                method: "GET",
                dataType: "json",
                success: function (response) {
                    $("#tableBodyAdd").empty();
                    tipoSelect = "contador"
                    criarLinhasAdd(response, false)
                    inicializarDataTable()
                },
                error: function (error) {
                }
            })
            break;
        case 'entidades':
            idTipo = 'id_entidadeOficial'
            $.ajax({
                url: 'entidades/getDisponiveis',
                method: "GET",
                dataType: "json",
                success: function (response) {
                    $("#tableBodyAdd").empty();
                    tipoSelect = "entidade"
                    criarLinhasAdd(response, false)
                    inicializarDataTable()
                },
                error: function (error) {
                }
            })
            break;
        case 'escolas':
            idTipo = 'id_escolaSolidaria'
            $.ajax({
                url: 'escolas/getDisponiveis',
                method: "GET",
                dataType: "json",
                success: function (response) {
                    $("#tableBodyAdd").empty();
                    tipoSelect = "escola"
                    criarLinhasAdd(response, false)
                    inicializarDataTable()
                },
                error: function (error) {
                }
            })
            break;
        case 'juris':
            idTipo = 'id_juri'
            $.ajax({
                url: 'juris/getDisponiveis',
                method: "GET",
                dataType: "json",
                success: function (response) {
                    $("#tableBodyAdd").empty();
                    tipoSelect = "juri"
                    criarLinhasAdd(response, false)
                    inicializarDataTable()
                },
                error: function (error) {
                }
            })
            break;
        case 'professores':
            idTipo = 'id_professor'
            $.ajax({
                url: 'professores/getDisponiveis',
                method: "GET",
                dataType: "json",
                success: function (response) {
                    $("#tableBodyAdd").empty();
                    tipoSelect = "professor"
                    criarLinhasAdd(response, false)
                    inicializarDataTable()
                },
                error: function (error) {
                }
            })
            break;
        case 'professores_faculdade':
            idTipo = 'id_professorFaculdade'
            $.ajax({
                url: 'profsFaculdade/getDisponiveis',
                method: "GET",
                dataType: "json",
                success: function (response) {
                    $("#tableBodyAdd").empty();
                    tipoSelect = "profFac"
                    criarLinhasAdd(response, false)
                    inicializarDataTable()
                },
                error: function (error) {
                }
            })
            break;
        case 'rbes':
            idTipo = 'id_rbe'
            $.ajax({
                url: 'rbes/getDisponiveis',
                method: "GET",
                dataType: "json",
                success: function (response) {
                    $("#tableBodyAdd").empty();
                    $("#tableHeadAdd").empty();
                    tipoSelect = "rbe"
                    criarLinhasAdd(response, true)
                    inicializarDataTable()
                },
                error: function (error) {
                }
            })
            break;
        case 'universidades':
            idTipo = 'id_universidade'
            $.ajax({
                url: 'universidades/getDisponiveis',
                method: "GET",
                dataType: "json",
                success: function (response) {
                    $("#tableBodyAdd").empty();
                    tipoSelect = "universidade"
                    criarLinhasAdd(response, false)
                    inicializarDataTable()
                },
                error: function (error) {
                }
            })
            break;
    }
}

function selecionar(id, nome) {
    $('#divForm').show();
    $('#divErro').hide();
    $('#divErro').empty();
    $('#nome').val(nome);
    $('#anoParticipacao').val(ano);
    $('#id_projeto').val(id_projeto);
    $('#id_elemento').val(id);
    switch (tipoSelect) {
        case 'ilustrador':
            var url = 'projetoIlustrador/jaAssociado/' + id + "-" + id_projeto + "-" + ano
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    if (!response) {
                        $('#formAdd').attr('action', 'projetoIlustrador/add')
                        existe = false;
                    }
                    else {
                        var msg = '<h4>Participante selecionado a adicionar ao projeto:</h4><p style="font-size: 20px; color: red;">O participante selecionado já se encontra associado ao projeto!</p>'
                        $('#divForm').hide()
                        $('#divErro').append(msg);
                        $('#divErro').show();
                        existe = true;
                    }
                },
            })
            break;
        case 'contador':
            var url = 'projetoContador/jaAssociado/' + id + "-" + id_projeto + "-" + ano
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    if (!response) {
                        $('#formAdd').attr('action', 'projetoContador/add')
                        existe = false;
                    }
                    else {
                        var msg = '<h4>Participante selecionado a adicionar ao projeto:</h4><p style="font-size: 20px; color: red;">O participante selecionado já se encontra associado ao projeto!</p>'
                        $('#divForm').hide()
                        $('#divErro').append(msg);
                        $('#divErro').show();
                        existe = true;
                    }
                },
            })
            break;
        case 'entidade':
            var url = 'projetoEntidade/jaAssociado/' + id + "-" + id_projeto + "-" + ano
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    if (!response) {
                        $('#formAdd').attr('action', 'projetoEntidade/add')
                        existe = false;
                    }
                    else {
                        var msg = '<h4>Participante selecionado a adicionar ao projeto:</h4><p style="font-size: 20px; color: red;">O participante selecionado já se encontra associado ao projeto!</p>'
                        $('#divForm').hide()
                        $('#divErro').append(msg);
                        $('#divErro').show();
                        existe = true;
                    }
                },
            })
            break;
        case 'escola':
            var url = 'projetoEscola/jaAssociado/' + id + "-" + id_projeto + "-" + ano
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    if (!response) {
                        $('#formAdd').attr('action', 'projetoEscola/add')
                        existe = false;
                    }
                    else {
                        var msg = '<h4>Participante selecionado a adicionar ao projeto:</h4><p style="font-size: 20px; color: red;">O participante selecionado já se encontra associado ao projeto!</p>'
                        $('#divForm').hide()
                        $('#divErro').append(msg);
                        $('#divErro').show();
                        existe = true;
                    }
                },
            })
            break;
        case 'juri':
            var url = 'projetoJuri/jaAssociado/' + id + "-" + id_projeto + "-" + ano
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    if (!response) {
                        $('#formAdd').attr('action', 'projetoJuri/add')
                        existe = false;
                    }
                    else {
                        var msg = '<h4>Participante selecionado a adicionar ao projeto:</h4><p style="font-size: 20px; color: red;">O participante selecionado já se encontra associado ao projeto!</p>'
                        $('#divForm').hide()
                        $('#divErro').append(msg);
                        $('#divErro').show();
                        existe = true;
                    }
                },
            })
            break;
        case 'professor':
            var url = 'projetoProfessor/jaAssociado/' + id + "-" + id_projeto + "-" + ano
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    if (!response) {
                        $('#formAdd').attr('action', 'projetoProfessor/add')
                        existe = false;
                        $.ajax({
                            url: 'cargosProfessor/getAll',
                            method: "GET",
                            dataType: "json",
                            success: function (response) {
                               var inputCargo = `<br><br><label>Cargo do professor no projeto:</label>
                                        <select name="cargo" id="cargos">
                                        </select>`
                                $('#divForm').append(inputCargo);
                                for(cargo of response) {
                                    opcao = `<option value="${cargo.id_cargoProfessor}">${cargo.nomeCargo}</option>`
                                    $('#cargos').append(opcao);
                                }
                            },
                        })
                    }
                    else {
                        var msg = '<h4>Participante selecionado a adicionar ao projeto:</h4><p style="font-size: 20px; color: red;">O participante selecionado já se encontra associado ao projeto!</p>'
                        $('#divForm').hide()
                        $('#divErro').append(msg);
                        $('#divErro').show();
                        existe = true;
                    }
                },
            })
            break;
        case 'profFac':
            var url = 'projetoProfFac/jaAssociado/' + id + "-" + id_projeto + "-" + ano
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    if (!response) {
                        $('#formAdd').attr('action', 'projetoProfFac/add')
                        existe = false;
                    }
                    else {
                        var msg = '<h4>Participante selecionado a adicionar ao projeto:</h4><p style="font-size: 20px; color: red;">O participante selecionado já se encontra associado ao projeto!</p>'
                        $('#divForm').hide()
                        $('#divErro').append(msg);
                        $('#divErro').show();
                        existe = true;
                    }
                },
            })
            break;
        case 'rbe':
            var url = 'projetoRbe/jaAssociado/' + id + "-" + id_projeto + "-" + ano
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    if (!response) {
                        $('#formAdd').attr('action', 'projetoRbe/add')
                        existe = false;
                    }
                    else {
                        var msg = '<h4>Participante selecionado a adicionar ao projeto:</h4><p style="font-size: 20px; color: red;">O participante selecionado já se encontra associado ao projeto!</p>'
                        $('#divForm').hide()
                        $('#divErro').append(msg);
                        $('#divErro').show();
                        existe = true;
                    }
                },
            })
            break;
        case 'universidade':
            var url = 'projetoUniversidade/jaAssociado/' + id + "-" + id_projeto + "-" + ano
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    if (!response) {
                        $('#formAdd').attr('action', 'projetoUniversidade/add')
                        existe = false;
                    }
                    else {
                        var msg = '<h4>Participante selecionado a adicionar ao projeto:</h4><p style="font-size: 20px; color: red;">O participante selecionado já se encontra associado ao projeto!</p>'
                        $('#divForm').hide()
                        $('#divErro').append(msg);
                        $('#divErro').show();
                        existe = true;
                    }
                },
            })
            break;
    }
}
