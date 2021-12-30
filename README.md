# Projeto para a disciplina de Linguagem de Programação II

## Especificações do Projeto


A aplicação as seguintes especificações

A área do usuário normal será na raiz da aplicação (por exemplo, /projeto). E a
área administrativa será em uma pasta dentro da raiz da aplicação (por exemplo,
/projeto/admin).

A área do usuário normal terá um sistema de busca simples de produtos e cada
produto terá a opção “Adicionar ao meu carrinho de compra”. Utilizar cookie para
gerenciar o carrinho de compra.
Em qualquer momento o usuário poderá ver o seu carrinho de compra, tendo a
opção de remover produtos ou de finalizar a compra. Ao finalizar a compra, remova
todos os produtos do carrinho de compras.

* admin
    - usar sessão para ter acesso a essa área 
    - adição
    - remoção 
    - atualização.
* projeto:
    - busca simples de produtos
    - cada produto terá a opção de adicionar ao carrinho de compras
    - utilizar cookies para gerenciar o carrinho
    - em qualquer momento o usuário poderá ter acesso ao seu carrinho,
    tendo a opção de remover produtos ou de finalizar a compra
    - ao finalizar a compra tenho que remover todos os produtos do carrinho

Nota: esse foi o primeiro projeto que fiz usando Bootstrap, a UI ficou simples.
Optei por utilizar o array superglobal $_SESSION para gerenciar o carrinho, essa primeira implementação 
é apenas um teste, uma primeira experiência com essas tecnologias.

20/jun/2021



