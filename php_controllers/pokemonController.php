<?php   
//Initial session.
require_once('../php_library/pokedex.php');
require_once('../php_library/bd.php');
$connection = openBd();
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
        //Setting the number:
        $length = 3;
        $formatNumber = str_pad($_POST['Number'], $length, "0", STR_PAD_LEFT);
        $_POST['Number'] = $formatNumber;
        $pokemon = selectPokemonNum($_POST['Number']);
        if ($pokemon == true){
            $_SESSION['Error'] = "This pokemon already exists.";
        } else {
            //Tryin' to recover data of the picture:
            $pictureName = $_FILES['Picture']['name']; //Property of name of picture input
            $pictureType = $_FILES['Picture']['type']; //Property of type of picture input
            $pictureSize = $_FILES['Picture']['size']; //Property of picture size
            $temporaryRoute = $_FILES['Picture']['tmp_name']; //Folder name where we save, temporally, the name of the pictures before those once uploads to the server
            $destinationFolder = "/Pokemon.github.io/users/"; //Findin' the folder where we upload the pictures on the server
            $fullRoute = $destinationFolder . $_POST['Number'] . '.png'; //Telling it which picture it have to take of the server
            $imagePATH = '../users/' . $_POST['Number'] . '.png';
            
            insertPokemon($_POST['Number'], $_POST['Name'], $_POST['Height'], $_POST['Weight'], $_POST['Evolution'], $imagePATH, $_POST['Type'], $_POST['Region']);
        }
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
    $result = false;
    $id = $_POST['Number'];
    $pokemon = selectPokemon($id);
    $imagePATH = $pokemon[0]['imagen'];

    $result = deletePokemon($connection, $id);
    if ($result == true){
        if (unlink($imagePATH)){
            $_SESSION['Pokedex'] = $pokedex;
            $_SESSION['Success'] = "Pokemon deleted correctly!";
        } else{
            $_SESSION['Error'] = "Pokemon cannot be deleted.";
        }
    }
    header('Location: ' . '../php_views/pokemon_list.php');
    exit();
//If we edit a Pokemon
} else if(isset($_POST['Edit'])){
    $pokemonNumber = $_POST['Number'];
    $pokemon = selectPokemon($pokemonNumber);
    $types = selectTypes($connection, $pokemonNumber);
    $_SESSION['Pokemon'] = $pokemon[0];
    $_SESSION['Type'] = $types;
    header('Location: ' . '../php_views/pokemon_edit.php');
    exit();
} else if(isset($_POST['Upgrade'])){
    $pokemonID = getPokemonID($connection, $_POST['Number']);
    $selectedPokemon = selectPokemon($pokemonID[0]['id']);
    $destinationFolder = "/Pokemon.github.io/users/";
    var_dump($_FILES['Picture']['name']);
    if($_FILES['Picture']['name'] != ""){
        $temporaryRoute = $_FILES['Picture']['tmp_name'];
        $fullCompletePicture = $destinationFolder . $selectedPokemon[0]['numero'] . '.png';
        unlink($fullCompletePicture);
    } else {
        $fullCompletePicture = $selectedPokemon[0]['imagen'];
    }

    $result = updatePokemons($connection, $selectedPokemon[0]['id'], $_POST['Number'], $_POST['Name'], $_POST['Height'], $_POST['Weight'], $_POST['Evolution'], $fullCompletePicture, $selectedPokemon[0]['regiones_id'], $_POST['Type']);
    if ($result == false) {
        $_SESSION['Error'] = 'It cannot be to update the pokemon data.';
    } else {
        move_uploaded_file($temporaryRoute, $fullCompletePicture);
        $_SESSION['Success'] = 'Pokemon edited successfully!';
        $_SESSION['Pokedex'] = $pokedex;
    }
    header('Location: ' . '../php_views/pokemon_list.php');
    exit();
}
?>