<?php
class RegisterModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function registerUser($username, $email, $password) {
        // Converta a senha para MD5
        $hashedPassword = md5($password);

        // Lógica para inserir um novo usuário no banco de dados
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        return $stmt->execute();
    }

    // Outros métodos necessários para o registro...
}