<?php
session_start();
// Open dataBase
function openBd(){
    $servername = "localhost";
    $username = "root";
    $password = "password";
    try {
        $connection = new PDO("mysql:host=$servername;dbname=pokedex", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->exec("set names utf8");
        return $connection;
    }
    catch (PDOException $error) {
        echo "Connection failed: " . $error->getMessage();
    }
}

// Close dataBase
function closeBd(){
    return null;
}

// Select all Pokemons
function selectAllPokemon($connection){
    $pokemonsArray = [];
    try {
        //Consult ready:
        $stmt = $connection->prepare("SELECT * FROM pokemons ORDER BY numero");
        //Execute:
        $stmt->execute();
        // FETCH_ASSOC = array associativo
        $resultConsulting = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //Almaceno el nº de resultados
        $row_count = $stmt->rowCount();
        //Validamos que haya resultados
        // Si existe al menos una fila, la guardamos en el array
        if ($row_count > 0) {
            foreach ($resultConsulting as $pokemon) {
                array_push($pokemonsArray, $pokemon);
            }
        }
        return $pokemonsArray;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Select all type of Pokemons
function selectTypes(){
    $connection = openBd();
    $consult = "SELECT * FROM tipos";
    $consultSelect = $connection->prepare($consult);
    $consultSelect->execute();
    $result = $consultSelect->fetchAll();
    $connection = closeBd();
    return $result;
}

// Select all regions
function selectRegion(){
    $connection = openBd();
    $consult = "SELECT * FROM regiones";
    $consultSelect = $connection->prepare($consult);
    $consultSelect->execute();
    $result = $consultSelect->fetchAll();
    $connection = closeBd();
    return $result;
}

// Select one Pokemon
function selectPokemon($pokemonId){
    $connection = openBd();
    $consult = "SELECT * FROM pokemons WHERE id = :id";
    $consultSelect = $connection->prepare($consult);
    $consultSelect->bindParam(':id', $pokemonId);
    $consultSelect->execute();
    $result = $consultSelect->fetchAll();
    $connection = closeBd();
    return $result;
}

// Select types of Pokemon
function selectTypesPokemon($connection, $idPokemon){
    $types = [];
    try {
        $stmt = $connection->prepare("SELECT * from tipos_has_pokemons JOIN tipos ON tipos_has_pokemons.tipos_id = tipos.id WHERE pokemons_id = $idPokemon");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $row_count = $stmt->rowCount();
        if ($row_count > 0) {
            foreach ($result as $type) {
                array_push($types, $type);
            }
        }
        return $types;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Insert Pokemon
function insertPokemon($pokemonNumber, $pokemonName, $pokemonHeight, $pokemonWeight, $pokemonEvolution, $pokemonPicture, $pokemonTypes, $pokemonRegion){
    $connection = openBd();
    //Select ID Region
    $consult = "SELECT id FROM regiones WHERE nombre = :nombreRegion";
    $consultSelect = $connection->prepare($consult);
    $consultSelect->bindParam(':nombreRegion', $pokemonRegion);
    $consultSelect->execute();
    $resultRegion = $consultSelect->fetchAll();
    $idRegion = $resultRegion[0]['id'];

    // Insert Pokemon in BD
    $insertPokemonConsult = "INSERT INTO pokemons (numero, nombre, altura, peso, evolucion, imagen, regiones_id) VALUES (:numero, :nombre, :altura, :peso, :evolucion, :imagen, :regiones_id);";
    $insertSelectPokemon = $connection->prepare($insertPokemonConsult);
    $insertSelectPokemon->bindParam(':numero', $pokemonNumber);
    $insertSelectPokemon->bindParam(':nombre', $pokemonName);
    $insertSelectPokemon->bindParam(':altura', $pokemonHeight);
    $insertSelectPokemon->bindParam(':peso', $pokemonWeight);
    $insertSelectPokemon->bindParam(':evolucion', $pokemonEvolution);
    $insertSelectPokemon->bindParam(':imagen', $pokemonPicture);
    $insertSelectPokemon->bindParam(':regiones_id', $idRegion);
    $insertSelectPokemon->execute();

    foreach ($pokemonTypes as $type_name) {
    // Select type
    $consultType = "SELECT id from tipos WHERE nombre = :nombreTipo";
    $typeSelect = $connection->prepare($consultType);
    $typeSelect->bindParam(':nombreTipo', $type_name);
    $typeSelect->execute();
    $resultSelectType = $typeSelect->fetchAll();
    $resultType = $resultSelectType[0]['id'];
    //Select Pokemon id
    $consultID = "SELECT id from pokemons WHERE numero = :numeroPokemon";
    $idSelect = $connection->prepare($consultID);
    $idSelect->bindParam(':numeroPokemon', $pokemonNumber);
    $idSelect->execute();
    $resultSelectID = $idSelect->fetchAll();
    $resultID = $resultSelectID[0]['id'];
    //Insert Type in BD
    $insertTypeBD = "INSERT INTO tipos_has_pokemons (tipos_id, pokemons_id)
    VALUES (:tipos_id, :pokemons_id);";
    $selectinsertTypeBD = $connection->prepare($insertTypeBD);
    $selectinsertTypeBD->bindParam(':tipos_id', $resultType);
    $selectinsertTypeBD->bindParam(':pokemons_id', $resultID);
    $selectinsertTypeBD->execute();
    }
    $connection = closeBd();
}

// Delete Pokemon
function deletePokemon($connection, $pokemonId){
    // $connection = openBd();
    $result = false;
    $connection->beginTransaction();
    //Preparamos transacción
    try {
        //Preparamos la consulta para la tabla Pokemons
        $stmt = $connection->prepare("DELETE pokemons, tipos_has_pokemons FROM pokemons JOIN tipos_has_pokemons ON pokemons.id=tipos_has_pokemons.pokemons_id WHERE pokemons.id = $pokemonId");
        //Ejecutamos la consulta
        $stmt->execute();
        $connection->commit();
        $result = true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    //Cerramos BD
    $connection = closeBd();
    return $result;
}

// Modify Pokemon
function selectPokemonNum($pokemonNumber){
    $connection = openBd();
    $consult = "SELECT * FROM pokemons WHERE numero = :num";
    $consultSelect = $connection->prepare($consult);
    $consultSelect->bindParam(':num', $pokemonNumber);
    $consultSelect->execute();
    $result = $consultSelect->fetchAll();
    $connection = closeBd();
    return $result;
}

function updatePokemons($connection, $pokemonID, $pokemonNumber, $pokemonName, $pokemonHeight, $pokemonWeight, $pokemonEvolution, $pokemonPicture, $pokemonRegion, $pokemonType){
    $result = false;
    $connection->beginTransaction();
    try {
        $sentence = $connection->prepare("UPDATE pokemons SET numero=:numero, nombre=:nombre, altura=:altura, peso=:peso, evolucion=:evolucion, imagen=:imagen, regiones_id=:region WHERE id = $pokemonID");
        $sentence->bindParam(':numero', $pokemonNumber);
        $sentence->bindParam(':nombre', $pokemonName);
        $sentence->bindParam(':altura', $pokemonHeight);
        $sentence->bindParam(':peso', $pokemonWeight);
        $sentence->bindParam(':evolucion', $pokemonEvolution);
        $newPicture = $_FILES['Picture']['name'];

        if ($newPicture == "") {
            $query = $connection->prepare("SELECT imagen FROM pokemons WHERE numero = :numero");
            $query->bindParam(':numero', $pokemonNumber);
            $query->execute();
            $picture = $query->fetch(PDO::FETCH_ASSOC);
            $picture = implode($picture);
            $sentence->bindParam(':imagen', $pokemonPicture);
        } else {
            $sentence->bindParam(':imagen', $pokemonPicture);
        }
        $sentence->bindParam(':region', $pokemonRegion);
        $oldTypes = oldTypesNumbers($connection, $pokemonID);
        $newTypes = typesID($pokemonType);
        foreach ($oldTypes as $type) {
            $query = $connection->prepare("DELETE FROM tipos_has_pokemons WHERE pokemons_id=:pokemonId AND tipos_id=:tipoViejo");
        
            $query->bindParam(':tipoViejo', $type);
            $query->bindParam(':pokemonId', $pokemonID);
        
            $query->execute();
        }
        foreach ($newTypes as $type) {
        
            $query = $connection->prepare("INSERT INTO tipos_has_pokemons (tipos_id, pokemons_id) VALUES (:tipoNuevo, :pokemonId)");
        
            $query->bindParam(':tipoNuevo', $type);
            $query->bindParam(':pokemonId', $pokemonID);
        
            $query->execute();
        }
        $sentence->execute();
        $connection->commit();
        $result = true;
    } catch (PDOException $e) {
        $connection->rollBack();
        echo "Error: " . $e->getMessage();
    }
    $connection = closeBd();
    return $result;
}

function getPokemonID($connection, $pokemonNumber){
    $consult = "SELECT id FROM pokemons WHERE numero = :num";
    $selectConsult = $connection->prepare($consult);
    $selectConsult->bindParam(':num', $pokemonNumber);
    $selectConsult->execute();
    $result = $selectConsult->fetchAll();
    $connection = closeBd();
    return $result;
}

function typesID($pokemonType){
    $arrayTypesID = [];
    foreach ($pokemonType as $type) {
        switch ($type) {
            case 'Planta':
                array_push($arrayTypesID, 1);
                break;
            case 'Veneno':
                array_push($arrayTypesID, 2);
                break;
            case 'Fuego':
                array_push($arrayTypesID, 3);
                break;
            case 'Volador':
                array_push($arrayTypesID, 4);
                break;
            case 'Agua':
                array_push($arrayTypesID, 5);
                break;
            case 'Eléctrico':
                array_push($arrayTypesID, 6);
                break;
            case 'Hada':
                array_push($arrayTypesID, 7);
                break;
            case 'Bicho':
                array_push($arrayTypesID, 8);
                break;
            case 'Lucha':
                array_push($arrayTypesID, 9);
                break;
            case 'Psíquico':
                array_push($arrayTypesID, 10);
                break;
            case 'Fantasma':
                array_push($arrayTypesID, 11);
                break;
            case 'Siniestro':
                array_push($arrayTypesID, 12);
                break;
            case 'Hielo':
                array_push($arrayTypesID, 13);
                break;
            case 'Roca':
                array_push($arrayTypesID, 14);
                break;
            case 'Tierra':
                array_push($arrayTypesID, 15);
                break;
            case 'Acero':
                array_push($arrayTypesID, 16);
                break;
            case 'Normal':
                array_push($arrayTypesID, 17);
                break;
            case 'Dragon':
                array_push($arrayTypesID, 18);
                break;
        }
    }
    return $arrayTypesID;
}

function oldTypesNumbers($connection, $pokemonID){
    $oldTypes = selectTypesPokemon($connection, $pokemonID);
    $newArray = [];
    foreach ($oldTypes as $type) {
        $oldOldType = $type["tipos_id"];
        array_push($newArray, $oldOldType);
    }
    return $newArray;
}