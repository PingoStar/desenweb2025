<?php
    require_once 'funcoes.php';

    $notas = array(4, 8, 6, 10, 5);
    $faltas = array(1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 0);

    try {
        if(verificaAprovacaoNotas($notas)) {
            mensagem("Aprovado por nota!");
        } else {
            mensagem("Reprovado por nota!");
        }

        if(verificaAprovacaoFrequencia($faltas)) {
            mensagem("Aprovado por frequencia!");
        } else {
            mensagem("Reprovado por frequencia!");
        }
    } catch(Exception $e) {
        mensagem("Erro: " . $e->getMessage());
    } finally {
        mensagem("Processamento finalizado!");
    }
    mensagem("Dados Request: " . print_r($_REQUEST));
?>