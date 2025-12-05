<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "Sessão não iniciada!<br>";
    echo '<a href="login.php">Voltar ao login</a>';
    exit;
}

$_SESSION['ultima'] = time();

$tempo = $_SESSION['ultima'] - $_SESSION['inicio'];
?>

<h2>Painel do Usuário</h2>

<p>Usuário: <?php echo $_SESSION['usuario']; ?></p>
<p>Inicio da sessão: <?php echo date("d/m/Y H:i:s", $_SESSION['inicio']); ?></p>
<p>Última requisição: <?php echo date("d/m/Y H:i:s", $_SESSION['ultima']); ?></p>
<p>Tempo de sessão: <?php echo $tempo; ?> segundos</p>

<br>
<a href="login.php">Voltar</a>
