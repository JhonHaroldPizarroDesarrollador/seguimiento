
<?php require 'header.php';?>
<center><h1>DATOS DE SEGUMIENTO</h1></center>
<p></p>
<?php 

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
        

        $seleccionar = "SELECT * FROM traking_records ORDER BY fecha ASC";
        $query = mysqli_query($con, $seleccionar);
  
        if( $query ) {
            $textoUser = 'El ID del usuario  es: ';
            $textoRefer = 'Direccion de la cual llego el usuario al enlace: ';
            $textoIpVisita = 'La dirección IP desde la cual visito el enlace: ';
            $textoHttpUserAgent = 'Navegador que uso el usuario: ';
            $textoCurrentPagina = 'La pagina actual es: ';
            $textoReqTime = 'Fecha de Solicitud: ';
            $textoFingerprint= 'Fingreprint del usuario: ';
            ?>
            <table width="100%" border="1" cellpadding="10">
                
                <thead>
                <th>ID</th>
                <th>FECHA</th>
                <th>IP</th>
                <th>NAVEGADOR</th>
                <th>URL DE ORIGEN</th>
                <th>FINGERPRINT</th>
                </thead>
                <tbody>
                
                <?php
                    while( $row = mysqli_fetch_array($query) ) {
                        echo '<tr><td>'.$row["user_id"].'</td><td>'.$row["fecha"].'</td><td>'.$row["dispositivo"].'</td><td>'.$row["navegador"].'</td><td>'.$row["paginaRemitente"].'</td><td>'.$row["fingerprint"].'</td></tr>';
                    }
                ?>
                
                </tbody>
            </table>
            <?php
        }
        else {
            error_reporting(E_ALL); //to set the level of errors to log, E_ALL sets all warning, info , error
            ini_set("log_errors", true);
            ini_set("error_log", "error.log"); //send error log to log file specified here.
        }

    }
    else {
        error_reporting(E_ALL); //to set the level of errors to log, E_ALL sets all warning, info , error
        ini_set("log_errors", true);
        ini_set("error_log", "error.log"); //send error log to log file specified here.
    }
?>
<?php require 'footer.php';?>