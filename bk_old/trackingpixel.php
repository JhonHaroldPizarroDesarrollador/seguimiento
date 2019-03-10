<?php
session_start();
$sessionId = session_id();
//obtener la fecha y la hora
$timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
$datetimeFormat = 'Y-m-d H:i:s';
$date = new \DateTime();
$date->setTimestamp($timestamp);
$fecha = $date->format($datetimeFormat);
$connTime = $fecha;
//mensajes para el log
$dbConect = 'Conexion a la base de datos realizada! '.$connTime;
$textoSession = 'El ID de la session actual es: ';
$textoUser = 'El ID del usuario  actual es: ';
$textoSession = 'El ID de la sesssion  actual es: ';
$textoRefer = 'La direcci?n de la cual llego el usuario es: ';
$textoIpVisita = 'La direcci?n IP desde la cual está viendo la página actual el usuario es: ';
$textoHttpUserAgent = 'El navegador que esta usando el usuario es: ';
$textoCurrentPagina = 'La pagina actual o de aterrizaje es: ';
$textoReqTime = 'Inicio de Solicitud: ';
$textoFingerprint= 'El fingreprint del usuario es: ';
$textoUserDeviceId= 'El device ID del usuario es: ';
$dbInsert = 'Registro agregado a la base de datos exitosamente! '.$connTime;
// iniciar conexion a la base de datos
function start_connect(){
    $host = "localhost";
    $user = "seguimiento";
    $pass = "seguimiento";
    $bd = "seguimiento";
    return mysqli_connect($host,$user,$pass,$bd);
}
// cerrar conexion a la base de datos
function close_bd($con){
    return mysqli_close($con);
}
// iniciar traker
$con = start_connect();
if( $con ) {
    // crea log para validacion
    $info= $dbConect."\n";
    // crar log server file
    $file= 'tracker_log.csv';
    $fp = fopen($file, "a");
    fputs($fp, $info);
    fclose($fp);
    //  sql query
    $insertar = "INSERT INTO traking_records (
                                        user_id,
                                        session_id,
                                        fecha,
                                        ip,
                                        navegador,
                                        paginaRemitente,
                                        currentPage,
                                        fingerprint,
                                        navName,
                                        navVersion,
                                        deviceType,
                                        osName,
                                        country,
                                        city,
                                        latitud,
                                        longitud
                                        )
                VALUES(
                        '". $_GET["userId"] ."',
                        '". $sessionId ."',
                        '". $_GET["reqTime"] ."',
                        '". $_GET["ipVisita"] ."',
                        '". $_GET["httpUserAgente"] ."',
                        '". $_GET["refer"] ."',
                        '". $_GET["currentPage"] ."',
                        '". $_GET["fingerprintId"] ."',
                        '". $_GET["navName"] ."',
                        '". $_GET["navVersion"] ."',
                        '". $_GET["deviceType"] ."',
                        '". $_GET["osName"] ."',
                        '". $_GET["country"] ."',
                        '". $_GET["city"] ."',
                        '". $_GET["latitud"] ."',
                        '". $_GET["longitud"] ."'
                        )";
    $query = mysqli_query($con, $insertar);
    if( $query ) {
        //$retorno["estado"] = "OK";
        // get data for log 
        $info=$dbInsert.'","'
        .$id.'","'
        .$textoUser.$_GET["userId"].'","'
        .$textoSession.$id.'","'
        .$textoRefer.$_GET['refer'].'","'
        .$textoIpVisita.$_GET['ipVisita'].'","'
        .$textoHttpUserAgent.$_GET['httpUserAgente'].'","'
        .$textoCurrentPagina.$_GET['currentPage'].'","'
        .$textoFingerprint.$_GET["fingerprintId"].'","'
        //.$textoUserDeviceId.$_GET["userDeviceId"].'","'
        .$textoReqTime.$_GET['reqTime']."\n";
        // crea log para validacion
        $file= 'tracker_log.csv';
        $fp = fopen($file, "a");
        fputs($fp, $info);
        fclose($fp);
    }
    else {
        error_reporting(E_ALL); //to set the level of errors to log, E_ALL sets all warning, info , error
        ini_set("log_errors", true);
        ini_set("error_log", "error.log"); //send error log to log file specified here.
    }
    /*
    * Now, we pretend to be a graphic file that is a 1 pixel GIF.
    */
    header('Content-type: image/gif');
    /*
    * Instead of creating a graphic file, or reading one from disk, we just embed
    * the file as data, right into the script.
    */
    echo base64_decode('R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==');
    //Close BD Connection
   /* if( !close_bd($con) ) {
        $retorno["msg"] = "WARNING: Fallo al cerrar la conexion BDD";
    }*/
}
else {
    error_reporting(E_ALL); //to set the level of errors to log, E_ALL sets all warning, info , error
    ini_set("log_errors", true);
    ini_set("error_log", "error.log"); //send error log to log file specified here.
}
