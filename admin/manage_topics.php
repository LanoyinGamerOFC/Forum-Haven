<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

if (!isLoggedIn() || !isAdmin()) {
    redirect('/pages/index.php');
}

$stmt = $pdo->query("SELECT * FROM topics");
$topics = $stmt->fetchAll();
?>

<?php require_once '../includes/header.php'; ?>

<h2>Gerenciar Tópicos</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Criado por</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($topics as $topic): ?>
        <tr>
            <td><?php echo $topic['id']; ?></td>
            <td><?php echo $topic['title']; ?></td>
            <td><?php echo getUserById($topic['user_id'])['username']; ?></td>
            <td>
                <a href="/admin/edit_topic.php?id=<?php echo $topic['id']; ?>">Editar</a>
                <a href="/admin/delete_topic.php?id=<?php echo $topic['id']; ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once '../includes/footer.php'; ?>