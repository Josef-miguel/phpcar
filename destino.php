<?php
session_start();


$cookie_value = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : 'Cliente';


$produtos = [
    1 => ['nome' => 'Camiseta Básica', 'preco' => 29.90, 'imagem' => 'imgs/camisa1.png'],
    2 => ['nome' => 'Camiseta Estampada', 'preco' => 39.90, 'imagem' => 'imgs/camisa2.png'],
    3 => ['nome' => 'Camiseta Premium', 'preco' => 49.90, 'imagem' => 'imgs/camisa3.png'],
    4 => ['nome' => 'Calça Jeans Clássica', 'preco' => 79.90, 'imagem' => 'imgs/calca1.png'],
    5 => ['nome' => 'Calça Skinny', 'preco' => 89.90, 'imagem' => 'imgs/calca2.png'],
];


if (isset($_GET['adicionar'])) {
    $idProduto = (int)$_GET['adicionar'];
    if (isset($produtos[$idProduto])) {
        if (!isset($_SESSION['carrinho'][$idProduto])) {
            $_SESSION['carrinho'][$idProduto] = [
                'nome' => $produtos[$idProduto]['nome'],
                'preco' => $produtos[$idProduto]['preco'],
                'quantidade' => 1
            ];
        } else {
            $_SESSION['carrinho'][$idProduto]['quantidade']++;
        }
    }
}


if (isset($_GET['finalizar'])) {
    if (!empty($_SESSION['carrinho'])) {

        $total = array_sum(array_map(function($item) {
            return $item['preco'] * $item['quantidade'];
        }, $_SESSION['carrinho']));

 
        unset($_SESSION['carrinho']);
        echo "<div class='alert alert-success'>Compra realizada com sucesso! Total: R$ ".number_format($total, 2, ',', '.')."</div>";
    } else {
        echo "<div class='alert alert-danger'>Seu carrinho está vazio.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
            margin-bottom: 20px;
        }
        .product-card img {
            max-width: 100%;
            height: auto;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Loja de Roupas</a>
            <span class="navbar-text">
                Seja bem-vindo, <?= $cookie_value ?>!
            </span>
        </div>
    </nav>

    <div class="container">
        <h2>Carrinho de Compras</h2>
        <div class="row">
            <?php
            if (!empty($_SESSION['carrinho'])):
                foreach ($_SESSION['carrinho'] as $id => $item):
            ?>
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="<?= $produtos[$id]['imagem'] ?>" alt="<?= $item['nome'] ?>">
                        <div class="product-name"><?= $item['nome'] ?></div>
                        <div class="product-price">R$ <?= number_format($item['preco'], 2, ',', '.') ?></div>
                        <div class="product-quantity">Quantidade: <?= $item['quantidade'] ?></div>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>

        <a href="destino.php?finalizar=true" class="btn btn-success">Finalizar Compra</a>

        <a href="compra.php" class="btn btn-primary">Voltar para a Loja</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB4gTxP2uFf6dFwLsmfB3F02y5EdlRJX7f8lfeXvwR7J2mL6D" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0UtCjS5l6h61+6fvVd4PaZf0leD9F9Dcx1PbsViPw5ob0PTD" crossorigin="anonymous"></script>
</body>
</html>
