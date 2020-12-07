<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gerir Utilizadores</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/utilizadores.css') }}">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        @include("sideBar")
        <div id="page-content-wrapper">
            @include("topBar")
            <div class="container-fluid">
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Gerir<b> Projetos</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#addProjeto" class="btn btn-success" data-toggle="modal"><i
                                                class="material-icons">&#xE147;</i> <span>Criar um novo projeto</span></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Identificador do Projeto</th>
                                        <th>Nome</th>
                                        <th>Objetivos</th>
                                        <th>Regulamento</th>
                                        <th>Público Alvo</th>
                                        <th>Observações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($projetos)) {
                                            foreach($projetos as $projeto) {
                                                $dados = "<tr>";
                                                $dados = $dados.'<td>'.$projeto->id_projeto.'</td>';
                                                $dados = $dados.'<td>'.$projeto->nome.'</td>';
                                                $dados = $dados.'<td>'.$projeto->objetivos.'</td>';
                                                $dados = $dados.'<td><button id="'.$projeto->id_projeto.'" onclick="downloadRegulamento('.$projeto->id_projeto.')">
                                                Download do Regulamento</button></td>';
                                                $dados = $dados.'<td>'.$projeto->publicoAlvo.'</td>';
                                                $dados = $dados.'<td>'.$projeto->observacoes.'</td>';
                                                $dados = $dados.'<td>
                                                        <a href="#editProjeto" class="edit" data-toggle="modal" onclick="editarProjeto('.$projeto->id_projeto.')"><i
                                                                class="material-icons" data-toggle="tooltip"
                                                                title="Editar">&#xE254;</i></a>
                                                        <a href="#deleteProjeto" class="delete" data-toggle="modal" onclick="removerProjeto('.$projeto->id_projeto.')"><i
                                                                class="material-icons" data-toggle="tooltip"
                                                                title="Remover">&#xE872;</i></a>
                                                    </td>';
                                                $dados = $dados.'</tr>';
                                                echo $dados;
                                            }
                                        }
                                        else {
                                            echo "<h1>Não existem projetos na Base de dados...</h1>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="clearfix">
                                <div class="hint-text">A mostrar <b>5</b> out of <b>...</b> registos</div>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a href="#">Previous</a></li>
                                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="addProjeto" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="addProjeto" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Adicionar Projeto</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nome do Projeto</label>
                                        <input type="text" nome="nome" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Objetivos</label>
                                        <input type="text" name="objetivos" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Publico Alvo</label>
                                        <input type="text" name="publicoAlvo" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea class="form-control" name="observacoes"></textarea> 
                                    </div>
                                    <div class="form-group">
                                        <label>Regulamento</label>
                                        <input type="file" name="regulamento" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                    <input type="submit" class="btn btn-success" value="Adicionar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="editProjeto" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="editProjeto" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Projeto</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nome do Projeto</label>
                                        <input id="edit_Nome" type="text" nome="nome" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Objetivos</label>
                                        <input id="edit_Obj" type="text" name="objetivos" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Publico Alvo</label>
                                        <input id="edit_PublicoAlvo" type="text" name="publicoAlvo" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea id="edit_Obs" class="form-control" name="observacoes"></textarea> 
                                    </div>
                                    <div class="form-group">
                                        <label>Regulamento</label>
                                        <input type="file" name="regulamento" class="form-control" required>
                                    </div>
                                    <input type="hidden" id="editPorjetoId" name="id_projeto" value="">
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                    <input type="submit" class="btn btn-info" value="Guardar Alterações">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="deleteProjeto" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="deleteProjeto">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Remover projeto</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem a certeza que deseja remover o projeto?</p>
                                    <p class="text-warning"><small>Esta ação não pode ser retrocedida.</small></p>
                                </div>
                                <input type="hidden" id="removerPorjetoId" name="id_projeto" value="">
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                    <input type="submit" class="btn btn-danger" value="Remover">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function () {
                if (this.checked) {
                    checkbox.each(function () {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function () {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function () {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
                
        });
        
        function downloadRegulamento(id) {
            alert("DOWNLOAD")
        }

        function editarProjeto(id) {
            var url = "projetos/getPorId/" + id;
            $.ajax({
                url: url,
                method: "GET",
                success: function (response) {
                    var projeto = response.projeto
                    $('#editPorjetoId').val(projeto.id_projeto)
                    $('#edit_Nome').val(projeto.nome)
                    $('#edit_Obj').val(projeto.objetivos)
                    $('#edit_PublicoAlvo').val(projeto.publicoAlvo)
                    $('#edit_Obs').val(projeto.observacoes)
                },
                error: function (error) {
                    
                }
            })
        }

        function removerProjeto(id) {
            $('#removerPorjetoId').val(id)
        }
    </script>
</body>

</html>