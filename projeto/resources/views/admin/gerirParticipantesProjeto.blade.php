<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Participantes</title>
    <link rel="stylesheet" href="{{ asset('fonts/font-roboto-varela-round.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material_icons.css') }}">
    <link rel="stylesheet"
        href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/utilizadores.css') }}">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <link href="{{asset('css/sideBarImg.css')}}" rel="stylesheet">
    <link href="{{asset('css/form-pesquisa.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        @include("admin/sideBar")
        <div id="page-content-wrapper">
            @include("admin/topBar")
            <?php
                if(isset($title)) {
                    echo '<h1 style="padding: 3%">'.$title.'</h1>';
                }
            ?>
            <div class="span8 form-inline formPesq">
                <label class="selectTipo">Filtrar tabela por:</label>
                <select name="tipoParticipante" id="tipos">
                    <optgroup label="Tipo de Participante">
                        <option value="todos">Todos</option>
                        <option value="ilustrador_solidario">Ilustradores Solidários</option>
                        <option value="contador_historias">Contador de Histórias</option>
                        <option value="entidade_oficial">Entidade Oficial</option>
                        <option value="escola_solidaria">Escola Solidária</option>
                        <option value="juri">Juri</option>
                        <option value="professor">Professor</option>
                        <option value="professor_faculdade">Professor de Faculdade</option>
                        <option value="rbe">Rede de Bibliotecas Escolares (RBE)</option>
                        <option value="universidade">Universidade</option>
                    </optgroup>
                </select>
                <label class="selectAnos" for="ano">Anos:</label>
                <select name="ano" id="anos">
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                </select>
                <div class="inputPesq">
                    <input type="text" name="pesquisa" id="pesquisa" class="span1">
                </div>
                <div class="divSubmit">
                    <button class="buttonSubmit" onclick="realizarPesquisa()">Pesquisar</button>
                </div>
            </div>
            <div class="container-fluid">
                <div class="tabelasCrud">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Gerir <b>Participantes no projeto</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#add" class="btn btn-success" data-toggle="modal"><i
                                                class="material-icons">&#xE147;</i> <span>Adicionar um novo Participante</span></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>Telemóvel</th>
                                        <th>Email</th>
                                        <th>Regiao</th>
                                        <th>Tipo de Participante</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="add" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="POST" action="">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Adicionar Participante</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="selectTipo">Filtrar tabela por:</label>
                                        <select name="tipoParticipante" id="tiposAdd">
                                            <optgroup label="Tipo de Participante">
                                                <option value="ilustrador_solidario">Ilustradores Solidários</option>
                                                <option value="contador_historias">Contador de Histórias</option>
                                                <option value="entidade_oficial">Entidade Oficial</option>
                                                <option value="escola_solidaria">Escola Solidária</option>
                                                <option value="juri">Juri</option>
                                                <option value="professor">Professor</option>
                                                <option value="professor_faculdade">Professor de Faculdade</option>
                                                <option value="rbe">Rede de Bibliotecas Escolares (RBE)</option>
                                                <option value="universidade">Universidade</option>
                                            </optgroup>
                                        </select>
                                        <br><br>
                                        <label class="selectTipo">Pesquisa por nome:</label>
                                        <input type="text" name="pesquisa" id="pesquisaAdd" class="span1">
                                        <button onclick="realizarPesquisaNome()">Pesquisar</button>    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="padding-left: 3%;">Selecione o participante a adicionar:</label>
                                    <table class="table table-striped table-hover" style="padding-left: 3%;padding-right: 3%;">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Tipo de Participante</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBodyAdd">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                    <input type="submit" class="btn btn-success" value="Adicionar">
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
                                    <h4 class="modal-title">Remover Participante</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem a certeza que deseja remover o participante?</p>
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
<script src="{{ asset('js/admin/pagGerirProjeto.js') }}"></script>
</html>