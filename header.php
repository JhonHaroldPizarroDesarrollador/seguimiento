<?php
    session_start();
    //Dirección de la pagina (si la hay) que emplea el agente de usuario para la pagina actual
    if(isset($_SERVER['HTTP_REFERER'])) {
        $refer = $_SERVER['HTTP_REFERER'];
    }
    else {
        $refer = 'Url escrita por el usuario, no viene de otra web';
    }
    // La dirección IP desde la cual está viendo la página actual el usuario.
    $ipVisita = $_SERVER['REMOTE_ADDR']; 
    // Navegador
    $httpUserAgente = $_SERVER['HTTP_USER_AGENT']; 
    //El nombre del archivo ejecutándose actualmente
    $currentPage = $_SERVER['PHP_SELF']; 
    //El timestamp del inicio de la solicitud, con precisión microsegundo
    $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
    $datetimeFormat = 'Y-m-d H:i:s';
    $date = new \DateTime();
    $date->setTimestamp($timestamp);
    $fecha = $date->format($datetimeFormat);
    $reqTime = $fecha;
?>