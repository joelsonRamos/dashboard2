    <?php 
    include('../../config/session.php');
    include('../../config/config.php');
    ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('../common/head.php') ?>
</head>

<body>
    <div class="wrapper">

        <?php include('../common/sidebar.php');?>

        <div class="main">
            <?php include('../common/navigation.php') ?>

            <main class="content">

                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Novo Produto</h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="/dashboard/controllers/CadastroProdutoController.php">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Nome do produto</label>
                                            <input type="text" name="nome_produto" class="form-control"
                                                placeholder="nome produto" required>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Descrição</label>
                                            <input type="text" name="descricao" class="form-control"
                                                placeholder="descrição" required>

                                        </div>
                                        <div class="col-6 mt-4">
                                            <button type="submit" name="salvar_produto"
                                                class="btn btn-sm btn-primary">Salvar
                                                Produto</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Produto Cadastrado</h5>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">descrição</th>
                                            <th scope="col">Acões</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM produto";
                                        $result = mysqli_query($conn, $sql);
                                    //    Itera sobre os resultados da consulta
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<th scope='row'>" . $row['cod'] . "</th>";
                                            echo "<td>" . $row['nome_produto'] . "</td>";
                                            echo "<td>" . $row['descricao'] . "</td>";
                                            echo "<td><a href='javascript:void(0);' onclick='abrirModalEditar(" . $row['cod'] . ", \"" . $row['nome_produto'] . "\", \"" . $row['descricao'] . "\");'><i class=\"align-middle\" data-feather=\"edit\"></i></a> | <a href='javascript:void(0);' onclick='confirmarExclusao(" . $row['cod'] . ");'><i class=\"align-middle\" data-feather=\"trash\"></i></a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include('../common/footer.php') ?>
        </div>
    </div>
    <div class="modal" id="editarProdutoModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Editar Produto</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Formulário de edição de produto -->
                    <form id="editarProdutoForm" method="post" action="/dashboard/controllers/EditarProdutoController.php">
                        <div class="form-group">
                            <label for="editNomeProduto">Nome do Produto:</label>
                            <input type="text" class="form-control" id="editNomeProduto" name="editNomeProduto"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="editDescricao">Descrição:</label>
                            <textarea class="form-control" id="editDescricao" name="editDescricao" required></textarea>
                        </div>
                        <input type="hidden" id="editCodProduto" name="editCodProduto">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/acao.js"></script>
    
</body>

</html>