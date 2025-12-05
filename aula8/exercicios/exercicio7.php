<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Exercício 7</title></head>
<body>
<h2>Financiamento de Mariazinha</h2>

<?php
$preco=22500;
$parcelas=60;
$valorParcela=489.65;
$totalFinanciado=$parcelas*$valorParcela;
$juros=$totalFinanciado-$preco;

echo "<p>Valor à vista: R$ ".number_format($preco,2,',','.')."</p>";
echo "<p>Total pago no financiamento: R$ ".number_format($totalFinanciado,2,',','.')."</p>";
echo "<p style='color:red'>Mariazinha pagará R$ ".number_format($juros,2,',','.')." só de juros!</p>";
?>
</body>
</html>
