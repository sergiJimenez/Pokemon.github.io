<?php
include "php_library/pokedex.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
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
        modifyPokemon();

        //Busca un pokemon:
        //searchPokemonNumber($pokemon = "001");
        ?>
    </h1>
</body>

</html>