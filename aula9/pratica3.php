<?php 

    define("notas", array(10, 7, 6, 8, 5));
    define("faltas", array(0, 1, 0, 0, 0, 0));

    function calculaMedia() {
        $somaNotas = 0;
        for($i = 0; $i < count(notas); $i++) {
            $somaNotas += notas[$i];
        }
        $media = $somaNotas / $i;
        return $media; 
    }

    function calculaFrequencia() {
        $somaFaltas = 0;
        for($i = 0; $i < count(faltas); $i++) {
            $somaFaltas += faltas[$i];
        }
        $frequencia = 100 - (($somaFaltas * 100) / $i);
        return $frequencia;
    }

    function getResultNotas($media) {
        if($media > 7) {
            return "Aprovado Notas";
        }
        return "Reprovado Notas";
    }

    function getResultFrequencia($frequencia) {
        if($frequencia > 70) {
            return "Aprovado Freq";
        }
        return "Reprovado Freq";
    }

    echo "Resultado: " . getResultNotas(calculaMedia()) . " - " . getResultFrequencia(calculaFrequencia());
?>