<?php
session_start();

if (!isset($_POST['login']) || !isset($_POST['senha'])) {
    echo "Nenhum login enviado.<br>";
    echo '<a href="login.php">Voltar</a>';
    exit;
}

$_SESSION['usuario'] = $_POST['login'];
$_SESSION['senha'] = $_POST['senha'];
$_SESSION['inicio'] = time();
$_SESSION['ultima'] = time();

header("Location: painel.php");
exit;
