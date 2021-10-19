<?php
function createPokemon($Number, $Name, $Region, $Type, $Height, $Weight, $Evolution, $Picture)
{
    $pokemon = array(
        "Number" => $Number,
        "Name" => $Name,
        "Region" => $Region,
        "Type" => $Type,
        "Height" => $Height,
        "Weight" => $Weight,
        "Evolution" => $Evolution,
        "Picture" => $Picture
    );
    return $pokemon;
}

function showPokemon($pokemon)
{
    echo "Pokemon stats: " . "<br>";
    echo "Number: " . $pokemon["Number"] . "<br>";
    echo "Name: " . $pokemon["Name"] . "<br>";
    echo "Region: " . $pokemon["Region"] . "<br>";
    echo "Type: " . $pokemon["Type"] . "<br>";
    echo "Height: " . $pokemon["Height"] . "<br>";
    echo "Weight: " . $pokemon["Weight"] . "<br>";
    echo "Evolution: " . $pokemon["Evolution"] . "<br>";
    echo "Picture: " . $pokemon["Picture"] . "<br>";
    echo "<br>";
}

function addPokemon($pokemon, &$pokedex)
{
    array_push($pokedex, array(
        "Number" => $pokemon["Number"],
        "Name" => $pokemon["Name"],
        "Region" => $pokemon["Region"],
        "Type" => $pokemon["Type"],
        "Height" => $pokemon["Height"],
        "Weight" => $pokemon["Weight"],
        "Evolution" => $pokemon["Evolution"],
        "Picture" => $pokemon["Picture"],
    ));
    echo "The new pokemon in your pokedex is: " . $pokemon["Name"] . "<br>";
}

function dropPokemon(&$pokedex)
{
    echo "You are deleting Ivysur.";
    unset($pokedex[1]);
    $pokedex = array_filter($pokedex); //elimina las ubicaciones vacias del array.
}

function modifyPokemon()
{
}
/*
function searchPokemonNumber($pokemon)
{
    $findPokemon = array_key_exists($pokemon);
    if ($findPokemon === false) {
        echo "-1";
    }
}
*/

function showPokedex(&$pokedex)
{
    echo "<br>";
    echo "<br>";
    echo "The Pokedex is:" . "<br>";
    foreach ($pokedex as $value) {
        foreach ($value as $key => $value2) {
            echo "The value is " . "'" . $key . "'" . " and his information is " . "'" . $value2 . "'" . "<br>";
        }
        echo "___________________________________________________________________________";
        echo "<br>";
        echo "<br>";
    }
}
