<?php 
   include('config/session.php');
   include('config/config.php');

   $query = "SELECT cod, nome_produto, descricao FROM produto";
   $result = mysqli_query($db, $query); 
?>


<!DOCTYPE html>
<html lang="pt-br">

   <head>
      <?php include('common/head.php') ?>
   </head>

   <body>
      <div class="wrapper">

         <?php include('common/sidebar.php');?>

         <div class="main">
            <?php include('common/navigation.php') ?>

            <main class="content">

               <div class="row">
                  <div class="col-12 col-lg-12">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">Novo Produto</h5>
                        </div>
                        <div class="card-body">
                           <form method="post" action="cadastroProduto.php">
                              <div class="row">
                                 <div class="col-6">
                                    <label class="form-label">Nome do produto</label>
                                    <input type="text" name="nome_produto" class="form-control" placeholder="nome produto"
                                       required>
                                 </div>
                                 <div class="col-6">
                                    <label class="form-label">Descrição</label>
                                    <input type="text" name="descricao" class="form-control" placeholder="descrição"
                                       required>

                                 </div>
                                 <div class="col-6 mt-4">
                                    <button type="submit" name="salvar_produto" class="btn btn-sm btn-primary">Salvar
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
                                       // Itera sobre os resultados da consulta
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
            <?php include('common/footer.php') ?>
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
                  <form id="editarProdutoForm" method="post" action="editar_produto.php">
                     <div class="form-group">
                        <label for="editNomeProduto">Nome do Produto:</label>
                        <input type="text" class="form-control" id="editNomeProduto" name="editNomeProduto" required>
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

      <script src="assets/js/app.js"></script>

      <script>
         // Função para abrir o modal de edição com os dados do produto
         function abrirModalEditar(cod, nome, descricao) {
            document.getElementById('editCodProduto').value = cod;
            document.getElementById('editNomeProduto').value = nome;
            document.getElementById('editDescricao').value = descricao;
            $('#editarProdutoModal').modal('show');
         }

         // Manipulador de evento para o formulário de edição
         document.getElementById('editarProdutoForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Obtenha os dados do formulário
            var cod = document.getElementById('editCodProduto').value;
            var nome = document.getElementById('editNomeProduto').value;
            var descricao = document.getElementById('editDescricao').value;

            // Envie a solicitação de edição usando AJAX

            $.ajax({
               type: 'POST',
               url: 'editar_produto.php',
               data: {
                  editCodProduto: cod,
                  editNomeProduto: nome,
                  editDescricao: descricao
               },
               success: function (response) {
                  // Lide com a resposta do servidor (por exemplo, fechar o modal, recarregar a tabela, etc.)
                  $('#editarProdutoModal').modal('hide');
                  window.location.href = 'index.php';
                  // Aqui, você pode adicionar a lógica para recarregar a tabela ou fazer outras ações após a edição
               },
               error: function (error) {
                  console.error('Erro ao enviar a solicitação de edição:', error);
               }
            });
         });


         function confirmarExclusao(codProduto) {
            if (confirm('Tem certeza que deseja excluir este produto?')) {
               excluirProduto(codProduto);
            }
         }

         function excluirProduto(codProduto) {
            $.ajax({
               type: 'POST',
               url: 'excluir_produto.php',
               data: {
                  codProduto: codProduto
               },
               success: function (response) {
                  console.log('Produto excluído com sucesso.');
                  window.location.href = 'index.php';
               },
               error: function (error) {
                  console.error('Erro ao excluir produto:', error);
               }
            });
         }
      </script>
   </body>

</html>