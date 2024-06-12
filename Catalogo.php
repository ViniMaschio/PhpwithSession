<?php
include ("./Class/LoginEntidade.php");
include ("./Class/CarrosEntidade.php");
include ("./Banco/CarroDAO.php");
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/catalogo.css">
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
    <div class="menu">
        <div>
            <h2>Catalogo de Carros</h2><br><br>
        </div>
        <div class="Catalogo">
            <?php

            $listCarros = BuscarTodosCarros();

            foreach ($listCarros as $car) {
                ?>
                <div class="carro">
                    
                    <div class="imgcarro">
                        <img src="./imgProduto/<?php echo $car->getImg(); ?>" alt="Carro">
                    </div>
                    <div class="nomecarro">
                        <h2><?php echo $car->getNomeCarro(); ?> </h2>
                    </div>
                    <p>Preço: R$ <?php echo $car->getValor(); ?> </p>

                    <form method="post">
                        <button type="submit" name="bnt-comprar" value="<?php echo $car->getIdCarro(); ?>">Comprar</button>
                    </form>

                </div>
                <?php
            }

            ?>
        </div>
    </div>

</body>

</html>

<?php

function BuscarTodosCarros(): array
{

    $carroDAO = new CarroDAO();

    return $carroDAO->BuscarTodosCarros();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bnt-comprar"])) {
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
        $carro = new CarrosEntidade();
        $carro->setId($_POST["bnt-comprar"]);
        $carro->setQuantidade(1);
        $_SESSION['carrinho'][] = $carro;
    } else {
        $cont = count($_SESSION['carrinho']);
        $achou = false;

        for ($i = 0; $i < $cont; $i++) {
            if ($_SESSION['carrinho'][$i]->getIdCarro() == $_POST["bnt-comprar"]) {
                $achou = true;
                $_SESSION['carrinho'][$i]->adicionaQuantidade(1);
            }
        }
        if (!$achou) {
            $carro = new CarrosEntidade();
            $carro->setId($_POST["bnt-comprar"]);
            $carro->setQuantidade(1);
            $_SESSION['carrinho'][] = $carro;
        }
    }

}

?>