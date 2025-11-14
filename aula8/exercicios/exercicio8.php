<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Exercício 8</title></head>
<body>
<h2>Paulinho e Juros Simples</h2>

<?php
$valor=8654;
$taxa=0.015;
$parcelas=[24,36,48,60];

foreach($parcelas as $p){
  $juros=$taxa+($parcelas[0]!=$p ? (($p-24)/12)*0.005 : 0);
  $montante=$valor*(1+($juros*$p/12)); // juros simples
  $valorParcela=$montante/$p;

  echo "<p>$p vezes com juros ".($juros*100)."%: R$ ".number_format($valorParcela,2,',','.')." cada</p>";
}
?>
</body>
</html>
