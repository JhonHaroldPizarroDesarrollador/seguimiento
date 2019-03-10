
<?php require 'header.php';?>


<?php 

    function start_connect(){
        $host = "localhost";
        $user = "seguimiento";
        $pass = "seguimiento";
        $bd = "seguimiento";

        return mysqli_connect($host,$user,$pass,$bd);
    }

    function close_bd($con){
        return mysqli_close($con);
    }

    $con = start_connect();
    if( $con ) {


        $seleccionar3 = "SELECT id, user_id, fecha, count(*) FROM traking_records GROUP BY user_id ORDER BY user_id, fecha ASC ";
        $query3 = mysqli_query($con, $seleccionar3);
        if( $query3 ) {
            ?>
            <br><br><br>
            <center><h1>EXPLORADOR DE USUARIOS</h1></center>
            <p></p>
            <table width="100%" border="1" cellpadding="10">
                
                <thead>
                <th>USER ID</th>
                <th>SESIONES</th>
                </thead>
                <tbody>
                
                <?php
                    while( $row3 = mysqli_fetch_array($query3) ) {
                        echo '<tr><td>'.$row3["user_id"].'</td><td>'.$row3["count(*)"].'</td></tr>';
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

        $seleccionar2 = "SELECT id, user_id, session_id, fecha, fingerprint, currentPage, deviceType, count(*) FROM traking_records GROUP BY user_id, deviceType, currentPage  ORDER BY user_id, fecha ASC ";
        $query2 = mysqli_query($con, $seleccionar2);
        if( $query2 ) {
            ?>
            <br><br><br>
            <center><h1>RENDIMIENTO DEL LINK EN DIF. DISPOSITIVOS</h1></center>
            <p></p>
            <table width="100%" border="1" cellpadding="10">
                
                <thead>
                <th>USER ID</th>
                <th>SESSION ID</th>
                <th>FINGERPRINT</th>
                <th>DEVICE TYPE</th>
                <th>URL DE ATERRIZAJE</th>                
                <th>VISITAS</th>
                </thead>
                <tbody>
                
                <?php
                    while( $row2 = mysqli_fetch_array($query2) ) {
                        echo '<tr><td>'.$row2["user_id"].'</td><td>'.$row2["session_id"].'</td><td>'.$row2["fingerprint"].'</td><td>'.$row2["deviceType"].'</td><td>'.$row2["currentPage"].'</td><td>'.$row2["count(*)"].'</td></tr>';
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

        $seleccionar = "SELECT *, count(*) FROM traking_records GROUP BY user_id, currentPage, fingerprint ORDER BY fecha ASC";
        $query = mysqli_query($con, $seleccionar);
        if( $query ) {
            ?>
            <center><h1>DATOS DE SEGUMIENTO</h1></center>
            <p></p>
            <table width="100%" border="1" cellpadding="10">
                
                <thead>
                <th>USER_ID</th>
                <th>FECHA</th>
                <th>IP</th>
                <th>NAVEGADOR</th>
                <th>URL DE ORIGEN</th>
                <th>URL DE ATERRIZAJE</th>
                <th>FINGERPRINT</th>
                <th>VISITAS</th>
                </thead>
                <tbody>
                
                <?php
                    while( $row = mysqli_fetch_array($query) ) {
                        echo '<tr><td>'.$row["user_id"].'</td><td>'.$row["fecha"].'</td><td>'.$row["ip"].'</td><td>'.$row["navegador"].'</td><td>'.$row["paginaRemitente"].'</td><td>'.$row["currentPage"].'</td><td>'.$row["fingerprint"].'</td><td>'.$row["count(*)"].'</td></tr>';
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