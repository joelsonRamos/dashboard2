<?php
// ProdutoModel.php
class ProdutoModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function cadastrarProduto($nomeProduto, $descricao) {
        
        $sql = "INSERT INTO produto (nome_produto, descricao) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nomeProduto, $descricao);

        $result = $stmt->execute();

        return $result;
    }
}