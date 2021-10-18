<?php
function createPokemon()
{
}

function showPokemon()
{
}

function addPokemon()
{
}

function dropPokemon()
{
}

function modifyPokemon()
{
}

function searchPokemonNumber()
{
}

function showPokedex($pokedex)
{
    foreach ($pokedex as $value) {
        foreach ($value as $key => $value2) {
            echo "La clave es " . $key . " y el valor es " . $value2 . "<br>";
        }
    }
}
