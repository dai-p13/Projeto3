var urlPagSeguinte = ""
var urlPagAnterior = ""
var urlPagNum = "";
var pagAtual = 0
var totalUsers = 0

function atualizaNumsPagina(aumentar, numPagina, novaPag, pagAnterior) {
    var i = 1;
    var qtd = 1;
    if (aumentar) {
        if(numPagina > 0 && numPagina < 5) {
            while (i <= 9) {
                var idPag = `pag-${i}`
                var novaAcao = `pagNum(${i})`
                document.getElementById(idPag).innerHTML = i;
                document.getElementById(idPag).setAttribute("onClick", novaAcao);
                i++;
            }  
        }
        else {
            if(numPagina != null) {
                qtd = numPagina - parseInt(document.getElementById('pag-5').innerHTML)
            }
            while (i <= 9) {
                var idPag = `pag-${i}`
                var pagConteudo = document.getElementById(idPag).innerHTML;
                var novaAcao = `pagNum(${parseInt(pagConteudo) + qtd})`
                document.getElementById(idPag).innerHTML = parseInt(pagConteudo) + qtd;
                document.getElementById(idPag).setAttribute("onClick", novaAcao);
                i++;
            }    
        }   
    }
    else {
        if(parseInt(document.getElementById('pag-1').innerHTML) > 1) {
            if(numPagina > 0 && numPagina < 5) {
                while (i <= 9) {
                    var idPag = `pag-${i}`
                    var novaAcao = `pagNum(${i})`
                    document.getElementById(idPag).innerHTML = i;
                    document.getElementById(idPag).setAttribute("onClick", novaAcao);
                    i++;
                }  
            }
            else {
                if(numPagina != null) {
                    qtd = parseInt(document.getElementById('pag-5').innerHTML) - numPagina
                }
                while (i <= 9) {
                    var idPag = `pag-${i}`
                    var pagConteudo = document.getElementById(idPag).innerHTML;
                    var novaAcao = `pagNum(${parseInt(pagConteudo) - qtd})`
                    document.getElementById(idPag).innerHTML = parseInt(pagConteudo) - qtd;
                    document.getElementById(idPag).setAttribute("onClick", novaAcao);
                    i++;
                }     
            }   
        } 
    }
    atualizaPagAtiva(novaPag, pagAnterior)
}

function atualizaPagAtiva(novaPag, pagAnterior) {
    var i = 1
    while(i <= 9) {
        console.log("Índice BRANCO = " + i);
        let idPag = `pag-${i}`
        let num = parseInt(document.getElementById(idPag).innerHTML)
        if(num == pagAnterior) {
            console.log("PAG ANTERIOR " + pagAnterior + " = white");
            $(`#${idPag}`).css('background-color', 'white');
        }
        i++
    }
    i = 1
    while (i <= 9) {
        console.log("Índice GREY = " + i);
        let idPag = `pag-${i}`
        let num = parseInt(document.getElementById(idPag).innerHTML)
        if(num == novaPag) {
            console.log("NOVA PAG " + novaPag + " = grey");
            $(`#${idPag}`).css('background-color', 'lightgrey');
        }
        i++
    }
}

function paginaAnterior() {
    if((pagAtual - 1) > 0) {
        $.ajax({
            url: urlPagAnterior,
            method: "GET",
            dataType: "json",
            success: function (users) {
                if (users.data != null) {
                    $("#tableBody").empty();
                    for (user of users.data) {
                        var linha = criarLinha(user)
                        $("#tableBody").append(linha);
                    }
                }
                let pAtual = pagAtual
                pagAtual = users.current_page
                urlPagSeguinte = users.next_page_url
                urlPagAnterior = users.prev_page_url
                var msg = "A mostrar <b>" + users.to + "</b> de <b>" + totalUsers + "</b> resultados."
                document.getElementById("numResultados").innerHTML = msg;
                atualizaNumsPagina(false, null, users.current_page, pAtual)
            },
            error: function (error) {
            }
        })    
    }
}

function paginaSeguinte() {
    $.ajax({
        url: urlPagSeguinte,
        method: "GET",
        dataType: "json",
        success: function (users) {
            if (users.data != null) {
                $("#tableBody").empty();
                for (user of users.data) {
                    var linha = criarLinha(user)
                    $("#tableBody").append(linha);
                }
            }
            let pAtual = pagAtual
            pagAtual = users.current_page
            urlPagSeguinte = users.next_page_url
            urlPagAnterior = users.prev_page_url
            var msg = "A mostrar <b>" + users.to + "</b> de <b>" + totalUsers + "</b> resultados."
            document.getElementById("numResultados").innerHTML = msg;
            atualizaNumsPagina(true, null, users.current_page, pAtual)
        },
        error: function (error) {
        }
    })
}

function pagNum(numPagina) {
    urlPag = urlPagNum + "?page=" + numPagina
    $.ajax({
        url: urlPag,
        method: "GET",
        dataType: "json",
        success: function (users) {
            if (users.data != null) {
                $("#tableBody").empty();
                for (user of users.data) {
                    var linha = criarLinha(user)
                    $("#tableBody").append(linha);
                }
            }
            let pAtual = pagAtual
            urlPagSeguinte = users.next_page_url
            urlPagAnterior = users.prev_page_url
            var msg = "A mostrar <b>" + users.to + "</b> de <b>" + totalUsers + "</b> resultados."
            document.getElementById("numResultados").innerHTML = msg;
            if(pagAtual > users.current_page) {
                atualizaNumsPagina(false, numPagina, users.current_page, pAtual)
            }
            else {
                atualizaNumsPagina(true, numPagina, users.current_page, pAtual)
            }
            pagAtual = users.current_page
        },
        error: function (error) {
        }
    })
}