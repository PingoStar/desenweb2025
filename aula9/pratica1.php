<?php

    $notas = array(10,9,8,8,7);
    $frequencia = array(1,1,1,1,0);

     
    function calculaMediaNotas($notas) {
        $somaNotas = 0;
        for($i=0; $i < count($notas); $i++) {
            $somaNotas += $notas[$i];
        }

        $mediaNotas = $somaNotas / count($notas);

        return $mediaNotas;
    };

    function verificaRetornoStatusNotas($mediaNotas) {
        if ($mediaNotas >= 7){
            return true;
        }
        return false;
    }

    function calculaFrequencia($aulas) {
        $totalFrequencia = 0;
        for($i=0; $i < count($aulas); $i++) {
           $totalFrequencia += $aulas[$i];
        }
        
        $frequencia = ($totalFrequencia / count($aulas)) * 100;
        return $frequencia;
    }

    function verificaRetornoFrequencia($frequencia) {
        if ($frequencia >= 70) {
            return true;
        }
        return false;
    }
    
    $mediaNotas = calculaMediaNotas($notas);
    $frequencia = calculaFrequencia($frequencia);

    if(verificaRetornoFrequencia($frequencia,70)) {
        echo "Aprovado por frequência! <br>";
    } else{
        echo "Reprovado por frequência! <br>";
    }

    if(verificaRetornoStatusNotas($notas,7)) {
        echo "Aprovado por nota! <br>";
    } else{
        echo "Reprovado por nota! <br>";
    }
?>