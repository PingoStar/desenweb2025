<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Exercício 9</title></head>
<body>
<h2>Juquinha e Juros Compostos</h2>

<?php
$valor=8654;
$taxaInicial=0.02;
$parcelas=[24,36,48,60];

foreach($parcelas as $i=>$p){
  $taxa=$taxaInicial+($i*0.003);
  $montante=$valor*pow((1+$taxa),($p/12)); // juros compostos
  $valorParcela=$montante/$p;

  echo "<p>$p vezes com juros ".($taxa*100)."%: R$ ".number_format($valorParcela,2,',','.')." cada</p>";
}
?>
</body>
</html>
