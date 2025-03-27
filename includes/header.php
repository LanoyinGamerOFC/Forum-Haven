<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum Minecraft</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <header>
        <!-- Logo -->
        <img src="/assets/images/logo.png" alt="Logo do Fórum" class="logo">

        <!-- Menu Hambúrguer -->
        <div class="menu-toggle" id="menuToggle">
            <img src="/assets/images/menu-icon.png" alt="Abrir Menu" class="menu-icon" id="menuIcon">
            <img src="/assets/images/close-icon.png" alt="Fechar Menu" class="close-icon" id="closeIcon">
        </div>

        <!-- Navegação -->
        <nav id="navMenu">
            <a href="/pages/index.php">Início</a>
            <a href="/pages/forum.php">Fórum</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/pages/profile.php">Perfil</a>
                <a href="/pages/logout.php">Sair</a>
            <?php else: ?>
                <a href="/pages/login.php">Login</a>
                <a href="/pages/register.php">Registrar</a>
            <?php endif; ?>
        </nav>
    </header>