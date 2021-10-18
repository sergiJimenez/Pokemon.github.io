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
        $pokedex = array(
            $pokemon1 => array(
                "Number" => 001,
                "Name" => "Bulbasur",
                "Region" => "Hoen",
                "Type" => "Plant, Poison",
                "Height" => 70,
                "Weight" => 6.9,
                "Evolution" => "Without Evolution",
                "Picture" => "https://www.pokemon.com/es/pokedex/bulbasaur"
            ),

            $pokemon2 => array(
                "Number" => 002,
                "Name" => "Ivysur",
                "Region" => "Hoen",
                "Type" => "Plant, Poison",
                "Height" => 100,
                "Weight" => 13,
                "Evolution" => "First Evolution",
                "Picture" => "https://www.pokemon.com/es/pokedex/ivysaur"
            ),

            $pokemon3 => array(
                "Number" => 004,
                "Name" => "Charmander",
                "Region" => "Jotho",
                "Type" => "Fire",
                "Height" => 60,
                "Weight" => 8.5,
                "Evolution" => "Without Evolution",
                "Picture" => "https://www.pokemon.com/es/pokedex/charmander"
            )
        );
        createPokemon($Number = 001, $Name = "Bulbasur", $Region = "Hoen", $Type = "Plant, Poison", $Height = 70, $Weight = 6.9, $Evolution = "Without Evolution", $Picture = "https://www.pokemon.com/es/pokedex/bulbasaur");
        createPokemon($Number = 002, $Name = "Ivysur", $Region = "Hoen", $Type = "Plant, Poison", $Height = 100, $Weight = 13, $Evolution = "First Evolution", $Picture = "https://www.pokemon.com/es/pokedex/ivysaur");
        createPokemon($Number = 004, $Name = "Charmander", $Region = "Jotho", $Type = "Fire", $Height = 60, $Weight = 8.5, $Evolution = "Without Evolution", $Picture = "https://www.pokemon.com/es/pokedex/charmander");
        showPokemon();
        addPokemon();
        dropPokemon();
        modifyPokemon();
        searchPokemonNumber($Number = 002);
        showPokedex($pokedex);
        ?>
    </h1>
</body>

</html>