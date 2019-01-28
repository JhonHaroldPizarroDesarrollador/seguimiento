<script src="js/fingerprint2.js"></script>
<script>
////// finguerpint id //////////
if (window.requestIdleCallback) {
    requestIdleCallback(function () {
        Fingerprint2.get(function (components) {
            var values = components.map(function (component) { return component.value })
            var murmur=Fingerprint2.x64hash128(values.join(''), 31)
            //console.log(murmur);
            $fingerprintId = murmur;
            //console.log($fingerprintId);

            function setCookie(cname,cvalue,exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                var expires = "expires=" + d.toGMTString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }
            // function getCookie(cname) {
            //     var name = cname + "=";
            //     var decodedCookie = decodeURIComponent(document.cookie);
            //     var ca = decodedCookie.split(';');
            //     for(var i = 0; i < ca.length; i++) {
            //         var c = ca[i];
            //         while (c.charAt(0) == ' ') {
            //         c = c.substring(1);
            //         }
            //         if (c.indexOf(name) == 0) {
            //         return c.substring(name.length, c.length);
            //         }
            //     }
            //     return "";
            // }
            function createCookie() {
                setCookie("fp", $fingerprintId, 1);
                localStorage.setItem("fp", $fingerprintId);
            }
            // function checkCookie() {
            //     var fingerprintId=getCookie("fp");
            //     var local = localStorage.getItem("fp");
            //     if (fingerprintId != "") {
            //         alert("fingerprint: " + fingerprintId);
            //         alert("localStorage: " + local);
            //     } 
            //     else {
            //        createCookie();
            //     }
            // }
            createCookie();
            //checkCookie();
            
            
        })
    })
}
else {
    setTimeout(function () {
        Fingerprint2.get(function (components) {
            var values = components.map(function (component) { return component.value })
            var murmur=Fingerprint2.x64hash128(values.join(''), 31)
            //console.log(murmur);
            $fingerprintId = murmur;
            //console.log($fingerprintId);

            function setCookie(cname,cvalue,exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                var expires = "expires=" + d.toGMTString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }
            function getCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for(var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                    }
                }
                return "";
            }
            function createCookie() {
                setCookie("fp", $fingerprintId, 1);
                localStorage.setItem("fp", $fingerprintId);
            }
            function checkCookie() {
                var fingerprintId=getCookie("fp");
                var local = localStorage.getItem("fp");
                if (fingerprintId != "") {
                    alert("fingerprint: " + fingerprintId);
                    alert("localStorage: " + local);
                } 
                else {
                   createCookie();
                }
            }
            createCookie();
            //checkCookie();
            
            
        })
    }, 500)
} 
</script>