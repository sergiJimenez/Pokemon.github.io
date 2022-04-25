<?php

//Initial session.
session_start();
require_once('../php_library/pokedex.php');

//If a Pokedex session is already exist I want to recover the data.
//If it's not existing, creating a new Pokedex session.
if (isset($_SESSION['Pokedex'])){
    $pokedex = $_SESSION['Pokedex'];
} else {
    $pokedex = [];
}

//If a pokemon is already added:
if (isset($_POST['Add'])){
    if ($_POST['Number'] == ""){
        $_SESSION['Error'] = "Unexisting number. Please write a number.";
        header('Location: ' . '../php_views/pokemon_search.php');
    } else if ($_POST['Name'] == ""){
        $_SESSION['Error'] = "Unexisting name. Please write a name.";
        header('Location: ' . '../php_views/pokemon_search.php');
    } else if ($_FILES['Picture']['name'] == ""){
        $_SESSION['Error'] = "Unexisting picture. Please introduce a picture.";
        header('Location: ' . '../php_views/pokemon_search.php');
    } else {
        //Tryin' to recover data of the picture:
        $pictureName = $_FILES['Picture']['name']; //Property of name of picture input
        $pictureType = $_FILES['Picture']['type']; //Property of type of picture input
        $pictureSize = $_FILES['Picture']['size']; //Property of picture size
        $temporaryRoute = $_FILES['Picture']['tmp_name']; //Folder name where we save, temporally, the name of the pictures before those once uploads to the server
        $destinationFolder = "/Pokemon.github.io/users/"; //Findin' the folder where we upload the pictures on the server

        //Setting the number:
        $length = 3;
        $formatNumber = str_pad($_POST['Number'], $length, "0", STR_PAD_LEFT);
        $_POST['Number'] = $formatNumber;
        $fullRoute = $destinationFolder . $_POST['Number'] . '.png'; //Telling it which picture it have to take of the server
        $imagePATH = '../users/' . $_POST['Number'] . '.png';
        if (is_null($_POST['Type'])){
            $_POST['Type'] = [" "]; //Array null = The Nothin'
        }

        //Create a Pokemon
        $pokemon = createPokemon($_POST['Number'], $_POST['Name'], $_POST['Region'], $_POST['Type'], $_POST['Height'], $_POST['Weight'], $_POST['Evolution'], $fullRoute);
        
        //Adding a Pokemon
        addPokemon($pokemon, $pokedex);

        //If error happens we'll save the data session and we back to pokemon.php
        if (isset($_SESSION['Error'])){
            $_SESSION['Pokemon'] = $pokemon;
            header('Location: ' . '../php_views/pokemon_search.php');
        } else {
            //If error never happens we are going to copy the picture on pokemonsPicture folder
            move_uploaded_file($temporaryRoute, $imagePATH);
            //We are saving the pokedex session
            $_SESSION['Pokedex'] = $pokedex;
            //We came back to ................................................
            header('Location: ' . '../php_views/pokemon_list.php');
        }
        exit();
    }
    //AIR
    //AIR
    //AIR
    //AIR
    //AIR
//If we delete a Pokemon
} else if(isset($_POST['Delete'])){
    $pokemonNumber = $_POST['Number'];
    $position = searchPokemonNumber($pokemonNumber, $pokedex);
    $pokemon = $pokedex[$position];
    dropPokemon($pokemonNumber, $pokedex);

    $destinationFolder = "../media/PokemonsImages/";
    $fullRoute = $destinationFolder . $_POST['Number'] . '.png';

    //Delete the picture
    if (unlink($fullRoute)){
        $_SESSION['Pokedex'] = $pokedex;
    } else {
        $_SESSION['Error'] = 'Pokemon can not be deleted. Please check what is happening.';
    }
    //We are back to Pokemon List
    header('Location: ' . '../php_views/pokemon_list.php');
    exit();
//If we edit a Pokemon
} else if(isset($_POST['Edit'])){
    $pokemonNumber = $_POST['Number']; //Take the Pokemon number
    //We are searching the pokemon by the number
    $position = searchPokemonNumber($pokemonNumber, $pokedex);
    $pokemon = $pokedex[$position];
    //Savin' the pokemon on the session
    $_SESSION['Pokemon'] = $pokemon;
    //Redirect to pokemonEdit.php
    header('Location: ' . '../php_views/pokemon_edit.php');
    exit();
} else if(isset($_POST['Upgrade'])){
    //If array is null we can not see anything
    if (is_null($_POST['Type'])){
        $_POST['Type'] = [" "];
    }
    $temporaryRoute = $_FILES['Picture']['temporalName'];
    $destinationFolder = "../users/";
    $fullRouteImage = $destinationFolder . $_POST['Number'] . '.png';
    modifyPokemon($pokedex, $_POST['Number'], $_POST['Number'], $_POST['Name'], $_POST['Region'], $_POST['Type'], $_POST['Height'], $_POST['Weight'], $_POST['Evolution'], $fullRouteImage);
    //If we have not error's copy the picture in /media/pokemonsPicture
    move_uploaded_file($temporaryRoute, $fullRoute);
    //We save the pokedex on the session
    $_SESSION['Pokedex'] = $pokedex;
    //We are back to pokemonList
    header('Location: ' . '../php_views/pokemon_list.php');
    exit();
}