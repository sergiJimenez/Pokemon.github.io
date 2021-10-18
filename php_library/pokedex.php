<?php
function createPokemon(&$Number, &$Name, &$Region, &$Type, &$Height, &$Weight, &$Evolution, &$Picture)
{
    $newPokemon = array();
    foreach ($newPokemon as $x => $x_value) {
    }
}

function showPokemon(&$pokemon1)
{
    foreach ($pokemon1 as $x => $x_value) {
        echo $x . ": " . $x_value . "." . "<br>";
    }
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

function searchPokemonNumber(&$Number)
{
    $findPokemon = array_key_exists($Number);
    if ($findPokemon === false) {
        echo "-1";
    }
}

function showPokedex(&$pokedex)
{
    foreach ($pokedex as $value) {
        foreach ($value as $key => $value2) {
            echo "The value is " . "'" . $key . "'" . " and his information is " . "'" . $value2 . "'" . "<br>";
        }
    }
}
