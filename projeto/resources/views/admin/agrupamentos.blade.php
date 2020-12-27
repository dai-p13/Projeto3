<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Utilizadores</title>
    <link rel="stylesheet" href="{{ asset('fonts/font-roboto-varela-round.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material_icons.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/utilizadores.css') }}">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <link href="{{asset('css/sideBarImg.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/dataTable.bootstrap4.min.js') }}"></script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        @include("admin/sideBar")
        <div id="page-content-wrapper">
            @include("admin/topBar")
            <div class="container-fluid">
                <div class="tabelasCrud">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Gerir <b>Agrupamentos</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#add" class="btn btn-success" data-toggle="modal"><i
                                                class="material-icons">&#xE147;</i> <span>Criar um novo Agrupamento</span></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover" id="tabelaDados">
                                <thead>
                                    <tr>
                                        <th>Número identificador</th>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Nome do Diretor</th>
                                        <th>Rua</th>
                                        <th>Número da Porta</th>
                                        <th>Localidade</th>
                                        <th>Código Postal</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <?php
                                        use \App\Http\Controllers\CodPostalController;
                                        use \App\Http\Controllers\CodPostalRuaController;
                                        if(isset($data)) {
                                            foreach($data as $linha) {
                                                $codPostal = CodPostalController::getCodPostal($linha->codPostal);
                                                $localidade = CodPostalController::getLocalidade($linha->codPostal);
                                                $codPostalRua = CodPostalRuaController::getCodPostalRua($linha->codPostalRua);
                                                $rua = CodPostalRuaController::getRua($linha->codPostalRua);
                                                $numPorta = CodPostalRuaController::getNumPortaRua($linha->codPostalRua);
                                                $dados = '<tr>';
                                                $dados = $dados.'<td>'.$linha->id_agrupamento.'</td>';
                                                $dados = $dados.'<td>'.$linha->nome.'</td>';
                                                $dados = $dados.verificaNull($linha->telefone);
                                                $dados = $dados.verificaNull($linha->email);
                                                $dados = $dados.verificaNull($linha->nomeDiretor);
                                                $dados = $dados.'<td>'.$rua.'</td>';
                                                $dados = $dados.'<td>'.$numPorta.'</td>';
                                                $dados = $dados.'<td>'.$localidade.'</td>';
                                                $dados = $dados.'<td>'.$codPostal.'-'.$codPostalRua.'</td>';
                                                $dados = $dados.'<td>
                                                        <a href="#edit" class="edit" data-toggle="modal" onclick="editar('.$linha->id_agrupamento.')"><i
                                                                class="material-icons" data-toggle="tooltip"
                                                                title="Edit">&#xE254;</i></a>
                                                        <a href="#delete" class="delete" data-toggle="modal" onclick="remover('.$linha->id_agrupamento.')"><i
                                                                class="material-icons" data-toggle="tooltip"
                                                                title="Delete">&#xE872;</i></a>
                                                    </td>';
                                                $dados = $dados.'</tr>';
                                                echo $dados;
                                            }
                                        }
                                        function verificaNull($valor) {
                                            if($valor != null) {
                                                return '<td>'.$valor.'</td>';    
                                            }
                                            else {
                                                return '<td> --- </td>';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="add" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="agrupamentos/add">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Adicionar Agrupamento</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" name="nome" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="tel" name="telefone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nome do Diretor</label>
                                        <input type="text" name="nomeDiretor" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Rua</label>
                                        <input type="text" name="rua" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Número da Porta</label>
                                        <input type="text" name="numPorta" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Localidade</label>
                                        <input type="text" name="localidade" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Código Postal</label>
                                        <input type="text" name="codPostal">
                                        <input type="text" name="codPostalRua">
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
                <div id="edit" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="" id="formEditar">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Agrupamento</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" id="nome" name="nome" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="tel" id="telefone" name="telefone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nome do Diretor</label>
                                        <input type="text" id="nomeDiretor" name="nomeDiretor" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Rua</label>
                                        <input type="text" name="rua" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Número da Porta</label>
                                        <input type="text" name="numPorta" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Localidade</label>
                                        <input type="text" name="localidade" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Código Postal</label>
                                        <input type="text" id="codPostal" name="codPostal">
                                        <input type="text" id="codPostalRua" name="codPostalRua">
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
                <div id="delete" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="" id="formDelete">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Remover Agrupamento</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem a certeza que deseja remover o agrupamento?</p>
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
    <script src="{{ asset('js/admin/pagAgrupamentos.js') }}"></script>
</body>

</html>