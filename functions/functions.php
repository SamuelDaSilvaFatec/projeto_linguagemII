<?php

    function contaValida($username, $password) {
        $link = mysqli_connect("localhost", "root", "", "projeto");

        $sql = "SELECT * FROM account WHERE username = '".$username."'
        AND password = MD5('$password')";

        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($result && $row) {
            return true;
        }

        return false;
    }

    function registraConta($username) {
        session_start();
        session_unset();

        $link = mysqli_connect("localhost", "root", "", "projeto");
        $sql = "SELECT * FROM account WHERE username = '".$username."'";

        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($result && $row) {
            $_SESSION["CONTA_ID"] = $row["id"];
            $_SESSION["carrinho"] = 0;
        }
    }

    function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ./login.php");
        exit;
    }

    function validaSessao($destino) {
        session_start();
        if (empty($_SESSION["CONTA_ID"])) {
            header("Location: ".$destino);
            exit;
        }
    }

    function adicionaCarrinho($id) {
        session_start();

        $_SESSION["prod".$id]++;
        $_SESSION["carrinho"]++;
    }

    function retiraCarrinho($id) {
        session_start();
        if ($_SESSION["carrinho"] > 0 && $_SESSION["prod".$id] > 0) { 
            $_SESSION["prod".$id]--;
            $_SESSION["carrinho"]--;
        }
    }
?>

    

   

  
