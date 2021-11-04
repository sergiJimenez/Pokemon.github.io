<?php
abs(include "php_partials/navbarMenu.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- LINKS -->
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <!-- LINKS -->
</head>

<body class="background">
    <!-- <h1>
        <?php
        //Creamos una pokedex vacia:
        $pokedex = array();

        //Creamos 1 pokemon:
        $pokemon = createPokemon("001", "Bulbasur", "Hoen", "Plant, Poison", "70", "6.9", "Without Evolution", "001.png");
        //Añadimos el pokemon creado a la pokedex:
        addPokemon($pokemon, $pokedex);
        //EXTRA = Mostramos el pokemon añadido:
        showPokemon($pokemon);

        //Creamos 2 pokemon:
        $pokemon = createPokemon("002", "Ivysur", "Hoen", "Plant, Poison", "100", "13", "First Evolution", "002.png");
        //Añadimos el pokemon creado a la pokedex:
        addPokemon($pokemon, $pokedex);
        //EXTRA = Mostramos el pokemon añadido:
        showPokemon($pokemon);

        //Creamos 3 pokemon:
        $pokemon = createPokemon("004", "Charmander", "Jotho", "Fire", "60", "8.5", "Without Evolution", "004.png");
        //Añadimos el pokemon creado a la pokedex:
        addPokemon($pokemon, $pokedex);
        //EXTRA = Mostramos el pokemon añadido:
        showPokemon($pokemon);


        //Muestra toda la pokedex que tenemos hasta ahora:
        showPokedex($pokedex);

        //Elimina el pokemon:
        dropPokemon($pokedex);

        //Volvemos a mostrar toda la pokedex:
        showPokedex($pokedex);


        //En el ejercicio no sale pero para mostrar que funciona ejecutaré las dos funciones no indicadas:
        //Modifica un pokemon:
        modifyPokemon($pokedex, "Bulbasur", "0011", "Mega Bulbasur", "Jotho", "Plant, Poison, Fire", "170", "655.89", "With Evolution", "009.png");
        showPokedex($pokedex);

        //Busca un pokemon:
        searchPokemonNumber($pokedex);
        ?>
    </h1> -->
</body>

</html>