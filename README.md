# casfid
Laravel 11 - MariaDB - Phpmyadmin


mkdir -p db && docker-compose up -d

El contenedor de laravel se visualiza en http://localhost:83/

El contenedor de phpmyadmin se visualiza en http://localhost:89/ accediendo con host oncelar-db, usuario: oncelar, pass: 00000000

Configuracion acceso DB en file .env que se ingresa automaticamente desde el file entrypoint

DB_CONNECTION=mysql

DB_HOST=oncelar-db

DB_PORT=3310

DB_DATABASE=oncelar

DB_USERNAME=oncelar

DB_PASSWORD=00000000

COMANDOS CON PHP ARTISAN DENTRO DEL CONTENEDOR


docker exec -it oncelar bash
php artisan migrate --seed
