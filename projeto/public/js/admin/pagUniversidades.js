var urlPagSeguinte = ""
var urlPagAnterior = ""
var totalElementos = 0

        $(document).ready(function () {

            $.ajax({
                url: "universidades/pagUniversidades",
                method: "GET",
                dataType: "json",
                success: function (response) {
                    urlPagSeguinte = response.next_page_url
                    urlPagAnterior = response.first_page_url
                },
                error: function (error) {
                }
            })

            $.ajax({
                url: "universidades/getNumUni",
                method: "GET",
                dataType: "json",
                success: function (response) {
                    totalElementos = response;
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
                success: function (response) {
                    if(response.data != null) {
                        $("#tableBody").empty();
                        for(elemento of response.data)  {
                            var linha = criarLinha(elemento)
                            $("#tableBody").append(linha);
                        }
                    }
                    urlPagSeguinte = users.next_page_url
                    urlPagAnterior = users.first_page_url
                    var msg = "A mostrar <b>"+ response.to + "</b> de <b>" + totalElementos + "</b> resultados."
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
                success: function (response) {
                    if(response.data != null) {
                        $("#tableBody").empty();
                        for(elemento of response.data)  {
                            var linha = criarLinha(elemento)
                            $("#tableBody").append(linha);
                        }
                    }
                    urlPagSeguinte = response.next_page_url
                    urlPagAnterior = response.first_page_url
                    var msg = "A mostrar <b>"+ response.to + "</b> de <b>" + totalElementos + "</b> resultados."
                    document.getElementById("numResultados").innerHTML = msg;
                },
                error: function (error) {
                }
            }) 
        }

        function pagNum(numPagina) {
            urlPag = "http://projeto3/admin/universidades/pagUniversidades?page=" + numPagina
            $.ajax({
                url: urlPag,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    if(response.data != null) {
                        $("#tableBody").empty();
                        for(elemento of response.data)  { 
                            var linha = criarLinha(elemento)
                            $("#tableBody").append(linha);
                        }
                    }
                    urlPagSeguinte = response.next_page_url
                    urlPagAnterior = response.first_page_url
                    var msg = "A mostrar <b>"+ response.to + "</b> de <b>" + totalElementos + "</b> resultados."
                    document.getElementById("numResultados").innerHTML = msg;
                },
                error: function (error) {
                }
            })
        }

        function criarLinha(elemento) {
                var linha = "<tr>"
                linha = linha + `<td>${elemento.curso}</td>`
                linha = linha + `<td>${elemento.tipo}</td>`
                linha = linha + `<td>${elemento.nome}</td>`
                linha = linha + `<td>${elemento.telefone}</td>`
                linha = linha + `<td>${elemento.telemovel}</td>`
                linha = linha + `<td>${elemento.email}</td>`
                linha = linha + `<td>
                    <a href="#edit" class="edit" data-toggle="modal" onclick="editar(${elemento.id_universidade})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></a>
                    <a href="#delete" class="delete" data-toggle="modal" onclick="remover(${elemento.id_universidade})"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Delete">&#xE872;</i></a>
                <td>`
                linha = linha + '</tr>'
                
                return linha
        }

        function editar(id) {
            var url = "universidade/getUniPorId/" + id;
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function (uni) {
                    if(uni != null) {
                        url = 'universidades/editUniversidade/' + uni.id_universidade
                        $('#formEditarUniversidade').attr('action', url)
                        $('#curso').val(uni.curso)
                        $('#tipo').val(uni.tipo)
                        $('#nome').val(uni.nome)
                        $('#telefone').val(uni.telefone)
                        $('#telemovel').val(uni.telemovel)
                        $('#email').val(uni.email)  
                    }  
                },
                error: function (error) {
                    
                }
            })
        }

        function remover(id) {
            url = 'universidade/deleteUniversidade/' + id
            $('#formDeleteUniversidade').attr('action', url)
        }