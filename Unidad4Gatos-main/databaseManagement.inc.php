<?php
$servidor = "localhost";
$baseDatos = "animales";
$usuario = "root";
$pass = "root";
function obtenerGato($id)
{
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        /*
        La clase PDOStatement es la que trata las sentencias SQL. 
        Una instancia de PDOStatement se crea cuando se llama a PDO->prepare(), 
        y con ese objeto creado se llama a métodos como bindParam() para pasar valores o execute() para ejecutar sentencias. 
        PDO facilita el uso de sentencias preparadas en PHP, que mejoran el rendimiento y la seguridad de la aplicación. 
        Cuando se obtienen, insertan o actualizan datos, el esquema es: PREPARE -> [BIND] -> EXECUTE. 
        Se pueden indicar los parámetros en la sentencia con un interrogante "?" o mediante un nombre específico.
        */
        $sql = $con->prepare("SELECT * from gatos where id=:id");
        $sql->bindParam(":id", $id); //Para evitar inyecciones SQL
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC); //Recibimos la linea correspondiente en ROW
        $con = null; //Cerramos la conexión
        return $row;
    } catch (PDOException $e) {
        echo $e;
    }
}
function eliminarGato($id)
{
    $retorno = false;
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        $sql = $con->prepare("DELETE from gatos where id=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $retorno;
}
function editarGato($id, $nombre, $dni, $edad, $sexo, $raza, $fechaAlta, $foto)
{
    $retorno = false;
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        $sql = $con->prepare("UPDATE gatos  set nombre=:nombre , dni=:dni, edad=:edad, sexo=:sexo, raza=:raza, fechaAlta=:fechaAlta, foto=:foto where id=:id;");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":dni", $dni);
        $sql->bindParam(":edad", $edad);
        $sql->bindParam(":sexo", $sexo);
        $sql->bindParam(":raza", $raza);
        $sql->bindParam(":fechaAlta", $fechaAlta);
        $sql->bindParam(":foto", $foto);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $retorno;
}
function obtenerTodos()
{
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        $sql = $con->prepare("SELECT id, nombre,dni,raza,fechaAlta from gatos;");
        $sql->execute();
        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { //Haciendo uso de PDO iremos creando el array dinámicamente
            $miArray[] = $row; //https://www.it-swarm-es.com/es/php/rellenar-php-array-desde-while-loop/972445501/
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $miArray;
}
function insertaGato($nombre, $dni, $edad, $sexo, $raza, $fechaAlta, $foto)
{
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        $sql = $con->prepare("INSERT into gatos values(null,:nombre,:dni,:edad,:sexo,:raza,:fechaAlta,:foto)");
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":dni", $dni);
        $sql->bindParam(":edad", $edad);
        $sql->bindParam(":sexo", $sexo);
        $sql->bindParam(":raza", $raza);
        $sql->bindParam(":fechaAlta", $fechaAlta);
        $sql->bindParam(":foto", $foto);
        $sql->execute();
        $id = $con->lastInsertId();
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $id;
}
//IGNORAR
function obtenerTodosCSV(){
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        $sql = $con->prepare("SELECT id, nombre,dni,edad,sexo,raza,fechaAlta from gatos;");
        $sql->execute();
        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $miArray[] = $row;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $miArray;
}