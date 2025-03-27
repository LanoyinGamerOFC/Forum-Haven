<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

if (!isLoggedIn() || !isAdmin()) {
    redirect('/pages/index.php');
}

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();
?>

<?php require_once '../includes/header.php'; ?>

<h2>Gerenciar Usuários</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td>
                <a href="/admin/edit_user.php?id=<?php echo $user['id']; ?>">Editar</a>
                <a href="/admin/delete_user.php?id=<?php echo $user['id']; ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once '../includes/footer.php'; ?>