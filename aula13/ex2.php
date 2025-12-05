<?php
require_once "model/Pessoa.php";
use Model\Pessoa;

$familia = [];

$familia[] = new Pessoa("Pai", "Silva", "pai@email.com", "Rio do Sul", "SC");
$familia[] = new Pessoa("Mãe", "Silva", "mae@email.com", "Rio do Sul", "SC");
$familia[] = new Pessoa("Irmão", "Silva", "irmao@email.com", "Rio do Sul", "SC");

$saida = "";

foreach ($familia as $p) {
    $saida .= $p->getNomeCompleto() . "\n";
}

file_put_contents("familia.txt", $saida);

echo "Arquivo familia.txt salvo com sucesso!";
