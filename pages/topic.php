<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

if (!isset($_GET['id'])) {
    redirect('/pages/forum.php');
}

$topic_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM topics WHERE id = ?");
$stmt->execute([$topic_id]);
$topic = $stmt->fetch();

if (!$topic) {
    redirect('/pages/forum.php');
}

$stmt = $pdo->prepare("SELECT * FROM posts WHERE topic_id = ? ORDER BY created_at ASC");
$stmt->execute([$topic_id]);
$posts = $stmt->fetchAll();
?>

<?php require_once '../includes/header.php'; ?>

<h2><?php echo $topic['title']; ?></h2>
<p><?php echo $topic['content']; ?></p>

<h3>Respostas</h3>
<?php if (isLoggedIn()): ?>
    <form method="POST" action="/includes/create_post.php">
        <textarea name="content" required></textarea>
        <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
        <button type="submit">Responder</button>
    </form>
<?php endif; ?>

<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <p><?php echo $post['content']; ?></p>
            <span>por <?php echo getUserById($post['user_id'])['username']; ?></span>
        </li>
    <?php endforeach; ?>
</ul>

<?php require_once '../includes/footer.php'; ?>