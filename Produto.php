<?php
include("./Class/LoginEntidade.php");
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
    <title>Produtos</title>
</head>
<body>
<?php
    if(isset($_SESSION["logado"]) ){
        include("./MenuBar/MenuBarLogado.php");
    }else{
        include("./MenuBar/MenuBarDeslogado.php");
    }
 ?>
    
</body>
</html>