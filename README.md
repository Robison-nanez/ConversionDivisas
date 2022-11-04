Paso a paso

Requerimientos del sistema
php 7.3 o superior
composer
npm

1. Descargar el proyecto en formato zip o clonar el repositorio.
2. Realizar una copia del archivo .env.example con el nombre .env.
3. Crear la bases de datos en mysql o postgres.
4. Configurar la bases de datos con el usuario y contraseña en el archivo .env 
    congfirar la conexin y el puerto si escogieron postgres que esta en la carpeta
    config - databases.
5. Abrir la consola y ejecutar el siguiente comando:
    composer install
6. En la consola ejecutar el siguiente comando:
    php artisan key:generate
7. En la consola ejecutar el siguiente comando:
    php artisan migrate --seed
8. En la consola ejecutar el siguiente comando:
    npm install
9. Despues de realizar las configuraciones anteriores en la consola ejecutar el siguiente comando: 
    php artisan serv

    Nos inicializara el proyecto con el host 127.0.0.1:8000
10. Ingresar al navegador de preferencia google chrome y colocar la ruta que nos brinda el servidor.
11. Dirigirse en la parte superior derecha donde dice login e ingresar las siguientes credenciales:
    Usuario: admin@admin.com
    Constraseña: Admin1234
