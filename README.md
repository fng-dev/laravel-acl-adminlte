# laravel-acl-adminlte
Build Laravel 5.8 + ACL + AdminLTE

Este projeto tem como base, deixar uma build pronta, implementando os conceitos de niveis de acesso e tambem uma versão do painel de controle AdminLte. Pressupõe-se o minimo de conhecimento em laravel para utilização dessa build.


* Instalação:  
  1.O primeiro passo para instalar essa build, é criar um banco de dados com o nome de 'base', com a collation utf8mb4_unicode_ci  
  Caso quera trocar o nome do seu banco de dados, atualize o nome no arquivo .env do laravel.  
  2.A segunda coisa a se fazer, é informar o usuario, senha e endereço do seu banco de dados. Por padrão, ele esta configurado como:    
  
  DB_CONNECTION=mysql  
  DB_HOST=127.0.0.1  
  DB_PORT=3306  
  DB_DATABASE=base  
  DB_USERNAME=root  
  DB_PASSWORD=  
    
  Estas configurações também são feitas no arquivo .env  
  3.Dentro do projeto, tem uma pasta chamada sql. Exporte esse arquivo pra sua base de dados. Ele contem as tabelas necessarias para o funcioanmento do sistema de permissões.
   
* Utilização:  
  1. Dentro de arquivos .blade:  
  Em arquivos .blade, você pode usar a diretiva `@can('permissao')`. 
  2. Nos controllers:  
  Você pode usar o metodo authorize `$this->authorize('permissao)`.
  
    
    Ps: Estes são os exemplos mais simples.
    
* Configurações:  
 1. Todos os dados dos usuarios que vem confgurados podem ser alterados nos arquivos de seeds. As Roles e Permisions podem ser alteradas diretamente no painel.
 2.Após alterar os arquivos de seeds, basta simplesmente rodar um  
 `php artisan migrate:fresh --seed`  
 Isso vai recriar as tabelas com os novos dados.
