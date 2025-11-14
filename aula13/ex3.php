<?php
require_once "model/Pessoa.php";
use Model\Pessoa;

$familia = [];

$familia[] = new Pessoa("Pai", "Silva", "pai@email.com", "Rio do Sul", "SC");
$familia[] = new Pessoa("Mãe", "Silva", "mae@email.com", "Rio do Sul", "SC");

$jsonArray = [];

foreach ($familia as $p) {
    $jsonArray[] = json_decode($p->toJSON(), true);
}

file_put_contents("familia.json", json_encode($jsonArray, JSON_PRETTY_PRINT));

echo "Arquivo familia.json salvo com sucesso!";
