<?php
session_start();

if (!isset($_POST['campo_login']) || !isset($_POST['campo_senha'])) {
    echo "Nenhum login enviado.<br>";
    echo '<a href="01_login.php">Voltar ao login</a>';
    exit;
}

$_SESSION['usuario'] = $_POST['campo_login'];
$_SESSION['senha'] = $_POST['campo_senha'];
$_SESSION['inicio_sessao'] = date("d/m/Y H:i:s");
$_SESSION['ultima_requisicao'] = time();

header("Location: 03_session_continua.php");
exit;
