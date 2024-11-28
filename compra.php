<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";   
$dbname = "compra";       


$conexao = new mysqli($servername, $username, $password, $dbname);

session_start();


$cookie_value = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : 'Cliente';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Roupas</title>
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
        .product-card .product-name {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .product-card .product-price {
            font-size: 1.1em;
            color: #007bff;
            margin-bottom: 15px;
        }
        .product-card .btn-add-to-cart {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .product-card .btn-add-to-cart:hover {
            background-color: #0056b3;
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
        <div class="row">
 
            <div class="col-md-4">
                <div class="product-card">
                    <img src="imgs/camisa1.png" alt="Camisa 1">
                    <div class="product-name">Camiseta Básica</div>
                    <div class="product-price">R$ 29,90</div>
                    <a href="destino.php?adicionar=1" class="btn-add-to-cart">Adicionar ao Carrinho</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-card">
                    <img src="imgs/camisa2.png" alt="Camisa 2">
                    <div class="product-name">Camiseta Estampada</div>
                    <div class="product-price">R$ 39,90</div>
                    <a href="destino.php?adicionar=2" class="btn-add-to-cart">Adicionar ao Carrinho</a>
                </div>
            </div>

   
            <div class="col-md-4">
                <div class="product-card">
                    <img src="imgs/camisa3.png" alt="Camisa 3">
                    <div class="product-name">Camiseta esportiva</div>
                    <div class="product-price">R$ 49,90</div>
                    <a href="destino.php?adicionar=3" class="btn-add-to-cart">Adicionar ao Carrinho</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-card">
                    <img src="imgs/calca1.png" alt="Calça 1">
                    <div class="product-name">Calça moletom</div>
                    <div class="product-price">R$ 79,90</div>
                    <a href="destino.php?adicionar=4" class="btn-add-to-cart">Adicionar ao Carrinho</a>
                </div>
            </div>

  
            <div class="col-md-4">
                <div class="product-card">
                    <img src="imgs/calca2.png" alt="Calça 2">
                    <div class="product-name">Calça jeans</div>
                    <div class="product-price">R$ 89,90</div>
                    <a href="destino.php?adicionar=5" class="btn-add-to-cart">Adicionar ao Carrinho</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB4gTxP2uFf6dFwLsmfB3F02y5EdlRJX7f8lfeXvwR7J2mL6D" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0UtCjS5l6h61+6fvVd4PaZf0leD9F9Dcx1PbsViPw5ob0PTD" crossorigin="anonymous"></script>

</body>
</html>
