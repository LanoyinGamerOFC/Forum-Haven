<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

if (!isLoggedIn() || !isAdmin()) {
    redirect('/pages/index.php');
}
?>

<?php require_once '../includes/header.php'; ?>

<h2>Painel de Administração</h2>
<ul>
    <li><a href="/admin/manage_users.php">Gerenciar Usuários</a></li>
    <li><a href="/admin/manage_topics.php">Gerenciar Tópicos</a></li>
</ul>

<?php require_once '../includes/footer.php'; ?>