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
    echo "<br>";
    echo "<br>";
    echo "Pokemon:" . "<br>";
    foreach ($pokemon as $key => $value) {
        echo $key . ": " . $value . "." . "<br>";
    }
    echo "___________________________________________________________________________";
    echo "<br>";
    echo "<br>";
}

function addPokemon($pokemon, &$pokedex)
{
    if (searchPokemonNumber($pokedex, $pokemon) == -1) {
        array_push($pokedex, $pokemon);
        echo "The new pokemon in your pokedex is: " . $pokemon["Name"] . "<br>";
    } else {
        echo "Pokemon  already exist.";
    }
}

function dropPokemon(&$pokedex, $Number)
{
    $i = 0;
    $exist = false;
    while ($i <  count($pokedex) && !$exist) {
        if ($pokedex[$i]["Number"] == $Number) {
            $exist = true;
            echo "You are deleting: " . $Number . ".";
            unset($pokedex[$i]);
            $pokedex = array_diff($pokedex, array("", 0, null)); //elimina las ubicaciones vacias del array.
        } else {
            $i++;
        }
    }
}

function modifyPokemon(&$pokedex, $pokemon)
{
    $position = searchPokemonNumber($pokedex, $pokemon);
    if ($position != -1) {
        $pokedex[$position] = $pokemon;
    }
}

function searchPokemonNumber($pokedex, $pokemon)
{
    $i = 0;
    $position = -1;
    $exist = false;
    while ($i <  count($pokedex) && !$exist) {
        if ($pokedex[$i]["Number"] == $pokemon["Number"]) {
            $exist = true;
            $position = $i;
            echo "Pokemon position in array: " . $position;
        } else {
            $i++;
        }
    }
    return $position;
}

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
