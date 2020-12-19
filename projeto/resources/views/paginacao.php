<div class="clearfix">
    <div class="hint-text" id="numResultados">A mostrar <b>
        <?php echo $contagem?>
        </b> de <b>
            <?{echo $numEntidades;}?>
        </b> registos</div>
    <ul class="pagination">
        <?php
            if($numEntidades != 0) {
                $i = 1;
                $numPaginas = ceil($numEntidades / 10);
                $paginas = '<li class="page-item"><a onclick="paginaAnterior()" class="page-link">Anterior</a></li>';
                while($i <= $numPaginas && $i <= 9) {
                    if($i == $paginaAtual) {
                        $paginas = $paginas.'<li class="page-item"><a id="pag-'.$i.'" onclick="pagNum('.$i.')" class="page-link">'.$i.'</a></li>';
                    }
                    else {
                        $paginas = $paginas.'<li class="page-item"><a id="pag-'.$i.'" onclick="pagNum('.$i.')" class="page-link">'.$i.'</a></li>';
                    }
                    $i = $i + 1;
                }
                $paginas = $paginas.'<li class="page-item"><a onclick="paginaSeguinte()" class="page-link">Seguinte</a></li>';
                echo $paginas;
            }
        ?>
    </ul>
</div>