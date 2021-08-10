<?php
    $query = $conn->query("SELECT * from produtos ORDER BY id;");
    session_start();
    
    //le todas as linhas da tabela
    echo "
        <table class=\"table\">
        <thead>
            <tr>
                <th scope=\"col\">Cod.</th>
                <th scope=\"col\">Nome</th>
                <th scope=\"col\"> Opções</th>
                <th scope=\"col\">Qtd.</th>
            </tr>
        </thead>
        <tbody>
        ";

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION["prod_tot"]++;

        // Atribui 0 a todos os produtos apenas se o carrinho estiver vazio
        // Verifica se foi incluido um produto novo
        if ($_SESSION["carrinho"] == 0 || !isset($_SESSION["prod{$row['id']}"])) {
            $_SESSION["prod{$row['id']}"] = 0;
        }
        $_SESSION["nome{$row['id']}"] = $row['nome'];

        echo "  
            <tr>
                <th scope=\"row\">{$row['id']}</th>
                <td>{$row['nome']}</td>
                <td>
                <button  
                    type=\"button\" 
                    class=\"btn btn-success\"
                    onClick=\"javascript:adicionaCarrinho({$row['id']})\">
                Adicionar</button>
                <button 
                    type=\"button\" 
                    class=\"btn btn-danger\"
                    onClick=\"javascript:retiraCarrinho({$row['id']})\">
                Remover</button>
                </td>
                <td id=\"row{$row['id']}\">".$_SESSION["prod{$row['id']}"]."</td>
            </tr>
        ";        
    }
    echo "</tbody> </table>";
?>