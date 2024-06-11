<?php
include ("./Class/LoginEntidade.php");
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/MenuBar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <div class="index">
        <h1>Bem vindo!</h1>

        <p>Melhor loja de carros novos e usados !</p>
    </div>
</body>

</html>

<?php
//$montana = array(new Carros());

//$montana = $montana + array( new Carros());
//unset($montana[0]);
?>