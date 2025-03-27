<?php
require_once 'config.php';

// Função para buscar usuário por ID
function getUserById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Função para criar um novo tópico
function createTopic($title, $content, $user_id) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO topics (title, content, user_id) VALUES (?, ?, ?)");
    return $stmt->execute([$title, $content, $user_id]);
}
?>