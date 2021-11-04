<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searching Pokemon</title>
    <link rel="stylesheet" href="../style/searchPokemon.css">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="card">
        <div class="card-header bg-secondary">
            <a class="text-light" style="text-decoration: none;">
                <img src="../media/Pokedex.png" width="50px" height="50px">
                Pokemon
            </a>
        </div>

        <div class="card-body">
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <form>
                <!-- Section 1 -->
                <div class="row">
                    <label for="pokemonNumber" class="col-sm-3 col-form-label">Número</label>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="pokemonNumber" name="pokemonNumber" maxlength="3" autofocus>
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
                        <input type="text" class="form-control" id="pokemonName" name="pokemonName">
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
                <div class="row pt-2">
                    <label for="types" class="col-sm-3 col-form-label">
                        Tipo
                    </label>
                    <div class="col-sm">
                        <!-- Type1 -->
                        <input type="checkbox" class="form-check-input" id="type1" name="type" value="Planta">
                        <div class="form-check-inline">
                            <label for="type1" class="row-sm-4">
                                Planta
                            </label>
                        </div>
                        <!-- Type2 -->
                        <input type="checkbox" class="form-check-input" id="type2" name="type" value="Veneno">
                        <div class="form-check-inline">
                            <label for="type2" class="row-sm-4">
                                Veneno
                            </label>
                        </div>
                        <!-- Type3 -->
                        <input type="checkbox" class="form-check-input" id="type3" name="type" value="Fuego">
                        <div class="form-check-inline">
                            <label for="type3" class="row-sm-4">
                                Fuego
                            </label>
                        </div>
                        <!-- Type4 -->
                        <input type="checkbox" class="form-check-input" id="type4" name="type" value="Volador">
                        <div class="form-check-inline">
                            <label for="type4" class="row-sm-4">
                                Volador
                            </label>
                        </div>
                        <!-- Type5 -->
                        <input type="checkbox" class="form-check-input" id="type5" name="type" value="Agua">
                        <div class="form-check-inline">
                            <label for="type5" class="row-sm-4">
                                Agua
                            </label>
                        </div>
                        <!-- Type6 -->
                        <input type="checkbox" class="form-check-input" id="type6" name="type" value="Electrico">
                        <div class="form-check-inline">
                            <label for="type6" class="row-sm-4">
                                Eléctrico
                            </label>
                        </div>
                        <!-- Type7 -->
                        <input type="checkbox" class="form-check-input" id="type7" name="type" value="Hada">
                        <div class="form-check-inline">
                            <label for="type7" class="row-sm-4">
                                Hada
                            </label>
                        </div>
                        <!-- Type8 -->
                        <input type="checkbox" class="form-check-input" id="type8" name="type" value="Bicho">
                        <div class="form-check-inline">
                            <label for="type8" class="row-sm-4">
                                Bicho
                            </label>
                        </div>
                        <!-- Type9 -->
                        <input type="checkbox" class="form-check-input" id="type9" name="type" value="Lucha">
                        <div class="form-check-inline">
                            <label for="type9" class="row-sm-4">
                                Lucha
                            </label>
                        </div>
                        <!-- Type10 -->
                        <input type="checkbox" class="form-check-input" id="type10" name="type" value="Psiquico">
                        <div class="form-check-inline">
                            <label for="type10" class="row-sm-4">
                                Psíquico
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
                        <input type="number" class="form-control" id="height" name="height" placeholder="Altura del Pokemon" min="1">
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
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Peso del Pokemon" min="0" step="0.01"><!--  ___________________DECIMALS______________________  -->
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
                        <input type="file" id="selectFile" class="form-control" name="selectFile"><br><br>
                    </div>
                </div>
                <!-- AIR -->
                <!-- AIR -->
                <!-- AIR -->
                <!-- AIR -->
                <!-- AIR -->
                <!-- Section 9 -->
                <div class="float-right">
                    <a class="btn btn-secondary" href="pokemon_list.php">Cancelar</a>
                    <input class="btn btn-primary" type="submit" value="Aceptar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>