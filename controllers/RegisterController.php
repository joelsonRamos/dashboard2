<?php
include '../config/config.php';
include '../models/RegisterModal.php';

$registerModel = new RegisterModel($conn);

if (isset($_POST['reg_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    if ($password_1 != $password_2) {
        // Senhas não coincidem, adicione uma mensagem de erro
        $errors[] = "As senhas não coincidem. Tente novamente.";
    } else {
        // Chame o método do modelo para registrar o usuário
        if ($registerModel->registerUser($username, $email, $password_1)) {
            $_SESSION['success'] = "Registro bem-sucedido!";
            header('Location: index.php');
            exit();
        } else {
            $errors[] = "Falha no registro. Tente novamente.";
        }
    }
}