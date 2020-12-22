<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Escolas Solidárias</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/utilizadores.css') }}">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <link href="{{asset('css/sideBarImg.css')}}" rel="stylesheet">
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
                <div class="tabelasCrud">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Gerir <b>Escolas Solidárias</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#add" class="btn btn-success" data-toggle="modal" onclick="carregarAgrupamentos(true)"><i
                                            class="material-icons">&#xE147;</i> <span>Criar um nova Escola Solidária</span></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Número identificador</th>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>Telemóvel</th>
                                        <th>Contacto da Associação de Pais</th>
                                        <th>Agrupamento</th>
                                        <th>Disponibilidade</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <?php
                                        use \App\Http\Controllers\AgrupamentoController;
                                        $contagem = 0;
                                        $numEntidades = 0;
                                        $paginaAtual = 1;
                                        if(isset($data)) {
                                            $numEntidades = count($data);
                                            foreach($data as $linha) {
                                                if($contagem == 10) {
                                                    break;
                                                }
                                                $nomeAgrupamento = AgrupamentoController::getNomeAgrupamentoPorId($linha->id_agrupamento);
                                                $dados = '<tr>';
                                                $dados = $dados.'<td>'.$linha->id_escolaSolidaria.'</td>';
                                                $dados = $dados.'<td>'.$linha->nome.'</td>';
                                                $dados = $dados.'<td>'.$linha->telefone.'</td>';
                                                $dados = $dados.'<td>'.$linha->telemovel.'</td>';
                                                $dados = $dados.'<td>'.$linha->contactoAssPais.'</td>';
                                                $dados = $dados.'<td>'.$nomeAgrupamento.'</td>';
                                                if($linha->disponivel == 0) {
                                                    $dados = $dados.'<td>Disponível</td>';
                                                }
                                                else {
                                                    $dados = $dados.'<td>Indisponível</td>';    
                                                }
                                                $dados = $dados.'<td>
                                                        <a href="#edit" class="edit" data-toggle="modal" onclick="editar('.$linha->id_escolaSolidaria.')"><i
                                                                class="material-icons" data-toggle="tooltip"
                                                                title="Edit">&#xE254;</i></a>
                                                        <a href="#delete" class="delete" data-toggle="modal" onclick="remover('.$linha->id_escolaSolidaria.')"><i
                                                                class="material-icons" data-toggle="tooltip"
                                                                title="Delete">&#xE872;</i></a>
                                                    </td>';
                                                $dados = $dados.'</tr>';
                                                echo $dados;
                                                $contagem = $contagem + 1;
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
                            @include('paginacao')
                        </div>
                    </div>
                </div>
                <div id="add" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="escolas/add">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Adicionar uma Escola Solidária</h4>
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
                                        <label>Telemóvel</label>
                                        <input type="tel" name="telemovel" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Contacto da Associação de Pais</label>
                                        <input type="tel" name="contactoAssPais" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Agrupamento</label>
                                        <select id="agrupamentosAdd" name="agrupamento">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Disponibilidade</label>
                                        <select name="disponibilidade">
                                            <option value="0">Disponivel</option>
                                            <option value="1">Indisponivel</option>
                                        </select>
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
                                    <h4 class="modal-title">Editar uma Escola Solidária</h4>
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
                                        <input type="tel" id="telefone"  name="telefone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Telemóvel</label>
                                        <input type="tel" id="telemovel" name="telemovel" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Contacto da Associação de Pais</label>
                                        <input type="tel" id="contactoAssPais" name="contactoAssPais" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Agrupamento</label>
                                        <select id="agrupamentos" name="agrupamento">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Disponibilidade</label>
                                        <select id="disponibilidade" name="disponibilidade">
                                            <option value="0">Disponivel</option>
                                            <option value="1">Indisponivel</option>
                                        </select>
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
                                    <h4 class="modal-title">Remover a Escola Solidária</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem a certeza que deseja remover a escola solidária?</p>
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
</body>
<script src="{{ asset('js/paginacao.js') }}"></script>
<script src="{{ asset('js/admin/pagEscolasSolidarias.js') }}"></script>
</html>