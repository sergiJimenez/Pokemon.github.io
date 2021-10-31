<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="js/index.js"></script>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary text-light" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="./media/Pokedex.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Pokedex
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Datos Maestros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../php_views/pokemon_list.php">Pokemons</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

</html>