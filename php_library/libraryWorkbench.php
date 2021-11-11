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

//Dropping:
dropPokemon($pokedex, "001");
showPokedex($pokedex);
/*
//Elimina el pokemon:
dropPokemon($pokedex, $Number);

//Modifica un pokemon:
$pokemonMOD = createPokemon("001", "Mega Bulbasur", "Hoen", $Type = ("Plant, Poison"), "70", "6.9", "Without Evolution", "001.png");
modifyPokemon($pokedex, $pokemonMOD);
showPokedex($pokedex);

//Busca un pokemon:
searchPokemonNumber($pokedex, $pokemon);
*/