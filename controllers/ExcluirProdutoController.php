<?php
include '../config/config.php';


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cod'])) {
    $codProduto = $_GET['cod'];
    var_dump($codProduto);
    // Excluir o produto do banco de dados
    $sqlDelete = "DELETE FROM produto WHERE cod = $codProduto";
    $resultDelete = mysqli_query($conn, $sqlDelete);
    
}else {
    header('Location: ../views/index/index.php');
    exit();
}