<!-- paginador dinamico -->
<?php
if(!function_exists("paginador_bootstrap")){
    function paginador_bootstrap($pagina, $Npaginas, $url, $labelAnterior="Previous", $labelSiguiente="Next"){
        $tabla = '<nav aria-label="Page navigation">';
        $tabla .= '<ul class="pagination justify-content-center">';

        // Botón anterior logica
        if($pagina <= 1){
            $tabla .= '<li class="page-item disabled"><a class="page-link">'.$labelAnterior.'</a></li>';
        }else{
            $tabla .= '<li class="page-item"><a class="page-link" href="'.$url.($pagina-1).'">'.$labelAnterior.'</a></li>';
        }

        // Botones numéricos
        for($i=1; $i<=$Npaginas; $i++){
            if($pagina==$i){
                $tabla .= '<li class="page-item active"><a class="page-link" href="'.$url.$i.'">'.$i.'</a></li>';
            }else{
                $tabla .= '<li class="page-item"><a class="page-link" href="'.$url.$i.'">'.$i.'</a></li>';
            }
        }

        // Botón siguiente logica
        if($pagina >= $Npaginas){
            $tabla .= '<li class="page-item disabled"><a class="page-link">'.$labelSiguiente.'</a></li>';
        }else{
            $tabla .= '<li class="page-item"><a class="page-link" href="'.$url.($pagina+1).'">'.$labelSiguiente.'</a></li>';
        }

        $tabla .= '</ul></nav>';
        return $tabla;
    }
}
