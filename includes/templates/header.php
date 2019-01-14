<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Johann Pando - Analista Programador Full Stack</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    <!--Añadimos el reseteo de css, fuentes e íconos-->
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
       integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
       crossorigin=""/>
    <link rel="stylesheet" href="css/style.css">

    <?php
      $archivo = basename($_SERVER['PHP_SELF']);
      $pagina = str_replace(".php", "", $archivo);
    ?>

</head>

<body class="<?php echo $pagina; ?>">

    <header class="site-header">
      <div class="barra">
        <nav>
            <a href="index.php">Inicio</a>
            <a href="sobremi.php">Acerca de mí</a>
            <a href="contacto.php">Contacto</a>
        </nav>
      </div>
    </header>
