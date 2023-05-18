##Descargar repo y correr en consola dentro del proyecto
composer install
##Crear base de datos api_rate_limiting
agregar credenciales de la conexion de DB en el archivo .env

##Generar apikey
php artisan key:generate

##Generar migraciones
php artisan migrate --seed

##Levantar servidor
php artisan serve

