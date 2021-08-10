<?php
$op = $_POST["op"];
    
    if (isset($op)) {
        include "../DB/connect.php";

        extract($_POST);
        
        switch($op) {
            case 1:
                try {
                    $query = $conn->query("INSERT INTO produtos (nome) 
                        values ('$nome');");
                        
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
                break;
            case 2: 
                try {
                    $query = $conn->query("UPDATE produtos SET nome = '$novo_nome'
                        WHERE id = $id;");
                    $_SESSION["nome".$id] = $novo_nome;

                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
                break;
            case 3:
                try {
                    $query = $conn->query("DELETE FROM produtos where id = $id;");
                    if ($_SESSION["prod".$id] > 0) {
                        $_SESSION["carrinho"] -= $_SESSION["prod".$id];
                    }
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
                break;
        }
        $conn = null;
    } 	
?>
<div class="crud">
    <div class="forms">
        <h2>Inserir um novo produto</h2>
        <form action="admin.php" method="POST">
            <div class="form-group">
                <label for="resposta">Nome:</label>
                <input class="campo"type="textarea" name="nome" 
                maxlength="1000"required>
            </div>
            <input type="hidden" name="op" value="1">
            <input type="submit" class="btn btn-success" value="Create">
            <input type="reset" class="btn btn-danger">
        </form>
    </div>
    <hr>
    <div>
        <h2>Atualizar produto</h2>
        <form action="admin.php" method="POST">
            <div class="form-group">
                <label for="ID:">Código:</label>
                <input class="campo" type="textarea" name="id" 
                maxlength="1000" required>
            </div>
            <div class="form-group">
                <label for="ID:">Novo nome:</label>
                <input class="campo" type="textarea" name="novo_nome" 
                maxlength="1000" required>
            </div>
            <input type="hidden" name="op" value="2">
            <input type="submit" class="btn btn-success" value="Update">
            <input type="reset" class="btn btn-danger">
        </form>
    </div>
    <hr>
    <div>
        <h2>Deletar produto</h2>
        <form action="admin.php" method="POST">
            <div class="form-group">
                <label for="ID:">Código:</label>
                <input class="campo" type="textarea" name="id" 
                maxlength="3" required>
            </div>
            <input type="hidden" name="op" value="3">                
            <input type="submit" class="btn btn-success" value="Delete">
            <input type="reset" class="btn btn-danger" class="btn btn-primary btn-sm">
        </form>
    </div>
</div>