<?php
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editCodProduto'])) {
    // Obter os dados do formulário de edição
    $codProduto = $_POST['editCodProduto'];
    $novoNomeProduto = $_POST['editNomeProduto'];
    $novaDescricao = $_POST['editDescricao'];

    // Atualizar os dados no banco de dados
    $sqlUpdate = "UPDATE produto SET nome_produto = '$novoNomeProduto', descricao = '$novaDescricao' WHERE cod = $codProduto";
    $resultUpdate = mysqli_query($conn, $sqlUpdate);

    if ($resultUpdate) {
        // Redirecionar para a página de listagem de produtos após a edição
        header('Location: ../views/index/index.php');
        exit();
    } else {
        // Exibir mensagem de erro ou redirecionar para uma página de erro
        echo 'Erro ao editar o produto. Por favor, tente novamente.';
    }
} else {
    // Se o formulário não foi submetido corretamente, redirecionar para a página principal ou exibir uma mensagem de erro
    header('Location: ../views/index/index.php');
    exit();
}