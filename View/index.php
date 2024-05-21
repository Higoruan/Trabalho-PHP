<?php
require_once '../Model/ProdutoModel.php';

$nome = '';
$marca = '';
$descricao = '';
$preco = '';

if (isset($_POST['btn_salvar'])) {
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $objDAO = new ProdutoModel;

    $ret = $objDAO->CadastrarProduto($nome, $marca, $descricao, $preco);

}

$produtos = $objDAO->ConsultarProduto();

// $produtos = $objDAO->ConsultarProduto();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletromax</title>
    <!-- Incluindo o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Cadastro de Produto</h2>
        <form method="POST" action="index.php">
            <div class="form-group">
                <label for="nome">Nome do Produto:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca do Produto:</label>
                <input class="form-control" name="marca" id="marca" type="text">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" class="form-control" id="preco" name="preco" step="0.01" required>
            </div>
            <button name="btn_salvar" type="submit" class="btn btn-success">Cadastrar</button>
            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nome do produto</th>
                                                <th>Marca</th>
                                                <th>Descricao</th>
                                                <th>Preço</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($produtos); $i++) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $produtos[$i]['nome'] ?></td>
                                                    <td><?= $produtos[$i]['marca'] ?></td>
                                                    <td><?= $produtos[$i]['descricao'] ?></td>
                                                    <td><?= $produtos[$i]['preco'] ?></td>
                                                    <td>
                                                        <!-- <a href="alterar_produtos.php?cod=<?= $produtos[$i]['id_empresa'] ?>"><button type="submit" class="btn btn-warning btn-sm">ALTERAR</button></a> -->
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
        </form>
    </div>

    <!-- Incluindo o JavaScript do Bootstrap (opcional, mas necessário para alguns recursos do Bootstrap) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>