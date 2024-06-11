<?php
include ("./Class/LoginEntidade.php");
include ("./Banco/LoginDAO.php");
session_start();
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    if (isset($_SESSION["logado"])) {
        include ("./MenuBar/MenuBarLogado.php");
    } else {
        include ("./MenuBar/MenuBarDeslogado.php");
    }
    ?>
    <br><br><br>

    <div class="telalogin">
        <div class="Cadastro">
            <h2>Cadastro de Usuário</h2>
            <form class = "form" method="post">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required><br><br>

                <label for="usuario">Usuário:</label>
                <input type="text" id="usuario" name="usuario" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required><br><br>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br><br>

                <button type="submit" name="cadastro" value="executar">Cadastrar</button>
            </form>
        </div>

        <div class="login">
            <h2>Login</h2>
            <form class = "form"  method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" required><br><br>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required><br><br>

                <button type="submit" name="login" value="verificar">Entrar</button>

            </form>
        </div>
    </div>
</body>

</html>

<?php
function Cadastrar()
{
    $loginEntidade = new LoginEntidade();
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $loginEntidade->SetLogin(0, $_POST['usuario'], $senha, $_POST['email'], $_POST['telefone'], $_POST['nome']);

    $loginDAO = new LoginDAO();
    $result = $loginDAO->Cadastrar($loginEntidade);
    if ($result) {
        echo '<script>alert("Cadastro Realizado com Sucesso!")</script>';
    }
}

function FazerLogin($usuario, $senha)
{

    $loginDAO = new LoginDAO();
    $loginEntidade = $loginDAO->VerificarLogin($usuario, $senha);
    if ($loginEntidade->getId() != 0) {
        echo '<script>alert("Bem Vindo\n' . $loginEntidade->getName() . '")</script>';
        $_SESSION["logado"] = true;
        $_SESSION["usuario"] = new LoginEntidade();
        $_SESSION["usuario"] = $loginEntidade;
        header("Location: index.php");
    } else {
        echo '<script>alert("Usuario ou senha invalidos!")</script>';
    }


}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastro']) && $_POST['cadastro'] == 'executar') {
    // Chame sua função PHP aqui
    Cadastrar();
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) && $_POST['login'] == 'verificar') {
    FazerLogin($_POST['usuario'], $_POST['senha']);
}
?>