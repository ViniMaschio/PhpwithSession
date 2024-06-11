<?php
include ("./Class/LoginEntidade.php");
include ("./Class/CarrosEntidade.php");
include ("./Banco/CarroDAO.php");
include("./Banco/VendaDAO.php");
include("./Banco/ItensVendaDAO.php");
include("./Class/ItensVendaProdutoEntidade.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bntDeletar"])) {
    for ($i = 0; $i < count($_SESSION["carrinho"]); $i++) {
        if ($_SESSION["carrinho"][$i]->getIdCarro() == $_POST["bntDeletar"]) {
            unset($_SESSION['carrinho'][$i]);
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
            header("Location: carrinho.php");
            exit; // Encerra o script imediatamente após o redirecionamento
        }
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bntAdd"])) {
    for ($i = 0; $i < count($_SESSION["carrinho"]); $i++) {
        if ($_SESSION["carrinho"][$i]->getIdCarro() == $_POST["bntAdd"]) {
            $_SESSION['carrinho'][$i]->adicionaQuantidade(1);
            header("Location: carrinho.php");
            exit; // Encerra o script imediatamente após o redirecionamento
        }
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bntSub"])) {
    for ($i = 0; $i < count($_SESSION["carrinho"]); $i++) {
        if ($_SESSION["carrinho"][$i]->getIdCarro() == $_POST["bntSub"]) {
            if ($_SESSION["carrinho"][$i]->getQuantidade() > 0) {
                $_SESSION['carrinho'][$i]->adicionaQuantidade(-1);
                header("Location: carrinho.php");
                exit; // Encerra o script imediatamente após o redirecionamento
            }
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Comprar"])) {
    $venda = new VendaDAO();
    $idvenda = $venda->FazerVenda($_SESSION["usuario"]->getId());
    $itensvendaprodutoEntidade = new ItensVendaProdutoEntidade();
    $itensVendaProdutoDAO = new ItensVendaDAO();
    foreach ($_SESSION['carrinho'] as $carrinho) {
        $itensvendaprodutoEntidade->SetVenda($idvenda, $carrinho->getIdCarro(), $carrinho->getValor(), $carrinho->getQuantidade());
        $itensVendaProdutoDAO->FazerVenda($itensvendaprodutoEntidade);

    }
    unset($_SESSION['carrinho']);
    header("Location: carrinho.php");
    exit;

}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/carrinho.css">
    <title>Catalogo</title>
</head>

<body>
    <?php
    if (isset($_SESSION["logado"])) {
        include ("./MenuBar/MenuBarLogado.php");
    } else {
        include ("./MenuBar/MenuBarDeslogado.php");
    }
    ?>
    <br><br>
    <div class = "corpo">
        <h1>Carrinho de Compras</h1><br><br>

        <div class="ListaCompras">

            <?php
            if (isset($_SESSION["carrinho"]) && count($_SESSION["carrinho"]) > 0) {
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class = "produto">Carro</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor Unt.</th>
                            <th scope="col">Valor Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $soma = 0;
                        foreach ($_SESSION["carrinho"] as $row) {
                            $carrodao = new CarroDAO();
                            $carro = $carrodao->BuscarCarroPorId($row->getIdCarro());
                            $row->setValor($carro->getValor());
                            $soma += ($row->getQuantidade() * $carro->getValor());
                            ?>

                            <div class="carros">

                                <tr>
                                    <form action="" method="post">
                                        <th scope="row"><?php echo $i; ?></th>
                                        <th class = "produto">
                                            <?php echo $carro->getNomeCarro(); ?>
                                        </th>
                                        <th>

                                            <button name="bntSub" value="<?php echo $carro->getIdCarro(); ?>">-</button>

                                            <?php echo $row->getQuantidade(); ?>

                                            <button name="bntAdd" value="<?php echo $carro->getIdCarro(); ?>">+</button>

                                        </th>
                                        <th>
                                            <?php echo $carro->getValor(); ?>
                                        </th>
                                        <th>
                                            <?php echo ($row->getQuantidade() * $carro->getValor()); ?>
                                        </th>
                                        <th>

                                            <button name="bntDeletar"
                                                value="<?php echo $carro->getIdCarro(); ?>">Apagar</button>

                                        </th>
                                    </form>
                                </tr>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                        <tr>
                            <th colspan="4"></th>
                            <th colspan="2"><?php echo $soma ?></th>

                            </th>
                        </tr>
                    </tbody>
                </table>
                <form action="" method="post">
                    <button name="Comprar" type="submit">Comprar</button>
                </form>
                <?php
            } else {
                echo '<h2>Não tem itens no Carrinho</h2>';
            }
            ?>
        </div>
    </div>
</body>

</html>