
<?php require 'header.php';?>
<script>
(function(w,d,s,g,js,fs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
}(window,document,'script'));
</script>
<script>

gapi.analytics.ready(function() {

  /**
   * Authorize the user immediately if the user has already granted access.
   * If no access has been created, render an authorize button inside the
   * element with the ID "embed-api-auth-container".
   */
  gapi.analytics.auth.authorize({
    container: 'embed-api-auth-container',
    clientid: 'edbe87eaae956c3820dc13324fddd53c1353f9f1'
  });


  /**
   * Create a new ViewSelector instance to be rendered inside of an
   * element with the id "view-selector-container".
   */
  var viewSelector = new gapi.analytics.ViewSelector({
    container: 'view-selector-container'
  });

  // Render the view selector to the page.
  viewSelector.execute();


  /**
   * Create a new DataChart instance with the given query parameters
   * and Google chart options. It will be rendered inside an element
   * with the id "chart-container".
   */
  var dataChart = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:date',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'chart-container',
      type: 'LINE',
      options: {
        width: '100%'
      }
    }
  });


  /**
   * Render the dataChart on the page whenever a new view is selected.
   */
  viewSelector.on('change', function(ids) {
    dataChart.set({query: {ids: ids}}).execute();
  });

});
</script>
<center><h1>DATOS DE SEGUMIENTO</h1></center>
<p></p>
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
        // crea log para validacion
        

        $seleccionar = "SELECT *, count(*) FROM traking_records GROUP BY session_id, paginaRemitente, fingerprint ORDER BY fecha desc";
        $query = mysqli_query($con, $seleccionar);


  
        if( $query ) {
            ?>
            <table width="100%" border="1" cellpadding="10">
                
                <thead>
                <th>ID</th>
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
                        echo '<tr><td>'.$row["session_id"].'</td><td>'.$row["fecha"].'</td><td>'.$row["ip"].'</td><td>'.$row["navegador"].'</td><td>'.$row["paginaRemitente"].'</td><td>'.$row["currentPage"].'</td><td>'.$row["fingerprint"].'</td><td>'.$row["count(*)"].'</td></tr>';
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
        
        $seleccionar2 = "SELECT id, fingerprint, paginaRemitente, currentPage, count(*) FROM traking_records GROUP BY fingerprint, paginaRemitente, currentPage ORDER BY id ASC ";
        $query2 = mysqli_query($con, $seleccionar2);
        if( $query2 ) {
            ?>
            <br><br><br>
            <center><h1>RENDIMIENTO DEL INK</h1></center>
            <p></p>
            <table width="100%" border="1" cellpadding="10">
                
                <thead>
                <th>USER FP</th>
                <th>URL REMITENTE</th>
                <th>URL DE ATERRIZAJE</th>
                <th>VISITAS</th>
                </thead>
                <tbody>
                
                <?php
                    while( $row2 = mysqli_fetch_array($query2) ) {
                        echo '<tr><td>'.$row2["fingerprint"].'</td><td>'.$row2["paginaRemitente"].'</td><td>'.$row2["currentPage"].'</td><td>'.$row2["count(*)"].'</td></tr>';
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