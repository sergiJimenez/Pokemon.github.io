<?php
include "pokedex.php";

//Creamos una pokedex vacia:
$pokedex = array();

//Creamos 1 pokemon:
$pokemon = createPokemon("001", "Bulbasur", "Hoen", $Type = ("Plant, Poison"), "70", "6.9", "Without Evolution", "001.png");
//Añadimos el pokemon creado a la pokedex:
addPokemon($pokemon, $pokedex);
//EXTRA = Mostramos el pokemon añadido:
showPokemon($pokemon);


//TRYYYYYYING:
modifyPokemon($pokedex, $pokemon, "Bulbasur", "0011", "Mega Bulbasur", "Jotho", $Type = ("Plant, Poison, Fire"), "170", "655.89", "With Evolution", "009.png");
showPokedex($pokedex);



/*
//Creamos 2 pokemon:
$pokemon = createPokemon("002", "Ivysur", "Hoen", $Type = ("Plant, Poison"), "100", "13", "First Evolution", "002.png");
//Añadimos el pokemon creado a la pokedex:
addPokemon($pokemon, $pokedex);
//EXTRA = Mostramos el pokemon añadido:
showPokemon($pokemon);

//Creamos 3 pokemon:
$pokemon = createPokemon("004", "Charmander", "Jotho", $Type = ("Fire"), "60", "8.5", "Without Evolution", "004.png");
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
modifyPokemon($pokedex, "Bulbasur", "0011", "Mega Bulbasur", "Jotho", $Type = ("Plant, Poison, Fire"), "170", "655.89", "With Evolution", "009.png");
showPokedex($pokedex);

//Busca un pokemon:
searchPokemonNumber($pokedex);
*/