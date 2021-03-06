<?php
    //obtener la direccion de referencia es decir la pagina donde esta colgado el enlace
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
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
            $bname = 'Internet Explorer'; 
            $ub = "MSIE"; 
        }
        elseif(preg_match('/Trident/i',$u_agent)) { 
            $bname = 'Microsoft Explorer'; 
            $ub = "rv";
        }
        elseif(preg_match('/Edge/i',$u_agent)) { 
            $bname = 'Microsoft Edge'; 
            $ub = "Edge"; 
        }
        elseif(preg_match('/Firefox/i',$u_agent)) { 
            $bname = 'Mozilla Firefox'; 
            $ub = "Firefox"; 
        }
        elseif(preg_match('/OPR/i',$u_agent)) { 
            $bname = 'Opera'; 
            $ub = "OPR"; 
        }
        elseif(preg_match('/Chrome/i',$u_agent)){
            $bname = 'Google Chrome'; 
            $ub = "Chrome"; 
        }
        elseif(preg_match('/Safari/i',$u_agent)) { 
            $bname = 'Apple Safari'; 
            $ub = "Safari"; 
        }
        elseif(preg_match('/Netscape/i',$u_agent)) { 
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