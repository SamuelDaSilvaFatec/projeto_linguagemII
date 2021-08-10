<?php 
    include "../functions/functions.php";
    validaSessao("../login.php");
    include "../layout/header.php";
?>
    <script>
        document.title = "Admin";
        var home = document.getElementById("home");
        var admin = document.getElementById("admin");
        var login = document.getElementById("login");
        var logout = document.getElementById("logout");
        var carrinho = document.getElementById("carrinho");
        var icon_cart = document.getElementById("icon_cart");
        home.setAttribute("href", "../index.php");
        admin.setAttribute("href", "admin.php");
        login.setAttribute("href", "../login.php");
        logout.setAttribute("href", "../logout.php");
        carrinho.setAttribute("href", "../carrinho.php");
        icon_cart.setAttribute("src", "../assets/img/icon_car.ico");
    </script>    
<?php
    header ("Expires: on, 01 Jan 2000 00:00:00 GMT");
    header ("Cache-Control: no-store, no-cache, must-revalidate");
    header ("Cache-Control: post-check=0, pre-check=0", false);
    header ("Pragma: no-cache");

    include "DB/config/config.php";
    include "DB/connect.php";

    include "../includes/edit.php";


    include "../layout/footer.php";      
?>