<?php
    include('config/session.php');
    include('config/config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codProduto'])) {
        $codProduto = mysqli_real_escape_string($db, $_POST['codProduto']);

        $deleteQuery = "DELETE FROM produto WHERE cod = $codProduto";
        mysqli_query($db, $deleteQuery) or die(mysqli_error($db));

        // Responda com um sucesso adequado (pode ser um JSON, por exemplo)
        echo json_encode(['success' => true]);
        exit();
    } else {
        echo json_encode(['success' => false, 'error' => 'Código do produto não fornecido.']);
        exit();
    }
?>