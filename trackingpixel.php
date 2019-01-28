<?php
session_start();

if (! isset($_SESSION['user'])) {

    $_SESSION['user'] = rand(1, 9999999);

}

$timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
$datetimeFormat = 'Y-m-d H:i:s';
$date = new \DateTime();
$date->setTimestamp($timestamp);
$fecha = $date->format($datetimeFormat);
$connTime = $fecha;

$dbConect = 'Conexion a la base de datos realizada! '.$connTime;
$textoSession = 'El ID de la session actual es: ';
$textoUser = 'El ID del usuario actual es: ';
$textoRefer = 'La direccion de la cual llego el usuario es: ';
$textoIpVisita = 'La dirección IP desde la cual está viendo la página actual el usuario es: ';
$textoHttpUserAgent = 'El navegador que esta usando el usuario es: ';
$textoCurrentPagina = 'La pagina actual es: ';
$textoReqTime = 'Inicio de Solicitud: ';
$textoFingerprint= 'El fingreprint del usuario es: ';
$dbInsert = 'Registro agregado a la base de datos exitosamente! '.$connTime;



function start_connect(){
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $bd = "seguimiento";

    return mysqli_connect($host,$user,$pass,$bd);
}

function close_bd($con){
    return mysqli_close($con);
}

$con = start_connect();
if( $con ) {
    // crea log para validacion
    $info= $dbConect."\n";

    $file= 'tracker_log.csv';
    $fp = fopen($file, "a");
    fputs($fp, $info);
    fclose($fp);


    $insertar = "INSERT INTO traking_records (
                                        user_id,
                                        fecha,
                                        dispositivo,
                                        navegador,
                                        paginaRemitente,
                                        fingerprint
                                        )
                VALUES(
                        '". $_SESSION['user'] ."',
                        '". $_GET["reqTime"] ."',
                        '". $_GET["ipVisita"] ."',
                        '". $_GET["httpUserAgente"] ."',
                        '". $_GET["refer"] ."',
                        '". $_GET["fingerprintId"] ."'
                        )";
    $query = mysqli_query($con, $insertar);

    if( $query ) {
        //$retorno["estado"] = "OK";

        // crea log para validacion
        $info=$dbInsert.'","'
        .session_id().'","'
        .$textoUser.$_SESSION['user'].'","'
        .$textoRefer.$_GET['refer'].'","'
        .$textoIpVisita.$_GET['ipVisita'].'","'
        .$textoHttpUserAgent.$_GET['httpUserAgente'].'","'
        .$textoCurrentPagina.$_GET['currentPage'].'","'
        .$textoFingerprint.$_GET["fingerprintId"].'","'
        .$textoReqTime.$_GET['reqTime']."\n";

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