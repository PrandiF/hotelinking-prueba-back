# Backend

Este proyecto es un backend construido con Laravel para la gestión de ofertas y códigos promocionales. A continuación se muestran las instrucciones para configurar el proyecto localmente, configurar la base de datos y sembrarlo con los datos iniciales.

## Requisitos

- **PHP** >= 8.0
- **Composer** (Dependency management)
- **MySQL** (Database)
- **Git** (to clone the repository)

## Instalación

### 1. Clonar el repositorio

Clona el repositorio en tu máquina:

````bash
git clone https://github.com/PrandiF/hotelinking-prueba-back.git
cd hotelinking-prueba-back


### 2. Instalar dependencias

Si tu proyecto incluye dependencias de front-end (por ejemplo, para assets o front-end compilado), asegúrate de ejecutar ambos comandos:

```bash
composer install
npm install

### 3. Configurar archivo .env

Duplica el archivo `.env.example` y renómbralo a `.env`:

```bash
cp .env.example .env

### Luego, configura la base de datos en el archivo .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hoteliking_db
DB_USERNAME=root
DB_PASSWORD=DbP@ssw0rd123!

### 4. Crear database

CREATE DATABASE hoteliking_db;

### 5. Correr las migraciones, para crear las tablas necesarias

php artisan migrate

### 6. Seedear la database con data inicial

php artisan db:seed --class=OfferSeeder

### 7. Correr el servidor localmente

php artisan serve

## Esto iniciará el servidor en http://localhost:8000 o http://127.0.0.1:8000

### Problemas comunes

Si tienes problemas de permisos, intenta ejecutar:

```bash
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache









````
