# Instrucciones para correr la aplicación

1. Clonar el proyecto: <code>git clone https://github.com/krloz1003/api.easybroker.git</code>
2. Ingresar a la carpeta del proyecto: <code>cd api.easybroker</code>
3. Preparar el archivo de variables entorno: <code>cp .env.example .env</code> 
4. Descargar dependencias: <code>composer update</code>
5. Crear llave cifrado: <code>php artisan key:generate</code>
6. Iniciar el servidor de pruebas: <code>php artisan serve</code>
7. En el navegador Ingresamos a la ruta: http://localhost:8000/

#### Ejecutar pruebas unitarias

1. Ingresar a la carpeta del proyecto: <code>cd api.easybroker</code>
2. Ejecutar el comando: <code>php artisan test --filter PropertiesTest</code>