<?php
include '../config/config.php';
include '../models/UsuarioModel.php';

$usuarioModel = new UsuarioModel($conn);


// Exemplo de verificação de credenciais
$username = $_POST['username'];
$password = $_POST['password'];

$usuario = $usuarioModel->verificarCredenciais($username, $password);


if ($usuario) {
    // Credenciais válidas, redirecione para a página principal ou faça o que for necessário
    $_SESSION['username'] = $username;
    header('Location: ../views/index/index.php');
    exit();
} else {
    // Credenciais inválidas, exiba uma mensagem de erro ou redirecione para a página de login novamente
    echo 'Credenciais inválidas. Por favor, tente novamente.';
}