var urlPagSeguinte = ""
var urlPagAnterior = ""
var totalUsers = 0

        $(document).ready(function () {

            $.ajax({
                url: "utilizadores/pagUtilizadores",
                method: "GET",
                dataType: "json",
                success: function (users) {
                    urlPagSeguinte = users.next_page_url
                    urlPagAnterior = users.first_page_url
                },
                error: function (error) {
                }
            })

            $.ajax({
                url: "utilizadores/getNumUsers",
                method: "GET",
                dataType: "json",
                success: function (users) {
                    totalUsers = users;
                },
                error: function (error) {
                }
            })

        });

        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        function paginaAnterior() {
            $.ajax({
                url: urlPagAnterior,
                method: "GET",
                dataType: "json",
                success: function (users) {
                    if(users.data != null) {
                        $("#tableBody").empty();
                        for(user of users.data)  {
                            var linha = criarLinha(user)
                            $("#tableBody").append(linha);
                        }
                    }
                    urlPagSeguinte = users.next_page_url
                    urlPagAnterior = users.first_page_url
                    var msg = "A mostrar <b>"+ users.to + "</b> de <b>" + totalUsers + "</b> resultados."
                    document.getElementById("numResultados").innerHTML = msg;
                },
                error: function (error) {
                }
            })
        }

        function paginaSeguinte() {
            $.ajax({
                url: urlPagSeguinte,
                method: "GET",
                dataType: "json",
                success: function (users) {
                    if(users.data != null) {
                        $("#tableBody").empty();
                        for(user of users.data)  {
                            var linha = criarLinha(user)
                            $("#tableBody").append(linha);
                        }
                    }
                    urlPagSeguinte = users.next_page_url
                    urlPagAnterior = users.first_page_url
                    var msg = "A mostrar <b>"+ users.to + "</b> de <b>" + totalUsers + "</b> resultados."
                    document.getElementById("numResultados").innerHTML = msg;
                },
                error: function (error) {
                }
            }) 
        }

        function pagNum(numPagina) {
            urlPag = "http://projeto3/admin/utilizadores/pagUtilizadores?page=" + numPagina
            $.ajax({
                url: urlPag,
                method: "GET",
                dataType: "json",
                success: function (users) {
                    if(users.data != null) {
                        $("#tableBody").empty();
                        for(user of users.data)  { 
                            var linha = criarLinha(user)
                            $("#tableBody").append(linha);
                        }
                    }
                    urlPagSeguinte = users.next_page_url
                    urlPagAnterior = users.first_page_url
                    var msg = "A mostrar <b>"+ users.to + "</b> de <b>" + totalUsers + "</b> resultados."
                    document.getElementById("numResultados").innerHTML = msg;
                },
                error: function (error) {
                }
            })
        }

        function criarLinha(user) {
                var linha = "<tr>"
                linha = linha + `<td>${user.nomeUtilizador}</td>`
                linha = linha + `<td>${user.nome}</td>`
                linha = linha + `<td>${user.password}</td>`
                linha = linha + `<td>${user.email}</td>`
                linha = linha + `<td>${user.telemovel}</td>`
                linha = linha + `<td>${user.telefone}</td>`
                linha = linha + `<td>${user.departamento}</td>`
                if(user.tipoUtilizador == 0) {
                    linha = linha + '<td>Administrador</td>'
                }
                else {
                    linha = linha + '<td>Colaborador</td>'
                }
                linha = linha + `<td>
                    <a href="#editUtilizador" class="edit" data-toggle="modal" onclick="editarUtilizador(${user.id_utilizador})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></a>
                    <a href="#deleteUtilizador" class="delete" data-toggle="modal" onclick="removerUtilizador(${user.id_utilizador})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Delete">&#xE872;</i></a>
                <td>`
                linha = linha + '</tr>'
                
                return linha
        }

        function editarUtilizador(id) {
            var url = "utilizadores/getPorId/" + id;
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function (user) {
                    if(user != null) {
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