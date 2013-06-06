Página html + Php que lê informações de um banco de dados e organiza as pessoas 
em uma hierarquia como se fosse árvore geneologica porém sem os irmãos e primos. 
Simplesmente precisa informar quem é o o cadastro atual vai ficar abaixo.

Cada pessoa tem dois associados sempre um a esquerda e um a direita.

SETUP

1. Create a mysql InnoDB engine database, i.e. arvorephp
2. Edit src/Arvore/Project.php static property $conn to set with your database server params
3. In project root run 'php vendor/bin/doctrine orm:schema-tool:create'
4. It's ready.