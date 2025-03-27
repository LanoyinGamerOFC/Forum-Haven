<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

if (!isLoggedIn()) {
    redirect('/pages/login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    if (createTopic($title, $content, $user_id)) {
        redirect('/pages/forum.php');
    } else {
        $error = "Erro ao criar tópico. Tente novamente.";
    }
}
?>

<?php require_once '../includes/header.php'; ?>

<h2>Criar Novo Tópico</h2>
<?php if (isset($error)): ?>
    <div class="alert"><?php echo $error; ?></div>
<?php endif; ?>
<form method="POST">
    <label for="title">Título:</label>
    <input type="text" name="title" required>
    <label for="content">Conteúdo:</label>
    <textarea name="content" required></textarea>
    <button type="submit">Criar</button>
</form>

<?php require_once '../includes/footer.php'; ?>