<?php
require_once('../php_library/pokedex.php');
require_once('../php_library/bd.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon List</title>
    <!-- CSS LINKS -->
    <link rel="stylesheet" href="../style/index.css">
    <!-- CSS LINKS -->
    <!-- BOOTSTRAP LINKS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <!-- BOOTSTRAP LINKS -->
</head>

<body class="bodyPokemon">
    <!-- POKEMON NAVBAR MENU -->
    <header>
        <?php
        include '../php_partials/navbarMenu.php';
        ?>
    </header>
    <!-- POKEMON NAVBAR MENU -->
    <div class="container-fluid p-4">
        <?php
        if(isset($_SESSION['Error'])){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['Error'];
                unset($_SESSION['Error']);?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
            <?php
        } elseif (isset($_SESSION['Success'])){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['Success'];
                unset($_SESSION['Success']);?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        <?php
        }
        ?>
        <br>
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <div class="col d-flex align-items-stretch">
                <?php
                // if (isset($_SESSION['Pokedex'])){
                //     $pokedex = $_SESSION['Pokedex'];
                // } else {
                //     $pokedex = [];
                // }
                $pokedex = selectPokemon($connection);
                foreach ($pokedex as $pokemon) {
                ?>
                <div class="card border-secondary">
                    <img src="<?php echo $pokemon['Picture'] ?>" class="card-img-top" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $pokemon['Number'] . ' - ' . $pokemon['Name'] ?></h5>
                        <p class="card-text">
                            <?php
                            $types = selectTypesPokemon($connection, $pokemon['id']);
                            foreach ($types as $type){?>                     
                                <span class="badge bg-warning text-dark"><?php print_r($type['Name']); ?></span>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="card-footer text-end">
                        <form action="../php_controllers/pokemonController.php" method="POST">
                            <button type="submit" name="Delete" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                            <button type="submit" name="Edit" class="btn btn-outline-primary"><i class="bi bi-pencil"></i></button>
                            <input type="hidden" name="Number" value="<?php echo $pokemon['id'] ?>">
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="position-fixed text-dark position-absolute bottom-0 end-0 m-5" id="buttonAdd" style="height: 10px; width: 10px; z-index: 100">
        <a href="../php_views/pokemon_search.php" type="button" class="btn bg-warning text-dark rounded-circle">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
</body>

</html>