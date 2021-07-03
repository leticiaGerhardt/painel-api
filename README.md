# Painel Administrativo

Este é um projeto para testes e estudo do funcionamento de um painel adminstrativo.

Deverá oferecer uma API Rest para os seguintes recursos:

* Cadastro de estados, cidades e bairros

## Requisitos
* PHP 8.0.*
* Composer 2.*
* MySQL 8.0.*

## Instalação

1) Criar um banco de dados.
``CREATE DATABASE lg_panel CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;``

2)Após clonar o repositório, criar um arquivo ```.env``` e preenchê-lo com 
as configurações do ambiente.

```cp .env.example .env```

3) Instalar as dependências do composer.

```composer install```

4) Gerar uma chave e colocar no ``APP_KEY=`` do arquivo ```.env```

```php artisan key:generate```

5) Rodar as migrations e seeds
```
php artisan migrate
php artisan db:seed
```

6) Ir até a pasta ```public``` e levantar o servidor

```
cd public
php -S localhost:8000
```

## Repositórios

* [https://github.com/leticiagerhardt/painel-api](https://github.com/leticiagerhardt/painel-api)

## Changelog

#### 2021-07-02 v0.1.0
* Instalação do lumen
* Migrations de states, cities e ditricts
* Seeders de states, cities e districts  
* Models de State, City e District

