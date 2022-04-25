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
    $pokemonNumber = $pokemon['Number'];
    if (searchPokemonNumber($pokemonNumber, $pokedex) == -1) {
        array_push($pokedex, $pokemon);
        $_SESSION['Success'] = "Pokemon añadido correctamente.<br>";
    } else {
        $_SESSION['Error'] = "Pokemon already exist.";
    }
    // if (searchPokemonNumber($pokedex, $pokemon) == -1) {
    //     array_push($pokedex, $pokemon);
    //     $_SESSION['Success'] = "Pokemon añadido correctamente.<br>";
    // } else {
    //     $_SESSION['Error'] = "Pokemon already exist.";
    // }
}

function dropPokemon($Number, &$pokedex)
{
    $position = searchPokemonNumber($Number, $pokedex);

    if ($position == -1) {
        $_SESSION['Error'] = "We can not delete the Pokemon.";
    } else {
        array_splice($pokedex, $position, 1);
        $_SESSION['Success'] = "Pokemon borrado correctamente.<br>";
    }
}

function modifyPokemon(
    &$pokedex,
    $pokemon2Modify,
    $pokemonNumber,
    $pokemonName,
    $pokemonRegion,
    $pokemonType,
    $pokemonHeight,
    $pokemonWeight,
    $pokemonEvolution,
    $pokemonPicture) {

    $position = searchPokemonNumber($pokemon2Modify, $pokedex);
    if($position == -1){
        $_SESSION["Error"] = "Sorry! The pokemon that you tried to modify does not exists.";
    } else {
        $pokedex[$position]["Number"] = $pokemonNumber;
        $pokedex[$position]["Name"] = $pokemonName;
        $pokedex[$position]["Region"] = $pokemonRegion;
        $pokedex[$position]["Type"] = $pokemonType;
        $pokedex[$position]["Height"] = $pokemonHeight;
        $pokedex[$position]["Weight"] = $pokemonWeight;
        $pokedex[$position]["Evolution"] = $pokemonEvolution;
        $pokedex[$position]["Picture"] = $pokemonPicture;
    }
}

function searchPokemonNumber($pokemonNumber, $pokedex)
{
    $i = 0;
    $position = -1;
    $exist = false;
    while ($i < count($pokedex) && !$exist) {
        if ($pokedex[$i]["Number"] == $pokemonNumber) {
            $exist = true;
            $position = $i;
            echo "Pokemon position in array: " . $position;
        } else {
            $i++;
        }
    }
    return $position;
}
// function searchPokemonNumber($, $pokedex)
// {
//     $i = 0;
//     $position = -1;
//     $exist = false;
//     while ($i < count($pokedex) && !$exist) {
//         if ($pokedex[$i]["Number"] == $pokemon["Number"]) {
//             $exist = true;
//             $position = $i;
//             echo "Pokemon position in array: " . $position;
//         } else {
//             $i++;
//         }
//     }
//     return $position;
// }

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
