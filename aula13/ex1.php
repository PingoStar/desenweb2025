<?php
require_once "model/Pessoa.php";
use Model\Pessoa;

$eu = new Pessoa(
    "Anderson Luis",
    "Moreira",
    "anderson@gmail.com",
    "Rio do Sul",
    "SC"
);

echo "Meu nome completo é: " . $eu->getNomeCompleto();
