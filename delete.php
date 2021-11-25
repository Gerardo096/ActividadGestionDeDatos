<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/botonera.css">
    <title>Document</title>
</head>
<body>
    <?php include "databaseManagement.inc.php";
    $id= $_GET["varId"];
    $cumplido=eliminarGato($id);
    $error='Se ha borrado el gato con el id: ' . $id;
    if(!$cumplido){
        $error="Error al borrar el gato seleccionado";
    }

    ?>

    <nav>
        <ul>
            <li><a href="index.php">Página principal</a></li>
            <li><a href="create.php">Nuevo gato</a></li>
            <li><a class="active" href="list.php">Lista gatos</a></li>
            <li><a href="import.php">Importar gatos</a></li>
            <li><a href="export.php">Exportar gatos</a></li>
        </ul>
    </nav>
    <h2><?php echo $error;?></h2>
    <a href="list.php">Volver</a>
</body>
</html>