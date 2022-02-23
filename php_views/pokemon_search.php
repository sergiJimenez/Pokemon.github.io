<?php
session_start();
require_once('../php_library/pokedex.php');
if (isset($_SESSION['pokemon_search'])){
    $pokemonSearch = $_SESSION['pokemon_search'];
    unset($_SESSION['pokemon_search']);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Search</title>
    <!-- BOOTSTRAP LINKS -->
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <!-- BOOTSTRAP LINKS -->
</head>

<body>
    <!-- POKEMON NAVBAR MENU -->
    <header>
    <?php
    require_once '../php_partials/navbarMenu.php';
    ?>
    </header>
    <!-- POKEMON NAVBAR MENU -->
    <div class="container-fluid p-4">
        <?php
        if (isset($_SESSION['Error'])){?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['Error'];
            unset($_SESSION['Error']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    } elseif (isset($_SESSION['Message'])){?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['Error'];
            unset($_SESSION['Error']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php  
    }
    ?>
        <div class="card">
            <div class="card-header bg-secondary">
                <a class="text-light" style="text-decoration: none;">
                    <img src="../media/Pokeball.png" width="50px" height="50px">
                    Pokemon
                </a>
            </div>
            <div class="card-body">
                <!-- AIR -->
                <!-- AIR -->
                <!-- AIR -->
                <!-- AIR -->
                <!-- AIR -->
                <form action="../php_controllers/pokemonController.php" method="POST" enctype="multipart/form-data">
                    <!-- Section 1 -->
                    <div class="row">
                        <label for="pokemonNumber" class="col-sm-3 col-form-label">Número</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="number" name="number" maxlength="3" autofocus>
                        </div>
                    </div>
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- Section 2 -->
                    <div class="row pt-2">
                        <label for="pokemonName" class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- Section 3 -->
                    <div class="row pt-2">
                        <label for="region" class="col-sm-3 col-form-label">Región</label>
                        <div class="col-sm">
                            <select id="region" name="region" class="form-select">
                                <!-- Region 1 -->
                                <option value="Kanto">Kanto</option>
                                <!-- Region 2 -->
                                <option value="Jotho">Jotho</option>
                                <!-- Region 3 -->
                                <option value="Hoenn">Hoenn</option>
                                <!-- Region 4 -->
                                <option value="Sinnoh">Sinnoh</option>
                                <!-- Region 5 -->
                                <option value="Teselia">Teselia</option>
                            </select>
                        </div>
                    </div>
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- Section 4 -->
                    <div class="form-group row pt-2">
                        <label for="types" class="col-sm-3 col-form-label">
                            Tipo
                        </label>
                        <div class="col-sm-7">
                            <!-- Type1 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Planta">
                                <label for="type1" class="row-sm-4">
                                    Planta
                                </label>
                            </div>
                            <!-- Type2 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Veneno">
                                <label for="type2" class="row-sm-4">
                                    Veneno
                                </label>
                            </div>
                            <!-- Type3 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Fuego">
                                <label for="type3" class="row-sm-4">
                                    Fuego
                                </label>
                            </div>
                            <!-- Type4 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Volador">
                                <label for="type4" class="row-sm-4">
                                    Volador
                                </label>
                            </div>
                            <!-- Type5 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Agua">
                                <label for="type5" class="row-sm-4">
                                    Agua
                                </label>
                            </div>
                            <!-- Type6 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Electrico">
                                <label for="type6" class="row-sm-4">
                                    Eléctrico
                                </label>
                            </div>
                            <!-- Type7 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Hada">
                                <label for="type7" class="row-sm-4">
                                    Hada
                                </label>
                            </div>
                            <!-- Type8 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Bicho">
                                <label for="type8" class="row-sm-4">
                                    Bicho
                                </label>
                            </div>
                            <!-- Type9 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Lucha">
                                <label for="type9" class="row-sm-4">
                                    Lucha
                                </label>
                            </div>
                            <!-- Type10 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Psiquico">
                                <label for="type10" class="row-sm-4">
                                    Psíquico
                                </label>
                            </div>
                            <!-- Type11 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Fantasma">
                                <label for="type11" class="row-sm-4">
                                    Fantasma
                                </label>
                            </div>
                            <!-- Type12 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Siniestro">
                                <label for="type12" class="row-sm-4">
                                    Siniestro
                                </label>
                            </div>
                            <!-- Type13 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Hielo">
                                <label for="type13" class="row-sm-4">
                                    Hielo
                                </label>
                            </div>
                            <!-- Type14 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Roca">
                                <label for="type14" class="row-sm-4">
                                    Roca
                                </label>
                            </div>
                            <!-- Type15 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Tierra">
                                <label for="type15" class="row-sm-4">
                                    Tierra
                                </label>
                            </div>
                            <!-- Type16 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Acero">
                                <label for="type16" class="row-sm-4">
                                    Acero
                                </label>
                            </div>
                            <!-- Type17 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Normal">
                                <label for="type17" class="row-sm-4">
                                    Normal
                                </label>
                            </div>
                            <!-- Type18 -->
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" id="type[]" name="type" value="Dragon">
                                <label for="type18" class="row-sm-4">
                                    Dragon
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- Section 5 -->
                    <div class="row pt-2">
                        <label for="height" class="col-sm-3 col-form-label">Altura</label>
                        <div class="input-group col-sm">
                            <input type="number" class="form-control" id="height" name="height" min="1">
                            <span class="input-group-text" id="addon-wrapping">cm</span>
                        </div>
                    </div>
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- Section 6 -->
                    <div class="row pt-2">
                        <label for="weight" class="col-sm-3 col-form-label">Peso</label>
                        <div class="input-group col-sm">
                            <input type="number" class="form-control" id="weight" name="weight" min="0" step="0.01"><!--  ___________________DECIMALS______________________  -->
                            <span class="input-group-text" id="addon-wrapping">kg</span>
                        </div>
                    </div>
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- Section 7 -->
                    <div class="row pt-2">
                        <label for=" evolution" class="col-sm-3 col-form-label">Evolución</label>
                        <div class="col-sm">
                            <!-- Option1 -->
                            <div class="form-check form-check-inline">
                                <input type="radio" id="withoutEvolution" class="form-check-input" name="radioSelector" value="withoutEvolution">
                                <label class="form-check-label" for="withoutEvolution">Sin Evolucionar</label>
                            </div>
                            <!-- Option2 -->
                            <div class="form-check form-check-inline">
                                <input type="radio" id="firstEvolution" class="form-check-input" name="radioSelector" value="firstEvolution">
                                <label class="form-check-label" for="firstEvolution">Primera Evolución</label>
                            </div>
                            <!-- Option3 -->
                            <div class="form-check form-check-inline">
                                <input type="radio" id="othersEvolution" class="form-check-input" name="radioSelector" value="othersEvolution">
                                <label class="form-check-label" for="othersEvolution">Otras Evoluciones</label>
                            </div>
                        </div>
                    </div>
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- Section 8 -->
                    <div class="row pt-2">
                        <label for="image" class="col-sm-3 col-form-label">Imagen</label>
                        <div class="col-sm">
                            <div class="custom-flie">
                                <input type="file" id="selectFile" class="form-control" name="selectFile"><br><br>
                            </div>
                        </div>
                    </div>
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- AIR -->
                    <!-- Section 9 -->
                    <div class="container">
                        <div class="d-flex flex-row-reverse">
                            <button class="btn btn-primary" type="submit" name="Add">Aceptar</button>
                            <a class="btn btn-secondary" href="pokemon_list.php" name="Cancel">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>