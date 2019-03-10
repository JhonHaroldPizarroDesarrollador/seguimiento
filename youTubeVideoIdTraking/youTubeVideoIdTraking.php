<script>
    function videoTraking() {
        var linkUrl = document.getElementById("videoTraking").getAttribute("href");
        alert(linkUrl);
        function setCookie(cname,cvalue,exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
        function createCookie() {
            setCookie("linkUrl", linkUrl, 1);
            localStorage.setItem("linkUrl", linkUrl);
        }
        createCookie();
        return false;
    }
</script>
<?php 
    //CHECK URL LINK COOKIE
    if($_COOKIE["linkUrl"]){
        $linkUrl = $_COOKIE["linkUrl"];
    }else {
        $linkUrl = '';
    }
?>