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
    } else {
        echo "Pokemon  already exist.";
    }
}

function dropPokemon(&$pokedex)
{
    echo "You are deleting Ivysur.";
    unset($pokedex[1]);
    $pokedex = array_filter($pokedex); //elimina las ubicaciones vacias del array.
}

function modifyPokemon(&$pokedex, $modifyPokemon, $Number, $Name, $Region, $Type, $Height, $Weight, $Evolution, $Picture)
{
    $i = 0;
    $notAvaliable = false;

    while ($i <= count($pokedex) - 1 && $notAvaliable == false) {
        if ($pokedex[$i]["Name"] == $modifyPokemon) {
            echo "Pokemon name: " . $pokedex[$i]["Name"] . "<br>";
            $notAvaliable = true;

            $modifyPokemon = array(
                "Number" => $Number,
                "Name" => $Name,
                "Region" => $Region,
                "Type" => $Type,
                "Height" => $Height,
                "Weight" => $Weight,
                "Evolution" => $Evolution,
                "Picture" => $Picture
            );

            $pokedex[$i] = $modifyPokemon;
        }
        $i++;
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
