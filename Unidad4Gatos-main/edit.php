<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/botonera.css">
    <link rel="stylesheet" href="css/form.css">
    <title>Edita gato</title>
</head>

<body>
    <?php include "databaseManagement.inc.php";

    if (count($_GET) > 0) {
        $id = $_GET["varId"];
        $gato = obtenerGato($id);
    } else {
        $id = $_POST["id"];
        $gato = obtenerGato($id);
    }
    $error = '';
    if (count($_POST) > 0) {
        function seguro($valor)
        {
            $valor = strip_tags($valor);
            $valor = stripslashes($valor);
            $valor = htmlspecialchars($valor);
            return $valor;
        }

        $image = '';
        if ($_FILES["avatar"]["name"] != '') {
            $image = $_FILES["avatar"]["name"];
            $temp = $_FILES['avatar']['tmp_name'];
            if (move_uploaded_file($temp, 'images/' . $image)) {
                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                chmod('images/' . $image, 0777);
            }
        } else {
            $image = $gato["foto"];
        }


        $cumplido = editarGato($id, seguro($_POST["nombre"]), $_POST["dni"], $_POST["edad"], seguro($_POST["sexo"]), seguro($_POST["raza"]), $_POST["fechaAlta"], $image);
        if ($cumplido == true) {
            header("Location: view.php?varId=" . $id);
            exit();
        } else {
            $error = "Datos incorrectos o no se ha actualizado nada";
        }
    }
    ?>
    <nav>
        <ul>
            <li><a href="index.php">Página principal</a></li>
            <li><a href="create.php">Nuevo gato</a></li>
            <li><a class="active" href="list.php">Lista gato</a></li>
            <li><a href="import.php">Importar gato</a></li>
            <li><a href="export.php">Exportar gatos</a></li>
        </ul>
    </nav>
    <form class="form-register" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <h2 class="form-titulo">Características:</h2>
        <div class="contenedor-inputs">
            <input type="hidden" name="id" value="<?php echo $gato["id"]; ?>">
            <!--aquí va el id, es hidden por lo tanto no es visible en la web, pero si accesible desde PHP -->
            <input type="text" name="nombre" placeholder="nombre" class="input-100" value='<?php echo $gato["nombre"]; ?>' required>
            <input type="text" name="raza" placeholder="raza" class="input-100" value='<?php echo $gato["raza"]; ?>' required>
            <input type="text" name="sexo" placeholder="H/M" class="input-100" value='<?php echo $gato["sexo"]; ?>' required>
            <input type="number" name="dni" placeholder="dni" class="input-48" value='<?php echo $gato["dni"]; ?>' required>
            <input type="number" name="edad" placeholder="edad" class="input-48" value='<?php echo $gato["edad"]; ?>' required>
            <input type="date" name="fechaAlta" placeholder="fecha de Alta" class="input-100" value='<?php echo $gato["fechaAlta"]; ?>' required>
            <img name="avatarActual" width=200px <?php if ($gato["foto"] != '' && file_exists("images/" . $gato["foto"])) {
                                                        echo "src='images/" . $gato['foto'] . "'";
                                                    } ?>><!-- Aquí tienes que cargar la imagen actual -->
            <input type="file" name="avatar" accept="image/png, image/jpeg" class="input-100">
            <input type="submit" value="Editar" class="btn-enviar">
            <div id="errores"><?php echo $error; ?></div>
        </div>
    </form>
</body>

</html>