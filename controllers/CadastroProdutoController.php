<?php

include '../config/config.php';

if (isset($_POST['salvar_produto'])) {
    // Obter dados do formulário
    $nomeProduto = $_POST['nome_produto'];
    $descricao = $_POST['descricao'];

    include '../models/ProdutoModel.php';
    $produtoModel = new ProdutoModel($conn);

    // Chamar método para cadastrar o produto no modelo
    $cadastroSucesso = $produtoModel->cadastrarProduto($nomeProduto, $descricao);

    if ($cadastroSucesso) {
        // Redirecionar para a página principal ou exibir mensagem de sucesso
        header('Location: ../views/index/index.php');
        exit();
    } else {
        // Exibir mensagem de erro (se aplicável)
        $errors[] = "Falha ao cadastrar o produto. Tente novamente.";
    }
}