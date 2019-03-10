<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'userId/analytics.php';?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="3w_fke8S2zQ6dtq9vJljVvrq1-0nvnp1DI-b3G1-L5c" />
    <title>Document</title>
    <?php require 'browser/isPrivateMode.php';?>
    <?php
        //Dirección de la pagina (si la hay) que emplea el agente de usuario para la pagina actual
        if(isset($_SERVER['HTTP_REFERER'])) {
            $refer = $_SERVER['HTTP_REFERER'];
        }
        else {
            $refer = '_blank';
        }
        // La dirección IP desde la cual está viendo la página actual el usuario.
        $ipVisita = $_SERVER['REMOTE_ADDR']; 
        $inc = $_COOKIE['inc'];
        // Navegador
    ?>
    <?php require 'browser/getBrowser.php';?>
    <?php
        //El nombre del archivo ejecutándose actualmente
        $currentPage = $_SERVER['PHP_SELF']; 
        //El timestamp del inicio de la solicitud, con precisión microsegundo
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $datetimeFormat = 'Y-m-d H:i:s';
        $date = new \DateTime();
        $date->setTimestamp($timestamp);
        $fecha = $date->format($datetimeFormat);
        $reqTime = $fecha;
        $navName = $ua['name'];
        $navVersion = $ua['version'];
    ?>
    <script>
        var ip = "<?php echo $ip ?>";
        fetch("https://cors-anywhere.herokuapp.com/http://www.geoplugin.net/json.gp?ip="+ip).then(response => {
            return response.json();
        }).then(data => {
            function setCookie(cname,cvalue,exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                var expires = "expires=" + d.toGMTString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }
            function createCountryCookie() {
                setCookie("country", data.geoplugin_countryName, 1);
                localStorage.setItem("country", data.geoplugin_countryName);
            }
            createCountryCookie();

            function createCityCookie() {
                setCookie("city", data.geoplugin_city, 1);
                localStorage.setItem("city", data.geoplugin_city);
            }
            createCityCookie();

            function createLatitudCookie() {
                setCookie("latitud", data.geoplugin_latitude, 1);
                localStorage.setItem("latitud", data.geoplugin_latitude);
            }
            createLatitudCookie();

            function createLongitudCookie() {
                setCookie("longitud", data.geoplugin_longitude, 1);
                localStorage.setItem("longitud", data.geoplugin_longitude);
            }
            createLongitudCookie();

            //alert("Hello visitor from "+ data.geoplugin_countryName + " - " +data.geoplugin_city + " - " +data.geoplugin_longitude + " - " +data.geoplugin_latitude);
            //console.log(data.geoplugin_countryName);
            //console.log(data);
        }).catch(err => {
            // Do something for an error here
        });
    </script>
    <?php require 'fingerprint/fingerprint.php';?>
    <?php
        $ip = $_SERVER['REMOTE_ADDR']; // This will contain the ip of the request
    ?>
    <?php 
        // $indicesServer = array('PHP_SELF', 
        // 'argv', 
        // 'argc', 
        // 'GATEWAY_INTERFACE', 
        // 'SERVER_ADDR', 
        // 'SERVER_NAME', 
        // 'SERVER_SOFTWARE', 
        // 'SERVER_PROTOCOL', 
        // 'REQUEST_METHOD', 
        // 'REQUEST_TIME', 
        // 'REQUEST_TIME_FLOAT', 
        // 'QUERY_STRING', 
        // 'DOCUMENT_ROOT', 
        // 'HTTP_ACCEPT', 
        // 'HTTP_ACCEPT_CHARSET', 
        // 'HTTP_ACCEPT_ENCODING', 
        // 'HTTP_ACCEPT_LANGUAGE', 
        // 'HTTP_CONNECTION', 
        // 'HTTP_HOST', 
        // 'HTTP_REFERER', 
        // 'HTTP_USER_AGENT', 
        // 'HTTPS', 
        // 'REMOTE_ADDR', 
        // 'REMOTE_HOST', 
        // 'REMOTE_PORT', 
        // 'REMOTE_USER', 
        // 'REDIRECT_REMOTE_USER', 
        // 'SCRIPT_FILENAME', 
        // 'SERVER_ADMIN', 
        // 'SERVER_PORT', 
        // 'SERVER_SIGNATURE', 
        // 'PATH_TRANSLATED', 
        // 'SCRIPT_NAME', 
        // 'REQUEST_URI', 
        // 'PHP_AUTH_DIGEST', 
        // 'PHP_AUTH_USER', 
        // 'PHP_AUTH_PW', 
        // 'AUTH_TYPE', 
        // 'PATH_INFO', 
        // 'ORIG_PATH_INFO') ; 

        // echo '<table cellpadding="10">' ; 
        // foreach ($indicesServer as $arg) { 
        //     if (isset($_SERVER[$arg])) { 
        //         echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ; 
        //     } 
        //     else { 
        //         echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ; 
        //     } 
        // } 
        // echo '</table>' ; 
    ?>    
</head>
<body>
