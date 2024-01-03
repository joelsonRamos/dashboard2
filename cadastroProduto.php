<?php
    include('config/session.php');
    include('config/config.php');

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $nameProduto = mysqli_real_escape_string($db, $_POST['nome_produto']);
        $descricao = mysqli_real_escape_string($db, $_POST['descricao']);

        $query = "INSERT INTO produto (nome_produto, descricao) VALUES (?, ?)";
        $stmt = mysqli_prepare($db, $query);

        mysqli_stmt_bind_param($stmt, "ss", $nameProduto, $descricao);

        mysqli_stmt_execute($stmt);

        // Verifica se a inserção foi bem-sucedida
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header('location: index.php');
        } else {
            echo "Erro ao inserir produto.";
        }

        mysqli_stmt_close($stmt);
    }

?>