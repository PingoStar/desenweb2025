<?php

        $salario1 = 1000;
        $salario2 = 2000;

        $salario2 = $salario1;

        $salario2++;

        $salario1 *=1.1;

        echo "salario 1 : $salario1, salario 2: $salario2";
        echo "<br>";
 
        for ($i = 0; $i < 100; ++$i) {
            $salario1++;
            if($i == 49) {
                break;
            }
        }

        if($salario1 < $salario2) {
            echo "valor de salário 1: $salario1";
        }
        echo "<br>";
        
        $idade = array("João" => "35", "Maria" => "37", "José" =>"43");
        foreach($idade as $chave => $valor) {
            echo "Chave=" . $chave . ', Valor=' . $valor;
            echo "<br>";
        }