<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    // Inserir novo usuário
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $password, $email])) {
        redirect('/pages/login.php');
    } else {
        $error = "Erro ao registrar. Tente novamente.";
    }
}
?>

<?php require_once '../includes/header.php'; ?>

<h2>Registrar</h2>
<?php if (isset($error)): ?>
    <div class="alert"><?php echo $error; ?></div>
<?php endif; ?>
<form method="POST">
    <label for="username">Usuário:</label>
    <input type="text" name="username" required>
    <label for="email">E-mail:</label>
    <input type="email" name="email" required>
    <label for="password">Senha:</label>
    <input type="password" name="password" required>
    <button type="submit">Registrar</button>
</form>

<?php require_once '../includes/footer.php'; ?>