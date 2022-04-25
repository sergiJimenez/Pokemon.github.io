<?php
session_start();
//Open dataBase
function openBd(){
    $servername = "localhost";
    $username = "root";
    $password = "";
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

//Close dataBase
function closeBd(){
    return null;
}

//Select all Pokemons
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

//Select all type of Pokemons
function selectTypes(){
    $connection = openBd();
    $consult = "SELECT * FROM tipos";
    $consultSelect = $connection->prepare($consult);
    $consultSelect->execute();
    $result = $consultSelect->fetchAll();
    $connection = closeBd();
    return $result;
}

//Select all regions
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

// FIXME: Insert Pokemon
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
    $insertPokemon = "INSERT INTO pokemons (numero, nombre, altura, peso, evolucion, imagen, regiones_id) VALUES (:numero, :nombre, :altura, :peso, :evolucion, :imagen, :regiones_id);";
    $insertSelectPokemon = $connection->prepare($insertPokemon);
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
    $consulta3 = "SELECT id from tipos WHERE nombre = :nombreTipo";
    $consultaSelect3 = $connection->prepare($consulta3);
    $consultaSelect3->bindParam(':nombreTipo', $type_name);
    $consultaSelect3->execute();
    $resultSelectTipo = $consultaSelect3->fetchAll();
    // echo 'resultSelectTipo:    ' . var_dump($resultSelectTipo) . '<br>';
    $result12 = $resultSelectTipo[0]['id'];
    // echo 'resultSelectTipo:    ' .  var_dump($result12) . '<br>';
    // var_dump('RES 12:    ' . $result12 . '<br>');
    //seleccionar pokemon id
    $consulta4 = "SELECT id from pokemons WHERE numero = :numeroPokemon";
    $consultaSelect4 = $connection->prepare($consulta4);
    $consultaSelect4->bindParam(':numeroPokemon', $p_numero);
    $consultaSelect4->execute();
    $resultIdPokemon = $consultaSelect4->fetchAll();
    $result123 = $resultIdPokemon[0]['id'];
    // var_dump('RES 123:    ' . $result123 . '<br>');
    //insertar tipo en BD
    $consulta5 = "INSERT INTO tipos_has_pokemons (tipos_id, pokemons_id)
    VALUES (:tipos_id, :pokemons_id);";
    $consultaSelect5 = $connection->prepare($consulta5);
    $consultaSelect5->bindParam(':tipos_id', $result12);
    $consultaSelect5->bindParam(':pokemons_id', $result123);
    $consultaSelect5->execute();
    // $resultTipo = $consultaSelect5->fetchAll();
    }
    $connection = closeBd();
    // return $result;
}

function selectPokemonNum($pokemon_num){
    $connection = openBd();
    $consulta = "SELECT * FROM pokemons WHERE numero = :num";
    $consultaSelect = $connection->prepare($consulta);
    $consultaSelect->bindParam(':num', $pokemon_num);
    $consultaSelect->execute();
    $result = $consultaSelect->fetchAll();
    $connection = closeBd();
    return $result;
}

