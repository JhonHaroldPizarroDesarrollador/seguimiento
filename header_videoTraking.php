<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'userId/analytics.php';?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="3w_fke8S2zQ6dtq9vJljVvrq1-0nvnp1DI-b3G1-L5c" />
    <?php 
        require 'youTubeVideoIdTraking/youTubeVideoIdTraking.php';
        require 'browser/isPrivateMode.php';
        require 'browser/getBrowser.php';
        require 'geolocation/geolocation.php';
        require 'fingerprint/fingerprint.php';
    ?>
    <?php
        if($_SERVER['PHP_SELF'] === '/seguimiento/blog/index.php'){ $titulo = 'Blog'; }
        else if($_SERVER['PHP_SELF'] === '/seguimiento/index.php'){  $titulo = 'Seguimiento'; }
        else if($_SERVER['PHP_SELF'] === '/seguimiento/link1/index.php'){  $titulo = 'Link 1'; }
        else if( $_SERVER['PHP_SELF'] === '/seguimiento/link2/index.php'){  $titulo = 'Link 2'; }
        else if($_SERVER['PHP_SELF'] === '/seguimiento/link3/index.php'){  $titulo = 'link 3'; }
        else if($_SERVER['PHP_SELF'] === '/seguimiento/resultados/index.php'){  $titulo = 'Resultados'; }
     ?>
    <title><?php echo $titulo; ?></title>
</head>
<body>