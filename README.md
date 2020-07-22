# CapBank Solução

### Instalação
```
git clone https://github.com/alexandhre/capbank.git
# Para instalar a api:
cd capbank/api-capbank

# instalar dependências
composer install

# rodar e atualizar o bando de dados
php artisan migrate:fresh

# limpeza de configurações de autoload do projeto
composer dump-autoload

# povoando banco de dados
php artisan db:seed

#gerar env e key do projeto
cp .env.example .env
php artisan key:generate

#excluir as configurações de DataBase do env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

# startando servidor
php artisan serve --port=88

# Para instalar a site em vuejs:
cd capbank/app-capbank
# instalar dependências
npm install

# startar projeto
npm run dev

```
### Requisitos
O que você precisa para executar este aplicativo:
* Composer version 1.10.1
* PHP ^7.1.3
* Laravel 5.7
* VueJs CLI 3

### Descrição
* Solução desenvolvida em Laravel 5.7  e VueJs utilizando e respeitando os padrões de cada framework e com as seguintes funcionalidades:
- Consultar Saldo e Extrato;
- Saque;
- Depósito;

Arquitetura baseada em serviços utilizando os componentes do laravel, aplicando orientação a objetos, utilizando também os componentes do VueJs, roteamento,
modularização dos componentes e respeitando o ciclo de vida dos mesmos.

### Autor
* Criado em  : 22/07/2020
* Autor  : Alexandre dos Santos Silva

