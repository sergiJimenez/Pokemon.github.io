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
    if ($_POST['Number'] === "" || !is_numeric($_POST['Number'])){
        $_SESSION['Error'] = "Unexisting number. Please write a number.";
        header('Location: ' . '../php_views/'); //FALTA URL
    } else if ($_POST['Name'] === ""){
        $_SESSION['Error'] = "Unexisting name. Please write a name.";
        header('Location: ' . '../php_views/'); //FALTA URL
    } else if ($_FILES['Picture']['Name'] === ""){
        $_SESSION['Error'] = "Unexisting picture. Please introduce a picture.";
        header('Location: ' . '../php_views/'); //FALTA URL
    } else {
        //Tryin' to recover data of the picture:
        $pictureName = $_FILES['Picture']['Name'];
        $pictureType = $_FILES['Picture']['Type'];
        $pictureSize = $_FILES['Picture']['Size'];
        $temporaryRoute = $_FILES['Picture']['temporalName'];
        $destinationFolder = "../users/";

        //Setting the number:
        $length = 3;
        $formatNumber = str_pad($_POST['Number'], $length, "0", STR_PAD_LEFT);
        $_POST['Number'] = $formatNumber;

        //Telling it which picture it have to take of the server:
        $fullRoute = $destinationFolder . $_POST['Number'].  '.png';

        //Array null = The Nothin'
        if (is_null($_POST['Type'])){
            $_POST['Type'] = [" "];
        }

        //Create a Pokemon
        $pokemon = createPokemon($_POST['Number'], $_POST['Name'], $_POST['Region'], $_POST['Type'], $_POST['Height'], $_POST['Weight'], $_POST['Evolution'], $fullRoute);
        
        //Adding a Pokemon
        addPokemon($pokemon, $pokedex);

        //
        if (isset($_SESSION['Error'])){
            $_SESSION['Pokemon'] = $pokemon;
            header('Location: ' . '../php_views/'); //FALTA URL
        } else {
            //
            move_uploaded_file($temporaryRoute, $fullRoute);
            //
            $_SESSION['Pokedex'] = $pokedex;
            //
            header('Location: ' . '../php_views/'); //FALTA URL
        }
        exit();
    }
}