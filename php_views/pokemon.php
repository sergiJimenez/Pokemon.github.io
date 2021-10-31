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
        <!-- AIR -->
        <!-- AIR -->
        <!-- AIR -->
        <!-- AIR -->
        <!-- AIR -->
        <form style="padding-left: 20px; padding-top: 20px">
            <div class="container-fluid">
                <div class="row">
                    <!-- Section 1 -->
                    <div class="row">
                        <label for="pokemonNumber" class="col-sm-2 col-form-label">Numero</label>
                        <div class="col-sm" style="padding-right: 30px;">
                            <input type="text" class="form-control" id="pokemonNumber" name="pokemonNumber" maxlength="3" autofocus><br><br>
                        </div>
                    </div>
                </div>
                <!-- AIR -->
                <!-- AIR -->
                <!-- AIR -->
                <!-- AIR -->
                <!-- AIR -->
                <!-- Section 2 -->
                <div class="row">
                    <label for="pokemonName" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm" style="padding-right: 30px;">
                        <input type="text" class="form-control" id=" pokemonName" name="pokemonName"><br><br>
                    </div>
                </div>
            </div>
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- Section 3 -->
            <label for="region">Región</label>
            <select id="region" name="region">
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
            </select><br><br>
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- Section 4 -->
            <label for="types">Tipo</label>
            <!-- Type1 -->
            <input type="checkbox" id="type1" name="type" value="Planta">
            <label for="type1">Planta</label>
            <!-- Type2 -->
            <input type="checkbox" id="type2" name="type" value="Veneno">
            <label for="type2">Veneno</label>
            <!-- Type3 -->
            <input type="checkbox" id="type3" name="type" value="Fuego">
            <label for="type3">Fuego</label>
            <!-- Type4 -->
            <input type="checkbox" id="type4" name="type" value="Volador">
            <label for="type4">Volador</label>
            <!-- Type5 -->
            <input type="checkbox" id="type5" name="type" value="Agua">
            <label for="type5">Agua</label>
            <!-- Type6 -->
            <input type="checkbox" id="type6" name="type" value="Electrico">
            <label for="type6">Eléctrico</label>
            <!-- Type7 -->
            <input type="checkbox" id="type7" name="type" value="Hada">
            <label for="type7">Hada</label>
            <!-- Type8 -->
            <input type="checkbox" id="type8" name="type" value="Bicho">
            <label for="type8">Bicho</label>
            <!-- Type9 -->
            <input type="checkbox" id="type9" name="type" value="Lucha">
            <label for="type9">Lucha</label>
            <!-- Type10 -->
            <input type="checkbox" id="type10" name="type" value="Psiquico">
            <label for="type10">Psíquico</label><br><br>
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- Section 5 -->
            <label for="height">Altura</label>
            <input type="number" id="height" name="height" placeholder="Altura del Pokemon" min="1"><br><br>
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- Section 6 -->
            <label for="weight">Peso</label>
            <input type="number" id="weight" name="weight" placeholder="Peso del Pokemon" min="0" step="0.01"><br><br> <!--  ___________________DECIMALS______________________  -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- Section 7 -->
            <label for=" evolution">Evolución</label>
            <!-- Option1 -->
            <input type="radio" id="withoutEvolution" name="radioSelector" value="withoutEvolution">
            <label for="withoutEvolution">Sin Evolucionar</label>
            <!-- Option2 -->
            <input type="radio" id="firstEvolution" name="radioSelector" value="firstEvolution">
            <label for="firstEvolution">Primera Evolución</label>
            <!-- Option3 -->
            <input type="radio" id="othersEvolution" name="radioSelector" value="othersEvolution">
            <label for="othersEvolution">Otras Evoluciones</label><br><br>
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- Section 8 -->
            <label for="image">Imagen</label>
            <input type="file" id="selectFile" name="selectFile"><br><br>
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- AIR -->
            <!-- Section 9 -->
            <input type="submit" value="Aceptar">
            <a href="empty">Cancelar</a>
        </form>
    </div>
</body>

</html>