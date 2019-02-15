<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="3w_fke8S2zQ6dtq9vJljVvrq1-0nvnp1DI-b3G1-L5c" />
    <title>Document</title>
</head>
<body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script type="application/javascript" type async src="https://www.googletagmanager.com/gtag/js?id=UA-134040334-1"></script>
<script type="application/javascript"  src="https://apis.google.com/js/api.js"></script>
<script type="application/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-134040334-1');
  gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.

    // Google Analytics -->
    var length = 9;
    var $USER_ID = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, length);
    console.log($USER_ID);
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', {
    trackingId: 'UA-134040334-1',
    cookieDomain: 'auto',
    name: 'myTracker',
    userId: $USER_ID
    });
    ga('send', 'pageview');
    console.log(ga.q);
    // End Google Analytics -->
  ////// VALIDATE IS PRIVATE BROWSER MODE  /////
    function isPrivateMode() {
        return new Promise((resolve) => {
            const on = () => resolve(true); // is in private mode
            const off = () => resolve(false); // not private mode
            const testLocalStorage = () => {
                try {
                    if (localStorage.length) off();
                    else {
                    localStorage.x = 1;
                    localStorage.removeItem('x');
                    off();
                    }
                } 
                catch (e) {
                    // Safari only enables cookie in private mode
                    // if cookie is disabled, then all client side storage is disabled
                    // if all client side storage is disabled, then there is no point
                    // in using private mode
                    navigator.cookieEnabled ? on() : off();
                }
            };
            // Chrome & Opera
            if (window.webkitRequestFileSystem) {
                return void window.webkitRequestFileSystem(0, 0, off, on);
            }
            // Firefox
            if ('MozAppearance' in document.documentElement.style) {
                if (indexedDB === null) return on();
                const db = indexedDB.open('test');
                db.onerror = on;
                db.onsuccess = off;
                return void 0;
            }
            // Safari
            const isSafari = navigator.userAgent.match(/Version\/([0-9\._]+).*Safari/);
            if (isSafari) {
                const version = parseInt(isSafari[1], 10);
                if (version < 11) return testLocalStorage();
                try {
                    window.openDatabase(null, null, null, null);
                    return off();
                } 
                catch (_) {
                    return on();
                };
            }
            // IE10+ & Edge InPrivate
            if (!window.indexedDB && (window.PointerEvent || window.MSPointerEvent)) {
                return on();
            }
            // default navigation mode
            return off();
        });
    }
    var $incognito='';
    var $modo='';
    isPrivateMode().then((inPrivate) => {
        console.log('is in private mode: ', inPrivate);
        if (inPrivate == true){
            $incognito='Modo Incognito'
        }else{
            $incognito=''
        }
        function setCookies(cname,cvalue,exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
        function createIncognitoCookie() {
            setCookies("inc", $incognito, 1);
            localStorage.setItem("inc", $incognito);
        }
        createIncognitoCookie();
    });
</script>
<?php
    session_start();
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
    function getBrowser() { 
        $u_agent = $_SERVER['HTTP_USER_AGENT']; 
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?    
        if (preg_match('/Android/i', $u_agent)) {
            $platform = 'Android';
        }
        elseif (preg_match('/linux/i', $u_agent)) {
            $platform = 'Linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'Mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'Windows';
        }
        
        // Next get the name of the useragent yes seperately and for good reason  Edge  Trident
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
        {
            $bname = 'Internet Explorer'; 
            $ub = "MSIE"; 
        }
        elseif(preg_match('/Trident/i',$u_agent)) 
        { 
            $bname = 'Microsoft Explorer'; 
            $ub = "rv";
        }
        elseif(preg_match('/Edge/i',$u_agent)) 
        { 
            $bname = 'Microsoft Edge'; 
            $ub = "Edge"; 
        }
        elseif(preg_match('/Firefox/i',$u_agent)) 
        { 
            $bname = 'Mozilla Firefox'; 
            $ub = "Firefox"; 
        }
        elseif(preg_match('/OPR/i',$u_agent)) 
        { 
            $bname = 'Opera'; 
            $ub = "OPR"; 
        }
        elseif(preg_match('/Chrome/i',$u_agent)) 
        {
            $bname = 'Google Chrome'; 
            $ub = "Chrome"; 
        }
        elseif(preg_match('/Safari/i',$u_agent)) 
        { 
            $bname = 'Apple Safari'; 
            $ub = "Safari"; 
        }
        elseif(preg_match('/Netscape/i',$u_agent)) 
        { 
            $bname = 'Netscape'; 
            $ub = "Netscape"; 
        }
        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }
        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }
        // check if we have a number
        if ($version==null || $version=="") {$version="?";}
        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    }
    $ua=getBrowser();
    $yourbrowser= $ua['name'] . " " . $ua['version'] . " " . $inc . " on " . $ua['platform'];
    $httpUserAgente = $yourbrowser;

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
<?php require 'fingerprint.php';?>