function deletePokemon($connection, $pokemonId){
    // $connection = openBd();
    $resultado = false;
    $connection->beginTransaction();
    //Preparamos transacción
    try {
        //Preparamos la consulta para la tabla Pokemons
        $stmt = $connection->prepare("DELETE pokemons, tipos_has_pokemons FROM pokemons JOIN tipos_has_pokemons ON pokemons.id=tipos_has_pokemons.pokemons_id WHERE pokemons.id = $pokemonId");
        //Ejecutamos la consulta
        $stmt->execute();
        $connection->commit();
        $resultado = true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    //Cerramos BD
    $connection = closeBd();
    return $resultado;
}

function updatePokemons($connection, $p_id, $p_numero, $p_nombre, $p_altura, $p_peso, $p_evolucion, $p_imagen, $p_region, $p_tipo){
    $resultado = false;
    $connection->beginTransaction();
    try {
        $sentence = $connection->prepare("UPDATE pokemons SET numero=:numero, nombre=:nombre, altura=:altura, peso=:peso, evolucion=:evolucion, imagen=:imagen, regiones_id=:region WHERE id = $p_id");
        $sentence->bindParam(':numero', $p_numero);
        $sentence->bindParam(':nombre', $p_nombre);
        $sentence->bindParam(':altura', $p_altura);
        $sentence->bindParam(':peso', $p_peso);
        $sentence->bindParam(':evolucion', $p_evolucion);
        $newImagen = $_FILES['imagen']['name'];

        if ($newImagen == "") {
            $query = $connection->prepare("SELECT imagen FROM pokemons WHERE numero = :numero");
            $query->bindParam(':numero', $p_numero);
            $query->execute();
            $imagen = $query->fetch(PDO::FETCH_ASSOC);
            $imagen = implode($imagen);
            $sentence->bindParam(':imagen', $p_imagen);
        } else {
            $sentence->bindParam(':imagen', $p_imagen);
        }
        $sentence->bindParam(':region', $p_region);
        // var_dump($p_id);
        // var_dump($p_tipo);
        $tiposAnteriores = tiposNumerosAntiguos($connection, $p_id);
        $tiposNuevos = tiposNumeros($p_tipo);
        // var_dump($tiposNuevos);
        // var_dump($tiposAnteriores);
        foreach ($tiposAnteriores as $tipo) {
            $query = $connection->prepare("DELETE FROM tipos_has_pokemons WHERE pokemons_id=:pokemonId AND tipos_id=:tipoViejo");
        
            $query->bindParam(':tipoViejo', $tipo);
            $query->bindParam(':pokemonId', $p_id);
        
            $query->execute();
        }
        foreach ($tiposNuevos as $tipo) {
        
            $query = $connection->prepare("INSERT INTO tipos_has_pokemons (tipos_id, pokemons_id) VALUES (:tipoNuevo, :pokemonId)");
        
            $query->bindParam(':tipoNuevo', $tipo);
            $query->bindParam(':pokemonId', $p_id);
        
            $query->execute();
        }
        // $resultado = true;
        $sentence->execute();
        $connection->commit();
        $resultado = true;
    } catch (PDOException $e) {
        $connection->rollBack();
        echo "Error: " . $e->getMessage();
    }
    $connection = closeBd();
    return $resultado;
}

function obtenerIdPokemon($connection, $pokemon_num){
    $consulta = "SELECT id FROM pokemons WHERE numero = :num";
    $consultaSelect = $connection->prepare($consulta);
    $consultaSelect->bindParam(':num', $pokemon_num);
    $consultaSelect->execute();
    $result = $consultaSelect->fetchAll();
    $connection = closeBd();
    return $result;
}

function tiposNumeros($p_tipo){
    $arrayNumTipos = [];
    foreach ($p_tipo as $tipo) {
        switch ($tipo) {
            case 'Agua':
                array_push($arrayNumTipos, 5);
                break;
            case 'Bicho':
                array_push($arrayNumTipos, 8);
                break;
            case 'Eléctrico':
                array_push($arrayNumTipos, 6);
                break;
            case 'Fuego':
                array_push($arrayNumTipos, 3);
                break;
            case 'Hada':
                array_push($arrayNumTipos, 7);
                break;
            case 'Lucha':
                array_push($arrayNumTipos, 9);
                break;
            case 'Planta':
                array_push($arrayNumTipos, 1);
                break;
            case 'Psíquico':
                array_push($arrayNumTipos, 10);
                break;
            case 'Veneno':
                array_push($arrayNumTipos, 2);
                break;
            case 'Volador':
                array_push($arrayNumTipos, 4);
                break;
        }
    }
    return $arrayNumTipos;
}

function tiposNumerosAntiguos($connection, $p_id){
    $tiposAnteriores = selectTypesPokemon($connection, $p_id);
    $nuevoArray = [];
    foreach ($tiposAnteriores as $tipo) {
        $viejoTipo = $tipo["tipos_id"];
        array_push($nuevoArray, $viejoTipo);
    }
    return $nuevoArray;
}
