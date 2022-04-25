<?php
session_start();

/*$id = 1;
$pokemon = selectTiposPokemon($id);
var_dump($pokemon);
*/
/*openBD();

$pokemon = selectRegiones();
foreach ($pokemon as $poke) {
    var_dump($poke);
}*/

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

function closeBd(){
    return null;
}


function selectPokemons($connection){
    $arrayPokes = [];
    try {
        //Preparamos la consulta
        $stmt = $connection->prepare("SELECT * FROM pokemons ORDER BY numero");
        //La ejecutamos
        $stmt->execute();
        // Queremos un array asociativo sin índices, por eso ponemos el FETCH_ASSOC
        // Agrupamos los resultados
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //Almaceno el nº de resultados
        $row_count = $stmt->rowCount();
        //Validamos que haya resultados
        // Si existe al menos una fila, la guardamos en el array
        if ($row_count > 0) {
            foreach ($resultado as $poke) {
                array_push($arrayPokes, $poke);
            }
        }
        return $arrayPokes;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function selectTipos(){
    $connection = openBd();
    $consulta = "SELECT * FROM tipos";
    $consultaSelect = $connection->prepare($consulta);
    $consultaSelect->execute();
    $result = $consultaSelect->fetchAll();
    $connection = closeBd();
    return $result;
}

function selectRegiones(){
    $connection = openBd();
    $consulta = "SELECT * FROM regiones";
    $consultaSelect = $connection->prepare($consulta);
    $consultaSelect->execute();
    $result = $consultaSelect->fetchAll();
    $connection = closeBd();
    return $result;
}

function selectPokemonId($pokemon_id){
    $connection = openBd();
    $consulta = "SELECT * FROM pokemons WHERE id = :id";
    $consultaSelect = $connection->prepare($consulta);
    $consultaSelect->bindParam(':id', $pokemon_id);
    $consultaSelect->execute();
    $result = $consultaSelect->fetchAll();
    $connection = closeBd();
    return $result;
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

function selectTiposPokemon($connection, $idPoke){
    $tipos = [];
    try {
        $stmt = $connection->prepare("SELECT * from tipos_has_pokemons JOIN tipos ON tipos_has_pokemons.tipos_id = tipos.id where pokemons_id = $idPoke");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $row_count = $stmt->rowCount();
        if ($row_count > 0) {
            foreach ($resultado as $tipo) {
                array_push($tipos, $tipo);
            }
        }
        return $tipos;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function insertPokemon($p_numero, $p_nombre, $p_altura, $p_peso, $p_evolucion, $p_imagen, $p_tipos, $p_region){
    $connection = openBd();
    //seleccionar id region
    $consulta = "SELECT id FROM regiones WHERE nombre = :nombreRegion";
    $consultaSelect = $connection->prepare($consulta);
    $consultaSelect->bindParam(':nombreRegion', $p_region);
    $consultaSelect->execute();
    $resultRegion = $consultaSelect->fetchAll();
    $idRegion = $resultRegion[0]['id'];
    // var_dump($idRegion);
    // var_dump($consultaSelect);
    //insertar pokemon en BD
    $consulta2 = "INSERT INTO pokemons (numero, nombre, altura, peso, evolucion, imagen, regiones_id)
                VALUES (:numero, :nombre, :altura, :peso, :evolucion, :imagen, :regiones_id);";
    $consultaSelect2 = $connection->prepare($consulta2);
    $consultaSelect2->bindParam(':numero', $p_numero);
    $consultaSelect2->bindParam(':nombre', $p_nombre);
    $consultaSelect2->bindParam(':altura', $p_altura);
    $consultaSelect2->bindParam(':peso', $p_peso);
    $consultaSelect2->bindParam(':evolucion', $p_evolucion);
    $consultaSelect2->bindParam(':imagen', $p_imagen);
    //  var_dump($resultRegion);
    $consultaSelect2->bindParam(':regiones_id', $idRegion);
    $consultaSelect2->execute();
    // $result = $consultaSelect2->fetchAll();
    // var_dump($p_tipos);
    foreach ($p_tipos as $tipo_nombre) {
    // var_dump($tipo_nombre);
    //seleccionar tipo
    $consulta3 = "SELECT id from tipos WHERE nombre = :nombreTipo";
    $consultaSelect3 = $connection->prepare($consulta3);
    $consultaSelect3->bindParam(':nombreTipo', $tipo_nombre);
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

function deletePokemon($connection, $pokemon_id){
    // $connection = openBd();
    $resultado = false;
    $connection->beginTransaction();
    //Preparamos transacción
    try {
        //Preparamos la consulta para la tabla Pokemons
        $stmt = $connection->prepare("DELETE pokemons, tipos_has_pokemons FROM pokemons JOIN tipos_has_pokemons ON pokemons.id=tipos_has_pokemons.pokemons_id WHERE pokemons.id = $pokemon_id");
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
    $tiposAnteriores = selectTiposPokemon($connection, $p_id);
    $nuevoArray = [];
    foreach ($tiposAnteriores as $tipo) {
        $viejoTipo = $tipo["tipos_id"];
        array_push($nuevoArray, $viejoTipo);
    }
    return $nuevoArray;
}
