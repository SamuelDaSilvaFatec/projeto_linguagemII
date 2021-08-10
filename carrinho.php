<?php
    include "functions/functions.php";
    validaSessao("login.php");
    include "DB/connect.php";
    session_start();

    //--- Operações de adição e remoção de produtos ---
    if ($_SERVER["REQUEST_METHOD"] == 'GET' && $_GET["_id"] && $_GET["op"]) {
        $id = $_GET["_id"];
        $op = $_GET["op"];

        if ($id && $op) {
            ($op == 1) ? adicionaCarrinho($id) : '';
            ($op == 2) ? retiraCarrinho($id) : '';
        }
        exit;
    }
    // -- Operações de esvaziar carrinho e finalizar compra
    if (($_GET["op"] == 3 ||  $_GET["op"] == 4) && $_SESSION["carrinho"] > 0) {
        $query = $conn->query("SELECT * from produtos ORDER BY id;");

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) { 
            if ($_SESSION["prod{$row['id']}"] > 0) {
                $_SESSION["prod{$row['id']}"] = 0;
            }
        }
        $_SESSION["carrinho"] = 0;
        if ($_GET["op"] == 4) {
            echo "<script> window.alert(\"Muito Obrigado!\") </script>";
        } 
    } 
?>

<script> 
    // -- Muda o titulo da página
    document.title = "Cart";
</script>

<?php
    // -- Topo da paǵina, com o menu de navegação
    include "layout/header.php";

    //session_start();
    
    echo "
        <table class=\"table\">
        <thead>
            <tr>
                <th scope=\"col\">Produtos</th>
                <th scope=\"col\">Qtd.</th>
            </tr>
        </thead>
        <tbody>
    ";

    // -- Verifica se o carrinho contém algum produto
    if ($_SESSION["carrinho"] > 0) {
        include "DB/connect.php";
        $query = $conn->query("SELECT * from produtos ORDER BY id;");

        // -- Imprime o nome e quantidade de produtos no carrinho 
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) { 
            if ($_SESSION["prod{$row['id']}"] > 0) {
                echo "  
                    <tr>
                        <td>".$_SESSION["nome{$row['id']}"]."</td>
                        <td id=\"{$row['id']}\">".$_SESSION["prod{$row['id']}"]."</td>
                    </tr>
                ";
            }
        }
    } else {
        echo "
            <tr>
                <td>Carrinho Vazio!</td>
            </tr>
        ";
    }
    echo "</tbody> </table>";
?>

    <!-- Opções do carrinho -->
    <a href="carrinho.php?op=3">
        <button type="button" class="btn btn-danger">
        Esvaziar Carrinho</button>
    </a>
    <a href="index.php">
        <button type="button" class="btn btn-primary" onClick="">
        Continuar comprando</button>
    </a>
    <a href="carrinho.php?op=4">
        <button type="button" class="btn btn-success">
        Finalizar Compra</button>
    </a>

<?php
    include "layout/footer.php";
?>