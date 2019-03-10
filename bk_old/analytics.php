<!-- Google Analytics -->
<script>
    var userEmail = "";
    //check if cookie userId exist
    function getCookie(name) {
        var dc = document.cookie;
        var prefix = name + "=";
        var begin = dc.indexOf("; " + prefix);
        if (begin == -1) {
            begin = dc.indexOf(prefix);
            if (begin != 0) return null;
        }
        else{
            begin += 2;
            var end = document.cookie.indexOf(";", begin);
            if (end == -1) {
                end = dc.length;
            }
        }
        // because unescape has been deprecated, replaced with decodeURI
        //return unescape(dc.substring(begin + prefix.length, end));
        return decodeURI(dc.substring(begin + prefix.length, end));
    }     
    function checkCookie() {
        var myCookie = getCookie("userId");
        if (myCookie == null) {
            userEmail = prompt("Ingresa tu correo");
            function setCookieID(cname,cvalue,exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                var expires = "expires=" + d.toGMTString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }
            function createIDCookie() {
                setCookieID("userId", userEmail, 1);
                localStorage.setItem("userId", userEmail);
            }
            createIDCookie();
        }
        else {
            userEmail = localStorage.getItem('userId');
        }
    }
    checkCookie();
    // Google Analytics -->
    console.log(localStorage.getItem('userId'));
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', {
        trackingId: 'UA-134988857-1',
        cookieDomain: 'auto',
        name: 'myTracker',
        userId: userEmail,
        alwaysSendReferrer: true,
        allowLinker: true
    });
    ga('send', 'pageview', {'sessionControl': 'start'});
    ga(function() {
        console.log('cookie ga:')
        // Logs the "myTracker" tracker object to the console.
        console.log(ga.getByName('myTracker'));
        console.log(ga.getByName('myTracker').get('name'));
        // Logs the client ID for the current user.
        console.log(ga.getByName('myTracker').get('clientId'));
        console.log(ga.getByName('myTracker').get('userId'));
        // Logs the URL of the referring site (if available).
        console.log(ga.getByName('myTracker').get('referrer'));
    });
    //console.log(ga.q);
    // End Google Analytics -->
</script>

<!-- Google Tag Manager -->
<script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PLQSFXJ');
</script>
<!-- End Google Tag Manager -->