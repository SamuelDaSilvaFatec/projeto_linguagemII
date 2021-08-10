<?php 
    include "functions/functions.php";
    
    // -- Cria a sessão --
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if (contaValida($username, $password)) {
            registraConta($username);
            header("Location: index.php");
            exit;
        } 
        $mensagem = "Username ou Password incorreto!";
    }  
    include "layout/header.php";
?>
<script>
    document.title = "login";
</script>

<div class="login">
    <form method="POST">
        <span id="mensagem"><?=isset($mensagem)?$mensagem:"";?></span>
        <div class="form-group">
            <label for="username">Username:</label>
            <input class="campo" type="text" name="username" 
                maxlength="255" required autofocus
                value="<?=isset($username)?$username:"";?>">
        </div>
        <div class="form-group">
            <label for="password">Password:&nbsp;</label>
            <input class="campo" type="password" name="password" 
                value="<?=isset($password)?$password:"";?>"    
                maxlength="255" required>
        </div>
        <input type="submit" class="btn btn-success" value="Enviar">
        <input type="reset" class="btn btn-danger">
    </form>
</div>
<?php
    include "layout/footer.php";      
?>