<script>
    var ip = "<?php echo $ipVisita; ?>";
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