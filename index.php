<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/botonera.css">
    <title>Gatos</title>
</head>

<body>
    <nav>
        <ul>
            <li><a class="active" href="index.php">Página principal</a></li>
            <li><a href="create.php">Nuevo gato</a></li>
            <li><a href="list.php">Lista gatos</a></li>
            <li><a href="import.php">Importar gatos</a></li>
            <li><a href="export.php">Exportar gatos</a></li>

        </ul>
    </nav>
    <h1>Adopción de gatos</h1>
    <p>
    <h3>Sociedad Protectora de Animales de ALLLIFE</h3>
    Trabajamos desde el año 1971 con el objetivo de acoger, amparar y promover la adopción de los animales abandonados. Gestionamos centros de acogida con una filosofía proteccionista, luchamos por la vida de los animales y trabajamos día tras día para evitar su sufrimiento. Nuestra tarea también es divulgativa: concienciamos a la sociedad sobre la tenencia responsable de los animales de compañía, sobre los derechos de los animales, sobre los beneficios de la adopción y sobre una buena convivencia entre los animales y los ciudadanos.<br>
    

    <h4>Actividades principales</h4>
    <ul>
        <li><b>Recogida y acogida de animales perdidos y abandonados (*)</b><br>En los centros de acogida que gestionamos, ofrecemos bienestar y atención veterinaria a los animales hasta que son adoptados.
        </li>
        <li><b>Gestión de colonias de gatos callejeros</b><br>Esterilizamos, alimentamos y nos ocupamos de la higiene y del control sanitario de los gatos callejeros de las colonias que controlamos.
        </li>
        <li><b>Fomento de la adopción</b><br>Que los animales sean adoptados es nuestra prioridad. Trabajamos para divulgar y dar a conocer a los animales de los refugios, y ayudamos a los animales que lo tienen más dificil mediante campañas específicas que faciliten su adopción.</li>
        <li><b>Sensibilización</b><br>Acercamos a la ciudadanía la realidad del abandono de los animales de compañía y la necesidad de tenerlos de manera responsable.</p>
        </li>
    </ul>
<h4>Campos de la base de datos:</h4>
    <ul>
        <li>Id</li>
        <li>Nombre</li>
        <li>DNI</li>
        <li>Edad</li>
        <li>Sexo</li>
        <li>Raza</li>
        <li>Fecha de Alta</li>
        <li>Foto</li>
    </ul>

    <h4>Funcionalidades:</h4>
    <ul>
        <li>Dar de baja a un gato.</li>
        <li>Dar de alta a un gato.</li>
        <li>actualizar los datos de un gato.</li>
        <li>Obtener los datos de un gato en concreto.</li>
        <li>Obtener los datos de todos los gatos.</li>
        <li>importar datos de gatos de un fichero csv en nuestra base de datos.</li>
    </ul>

    <h4>Funcionalidades extra implementadas:</h4>
    <ul>
        <li>Los iconos de las columnas borrar, detalles e editar de la tabla, cambiados.</li>
        <li>Los formularios validados de forma segura.</li>
        <li>La funcionalidad de exportar los datos de la base de datos en un fichero csv con formato csv obligatoriamente, realizada.</li>
        <li>Si un registro no tiene foto o su foto no existe por alguna razón en la carpeta del proyecto, nos muestra la imagen: noimage.</li>
        <li>Css adaptado a los formularios export e import.</li>
    </ul>

</body>

</html>