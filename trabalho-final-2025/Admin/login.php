<?php
require_once __DIR__ . '/../Includes/conexao.php';
require_once __DIR__ . '/../Includes/funcoes.php';

if (is_admin_logado()) {
    header('Location: dashboard.php'); exit;
}

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $logado = tentar_logar_admin($pdo, $usuario, $senha);
    if ($logado) {
        $_SESSION['admin_usuario'] = $logado;
        header('Location: dashboard.php'); exit;
    } else {
        $msg = 'Usuário ou senha inválidos';
    }
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Login Admin</title></head><body>
<h2>Login Admin</h2>
<?php if ($msg) echo "<p style='color:red;'>$msg</p>"; ?>
<form method="post">
  <label>Usuário:<br><input name="usuario" required></label><br>
  <label>Senha:<br><input name="senha" type="password" required></label><br>
  <button>Entrar</button>
</form>
</body></html>
