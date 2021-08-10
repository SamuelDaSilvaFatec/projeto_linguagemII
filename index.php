<?php 
    include "functions/functions.php";
    validaSessao("login.php");
    include "layout/header.php";

    $gmtDate = gmdate("D, d M Y H:i:s");
    header ("Expires: {$gmaDate} GMT");
    header ("Last-Modified: {$gmtDate} GMT");
    header ("Cache-Control: no-store, no-cache, must-revalidate");
    header ("Cache-Control: post-check=0, pre-check=0", false);
    header ("Pragma: no-cache");

    //Conexão com o Banco de Dados
    include "DB/connect.php";
    //Tabela de produtos
    include "layout/produtos.php";

    include "layout/footer.php";    
?>