<?php
function calculaLucroTotal($precoVenda, $custoProducao, $quantidadeVendida, $despesasFixas) {

 $receitaTotal = $precoVenda * $quantidadeVendida;
 
 $custoTotal = ($custoProducao * $quantidadeVendida) + $despesasFixas;
 
 $lucroTotal = $receitaTotal - $custoTotal;
   echo "Lucro total: R$" . number_format($lucroTotal, 2, ',', '.') . "\n";
}

$precoVenda = 15.00;
$custoProducao = 9.50;
$quantidadeVendida = 300;
$despesasFixas = 1200.00;

calculaLucroTotal($precoVenda, $custoProducao, $quantidadeVendida, $despesasFixas);
?>