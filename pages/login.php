<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar credenciais
    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        redirect('/pages/profile.php');
    } else {
        $error = "Usuário ou senha incorretos.";
    }
}
?>

<?php require_once '../includes/header.php'; ?>

<h2>Login</h2>
<?php if (isset($error)): ?>
    <div class="alert"><?php echo $error; ?></div>
<?php endif; ?>
<form method="POST">
    <label for="username">Usuário:</label>
    <input type="text" name="username" required>
    <label for="password">Senha:</label>
    <input type="password" name="password" required>
    <button type="submit">Entrar</button>
</form>

<?php require_once '../includes/footer.php'; ?>