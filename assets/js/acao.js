// Função para abrir o modal de edição com os dados do produto
function abrirModalEditar(cod, nome, descricao) {
    document.getElementById('editCodProduto').value = cod;
    document.getElementById('editNomeProduto').value = nome;
    document.getElementById('editDescricao').value = descricao;
    $('#editarProdutoModal').modal('show');
}


function confirmarExclusao(codProduto) {
    if (confirm('Tem certeza que deseja excluir este produto?')) {
        excluirProduto(codProduto);
    }
}

function excluirProduto(codProduto) {
    $.ajax({
        type: 'GET',
        url: '/dashboard/controllers/ExcluirProdutoController.php',
        data: {
            cod: codProduto
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