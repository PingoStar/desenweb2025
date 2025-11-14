<?php 

    function calculaMediaNotas($notas) {
        $somaNotas = 0;
        for($i=0; $i < count($notas); $i++) {
            $somaNotas += $notas[$i];
        }
        $mediaNotas = $somaNotas / count($notas);
        
        return $mediaNotas; 
    }    

    function calculaFrequencia($aulas) {
        if(count($aulas) == 0) {
            throw new Exception("O array de aulas não pode estar vazio.");
        }
        $totalFrequencia = 0;
        for($i=0; $i < count($aulas); $i++) {
            $totalFrequencia += $aulas[$i];
        }
        $frequencia = ($totalFrequencia / count($aulas)) * 100;        
        return $frequencia;
    }

    function verificaRetornaStatusCriterio($valor, $criterio) {
        if($valor >= $criterio) {
            return true;
        }
        return false;
    }

    function exibeMensagem($msg) {
        echo "<div class='box_mensagem'>$msg</div>";
    }

?>