<?php

        $salario1 = 1000;
        $salario2 = 2000;

        $salario2 = $salario1;

        $salario2++;

        $salario1 *=1.1;

        echo "salario 1 : $salario1, salario 2: $salario2";
        echo "<br>";

        if ($salario1 > $salario2){
            echo "O salario 1 é maior que o salário 2";
        }
        elseif($salario1 < $salario2){
            echo "O salario 1 é menor que o salário 2";
        } else {
            echo "Os valores são iguais";
        }
        echo "<br>";
        $status = array("Ótimo", "Muito Bom,","Bom");

        foreach ($status as $valor){
            echo "$valor <br>";
        }
        echo "<br>";

        $tipo = 4;

        switch ($tipo) {
            case 1:
                echo "O tipo é 1 - Ótimo";
                break;
            case 2:
                echo "O tipo é 2 - Muito Bom";
                break;
            case 3:
                echo "O tipo é 3 - Bom";
                break;
                default:
                echo "O tipo ".  $tipo  . " não é bom";
        }

        ?>