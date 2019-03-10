<script>
(function() {
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
})();
</script>