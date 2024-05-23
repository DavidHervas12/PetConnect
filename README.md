# PetConnect CRM

<p align="center">
  <img src="logo.png" alt="Logo" width="140" height="140">
</p>

<p align="center">
  <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/License-MIT-red.svg" alt="License: MIT"></a>
  <a href="https://github.com/Florida2DAM/pfc-23-24-DavidHervas12/tag/v1.0.0"><img src="https://img.shields.io/badge/Version-1.0.0-green.svg" alt="Version"></a>
  <a href="mailto:david.hervas456@gmail.com"><img src="https://img.shields.io/badge/Email-david.hervas456@gmail.com-blue" alt="Email"></a>
  <a href="https://github.com/DavidHervas12"><img src="https://img.shields.io/badge/GitHub-DavidHervas12-blue.svg" alt="GitHub"></a>
</p>

## Descripción

Mi proyecto consiste en la creación de una aplicación web CRM, que ofrezca ayuda a las protectoras de animales a la hora de gestionar eficientemente las relaciones con sus clientes a través de una interfaz sencilla e intuitiva. Ofrece una plataforma centralizada para el seguimiento, administración y almacenamiento de contactos, listas, animales y adopciones.   

Las características principales de mi aplicación son las siguientes: la gestión de contactos permite el registro y almacenamiento de información detallada sobre donantes, voluntarios, adoptantes potenciales, veterinarios y otras personas importantes, así como el almacenamiento de contactos en listas para una mayor organización y segmentación. El registro de animales proporciona un registro detallado de animales en el refugio, incluyendo información sobre su nombre, tipo, peso, edad, estado de salud, etc. Además, se incluye el registro de solicitudes de adopción y el seguimiento del proceso de adopción.   

Mi idea es proporcionar una mayor eficiencia mediante la centralización de los datos y procesos relacionados con la gestión de la protectora de animales. Otra ventaja es la mejora organizativa mediante el seguimiento de animales y contactos. Finalmente, un gran avance en la transparencia proporcionando información detallada sobre las adopciones.

## Tecnologías Utilizadas

- **Frontend**: Laravel Blade, html, tailwind css
- **Backend**: Laravel, php
- **Base de Datos**: MySQL
- **Despliegue**: Railway

## Instalación

1. Clona el repositorio:
    ```bash
    git clone https://github.com/Florida2DAM/pfc-23-24-DavidHervas12.git
    ```
2. Cambia a la rama `src` (donde está el código de la aplicación):
    ```bash
    git checkout src
    ```
3. Instala las dependencias de PHP usando Composer:
    ```bash
    composer install
    ```
4. Instala las dependencias de Node.js:
    ```bash
    npm install
    ```
5. Crea una base de datos MySQL con el nombre petconnect.

6. Cambia los datos de la base de datos en el .env:
    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=petconnect
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7. Ejecuta las migraciones:
    ```bash
    php artisan migrate:fresh
    ```
    
8. Rellena la base de datos
    ```bash
    php artisan db:seed
    ```

## Uso

1. Inicia el servidor backend:
    ```bash
    php artisan serve
    ```
    
2. Compila los assets del frontend:
    ```bash
    npm run dev
    ```

La aplicación estará disponible en `http://localhost:8000`.

## Usuario de prueba

| Email              | Contraseña   |
|--------------------|--------------|
| dhervas456@gmail.com | 12345678   |
