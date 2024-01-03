<?php
    include('config/session.php');
    include('config/config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['cod'])) {
        $codProduto = mysqli_real_escape_string($db, $_GET['cod']);

        $query = "SELECT * FROM produto WHERE cod = $codProduto";
        $result = mysqli_query($db, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $produto = mysqli_fetch_assoc($result);
        } else {
            header('location: index.php');
            exit();
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editCodProduto'])) {
        
        $editCodProduto = mysqli_real_escape_string($db, $_POST['editCodProduto']);
        $editNomeProduto = mysqli_real_escape_string($db, $_POST['editNomeProduto']);
        $editDescricao = mysqli_real_escape_string($db, $_POST['editDescricao']);

        // Atualiza os dados do produto no banco de dados
        $updateQuery = "UPDATE produto SET nome_produto = '$editNomeProduto', descricao = '$editDescricao' WHERE cod = $editCodProduto";
        mysqli_query($db, $updateQuery) or die(mysqli_error($db));

        header('location: index.php');
        exit();
    } else {
        header('location: index.php');
        exit();
    }
?>