<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        @include("admin/sideBar")
        <div id="page-content-wrapper">
            @include("admin/topBar")
            <div class="container-fluid">
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Gerir <b>Utilizadores</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#addUtilizador" class="btn btn-success" data-toggle="modal"><i
                                                class="material-icons">&#xE147;</i> <span>Criar um novo utilizador</span></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nome de utilizador</th>
                                        <th>Nome</th>
                                        <th>Password</th>
                                        <th>Email</th>
                                        <th>Telemovel</th>
                                        <th>Telefone</th>
                                        <th>Departamento</th>
                                        <th>Tipo de utilizador</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <?php
                                        $contagem = 0;
                                        $numUtilizadores = 0;
                                        $paginaAtual = 1;
                                        if(isset($utilizadores)) {
                                            $numUtilizadores = count($utilizadores);
                                            foreach($utilizadores as $user) {
                                                if($contagem == 5) {
                                                    break;
                                                }
                                                $dados = '<tr>';
                                                $dados = $dados.'<td>'.$user->nomeUtilizador.'</td>';
                                                $dados = $dados.'<td>'.$user->nome.'</td>';
                                                $dados = $dados.'<td>'.$user->password.'</td>';
                                                $dados = $dados.'<td>'.$user->email.'</td>';
                                                $dados = $dados.'<td>'.$user->telemovel.'</td>';
                                                $dados = $dados.'<td>'.$user->telefone.'</td>';
                                                $dados = $dados.'<td>'.$user->departamento.'</td>';
                                                if($user->tipoUtilizador == 0) {
                                                    $dados = $dados.'<td>Administrador</td>';    
                                                }
                                                else {
                                                    $dados = $dados.'<td>Colaborador</td>'; 
                                                }
                                                $dados = $dados.'<td>
                                                        <a href="#editUtilizador" class="edit" data-toggle="modal" onclick="editarUtilizador('.$user->id_utilizador.')"><i
                                                                class="material-icons" data-toggle="tooltip"
                                                                title="Edit">&#xE254;</i></a>
                                                        <a href="#deleteUtilizador" class="delete" data-toggle="modal" onclick="removerUtilizador('.$user->id_utilizador.')"><i
                                                                class="material-icons" data-toggle="tooltip"
                                                                title="Delete">&#xE872;</i></a>
                                                    </td>';
                                                $dados = $dados.'</tr>';
                                                echo $dados;
                                                $contagem = $contagem + 1;
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="clearfix">
                                <div class="hint-text" id="numResultados">A mostrar <b><?php echo $contagem?></b> de <b><?php if($numUtilizadores != 0) {echo $numUtilizadores;}?></b> registos</div>
                                <ul class="pagination">
                                    <?php
                                        if($numUtilizadores != 0) {
                                            $i = 1;
                                            $numPaginas = ceil($numUtilizadores / 5);
                                            $paginas = '<li class="page-item"><a onclick="paginaAnterior()" class="page-link">Anterior</a></li>';
                                            while($i <= $numPaginas) {
                                                if($i == $paginaAtual) {
                                                    $paginas = $paginas.'<li class="page-item"><a onclick="pagNum('.$i.')" class="page-link">'.$i.'</a></li>';
                                                }
                                                else {
                                                    $paginas = $paginas.'<li class="page-item"><a onclick="pagNum('.$i.')" class="page-link">'.$i.'</a></li>';
                                                }
                                                $i = $i + 1;
                                            }
                                            $paginas = $paginas.'<li class="page-item"><a onclick="paginaSeguinte()" class="page-link">Next</a></li>';
                                            echo $paginas;
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="addUtilizador" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="utilizadores/addUtilizador">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Adicionar Utilizador</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nome de utilizador</label>
                                        <input type="text" name="nomeUtilizador" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" name="nome" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Departamento</label>
                                        <input type="text" name="departamento" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tipo de Utilizador</label>
                                        <select name="tipoUtilizador">
                                            <option value="0">Administrador</option>
                                            <option value="1">Colaborador</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="tel" name="telefone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Telemóvel</label>
                                        <input type="tel" name="telemovel" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control">
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
                <div id="editUtilizador" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="" id="formEditarUtilizador">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Utilizador</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nome de utilizador</label>
                                        <input type="text" id="nomeUtilizador" name="nomeUtilizador" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" id="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" id="nome" name="nome" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Departamento</label>
                                        <input type="text" id="departamento" name="departamento" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tipo de Utilizador</label>
                                        <select id="tipoUtilizador" name="tipoUtilizador" required>
                                            <option value="0">Administrador</option>
                                            <option value="1">Colaborador</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="tel" id="telefone" name="telefone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Telemóvel</label>
                                        <input type="tel" id="telemovel" name="telemovel" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                    <input type="submit" class="btn btn-info" value="Guardar Alterações">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="deleteUtilizador" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="" id="formDeleteUtilizador">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Remover Utilizador</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem a certeza que deseja remover o utilizador?</p>
                                    <p class="text-warning"><small>Esta ação não pode ser retrocedida.</small></p>
                                </div>
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
    <script src="{{ asset('js/admin/pagUtilizadores.js') }}"></script>
</body>

</html>