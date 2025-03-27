<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

$stmt = $pdo->query("SELECT * FROM topics ORDER BY created_at DESC");
$topics = $stmt->fetchAll();
?>

<?php require_once '../includes/header.php'; ?>

<h2>Tópicos do Fórum</h2>
<?php if (isLoggedIn()): ?>
    <a href="/pages/create_topic.php">Criar Novo Tópico</a>
<?php endif; ?>

<ul>
    <?php foreach ($topics as $topic): ?>
        <li>
            <a href="/pages/topic.php?id=<?php echo $topic['id']; ?>">
                <?php echo $topic['title']; ?>
            </a>
            <span>por <?php echo getUserById($topic['user_id'])['username']; ?></span>
        </li>
    <?php endforeach; ?>
</ul>

<?php require_once '../includes/footer.php'; ?>