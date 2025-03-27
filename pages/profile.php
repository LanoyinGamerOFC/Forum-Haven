<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

if (!isLoggedIn()) {
    redirect('/pages/login.php');
}

$user = getUserById($_SESSION['user_id']);
?>

<?php require_once '../includes/header.php'; ?>

<h2>Perfil de <?php echo $user['username']; ?></h2>
<p>E-mail: <?php echo $user['email']; ?></p>
<a href="/pages/logout.php">Sair</a>

<?php require_once '../includes/footer.php'; ?>