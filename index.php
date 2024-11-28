<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Criptografia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="login-container">
        <h1>Login</h1>
        

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            $validuser = 'ds';

            $usuario = $_POST["user_campo"] ?? '';
            $senha = $_POST["senha_campo"] ?? '';

            if (empty($usuario) || empty($senha)) {
                echo "<div class='alert alert-danger'>Digite um usuário e senha válidos.</div>";
            } else {
                $criptografia = md5($senha); 
                $checkcripto = md5($senha); 

                if ($criptografia === $checkcripto && $validuser === $usuario) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $validuser;
                    header("Location: compra.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Senha inválida.</div>";
                }
            }
        }
        ?>


        <form action="" method="post">
            <div class="form-group">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="user_campo" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha_campo" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Entrar">
            </div>
        </form>

        <div class="forgot-password">
            <a href="#">Esqueceu sua senha?</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB4gTxP2uFf6dFwLsmfB3F02y5EdlRJX7f8lfeXvwR7J2mL6D" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0UtCjS5l6h61+6fvVd4PaZf0leD9F9Dcx1PbsViPw5ob0PTD" crossorigin="anonymous"></script>
</body>
</html>
