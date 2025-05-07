# INSTALAÇÃO DO TEMPLATE
## Premissas
1. O instalador global do laravel já deve estart instalado no ambiente de desenvolvimento
- https://laravel.com/docs/12.x/installation

## INSTALAÇÃO
1. Clonar o projeto
```sh
git clone git@gitlab.com:zamed/zmd-admin-template.git
```
2. Atualizar os pacotes do composer
```sh
composer update
```
3. Instalar o pacote do sail
```sh
composer require laravel/sail --dev
```
3.1. Configurar o .env
```php
APP_NAME="ZAMED SAUDELOG"
APP_URL=http://seudominio.local.br
APP_TIMEZONE=America/Sao_Paulo

DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=zamed
DB_USERNAME=sail
DB_PASSWORD=password
```
3.2. Instalar o sail
```sh
php artisan sail:install
Which services would you like to install?
[x] pgsql
[x] redis
[x] minio
```
4. Gerar a chave da aplicação
```sh
php artisan key:generate
```
5. Subir a aplicação
```sh
sail up -d
```
6. Rodar a instalação dos pacotes javascript
```sh
sail npm install
```
7. Rodar o run dev
```sh
sail npm run dev
