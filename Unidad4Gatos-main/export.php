<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/botonera.css">
    <link rel="stylesheet" href="css/form.css">
    <title>export gato</title>
</head>

<body>
    <?php include "databaseManagement.inc.php";
    $confirmacion = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        function seguro($valor)
        {
            $valor = strip_tags($valor);
            $valor = stripslashes($valor);
            $valor = htmlspecialchars($valor);
            return $valor;
        }
        $ficheroSeguro=seguro($_POST["fichero"]);
        if (preg_match('/.+\.csv$/', $ficheroSeguro) && $file = fopen($ficheroSeguro, 'a')) {
            $gatos = obtenerTodosCSV();
            chmod($ficheroSeguro, 0777);
            for ($i = 0; $i < count($gatos); $i++) {
                $gatoDatos = array($gatos[$i]["id"], $gatos[$i]["nombre"], $gatos[$i]["dni"], $gatos[$i]["edad"], $gatos[$i]["sexo"], $gatos[$i]["raza"], $gatos[$i]["fechaAlta"]);
                fputcsv($file, $gatoDatos, ',');
            }
            $confirmacion = "Se han exportado los datos en el fichero con éxito";
            fclose($file);
        } else {
            $confirmacion = "Error en exportar";
        }
        
    }
    ?>
    <nav>
        <ul>
            <li><a href="index.php">Página principal</a></li>
            <li><a href="create.php">Nuevo gato</a></li>
            <li><a href="list.php">Lista gato</a></li>
            <li><a href="import.php">Importar gato</a></li>
            <li><a class="active" href="export.php">Exportar gatos</a></li>

        </ul>
    </nav>
    <form class="form-register" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <h2 class="form-titulo">Exportar:</h2>
        <div class="contenedor-inputs">
            <input type="text" name="fichero" placeholder="fichero.csv" class="input-100" required>
            <input type="submit" value="exportar" class="btn-enviar">
        </div>
    </form>
    <h2><?php echo $confirmacion; ?></h2>
</body>

</html>