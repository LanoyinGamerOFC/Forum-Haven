<?php
// Função para exibir mensagens de alerta
function displayAlert($message, $type = 'info') {
    return "<div class='alert alert-$type'>$message</div>";
}

// Função para redirecionar o usuário
function redirect($url) {
    header("Location: $url");
    exit();
}

// Função para verificar se o usuário está logado
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}
?>