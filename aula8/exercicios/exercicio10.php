<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 10</title>
</head>
<body>
    <h1>Questão 10</h1>
    <?php

        require_once 'funcoes.php';
        
        $pastas = array(' ' => 
                    array("bsn" =>
                        array("3a Fase" =>
                            array("bancoDados 1",
                                "engSoft 1"),
                                "4a Fase" =>
                            array("introWeb",
                                "bancoDados 2",
                                "engSoft 2"))));

        listarPastas($pastas);
        
    ?>    
</body>
</html>