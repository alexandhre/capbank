# CapBank Laravel 5.7

### Instalação
```
git clone https://github.com/alexandhre/capbank.git
cd capbank/api-capbank
composer install
php artisan migrate:fresh
composer dump-autoload
php artisan db:seed
cp .env.example .env
php artisan key:generate
* Excluir as configurações de DataBase do env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
php artisan serve --port=88
```
### Requisitos
O que você precisa para executar este aplicativo:
* Composer version 1.10.1
* PHP ^7.1.3
* Laravel 5.7

### Descrição
* Solução desenvolvida em Laravel 5.7 com o padrão de projeto MVC e possuindo os serguintes serviços:
- Consultar Saldo e Extrato ('/conta');
- Saque ('/conta');
- Depósito ('/conta/store');

Arquitetura baseada em serviços utilizando os componentes do laravel e aplicando orientação a objetos.

### Autor
* Criado em  : 22/07/2020
* Autor  : Alexandre dos Santos Silva

