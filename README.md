# Sistema CRUD Laravel - Gestión de Clientes y Facturas

Este proyecto es una aplicación web desarrollada con **Laravel 12** para la gestión integral de clientes y sus facturas asociadas. La aplicación permite realizar operaciones CRUD completas, incluyendo la gestión de archivos multimedia y búsquedas dinámicas.

## 🚀 Características Principales

* **Gestión de Clientes**: Registro completo que incluye nombre, dirección, email, teléfono y logotipo.
* **Gestión de Facturas**: Emisión de facturas vinculadas a clientes existentes mediante relaciones de base de datos.
* **Búsqueda Avanzada**: Sistema de filtrado en tiempo real para localizar clientes por nombre/email y facturas por su identificador.
* **Gestión de Archivos**: Procesamiento de logotipos con almacenamiento en disco público y limpieza automática de archivos antiguos al actualizar o eliminar.
* **Paginación**: Listados optimizados que muestran 10 registros por página para mejorar el rendimiento.

## 🛠️ Requisitos del Sistema

* **PHP**: ^8.2
* **Framework**: Laravel 12.x
* **Gestor de Dependencias**: Composer
* **Frontend**: Vite para la compilación de assets

## 📦 Instalación y Configuración

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/Suidep/crudlaravel.git](https://github.com/Suidep/crudlaravel.git)
    cd crudlaravel
    ```

2.  **Instalar dependencias:**
    ```bash
    composer install
    npm install
    ```

3.  **Configurar el entorno:**
    * Crea una copia del archivo `.env.example` y nómbralo `.env`.
    * Configura los parámetros de tu base de datos en el archivo `.env`.
    * Genera la clave de la aplicación:
        ```bash
        php artisan key:generate
        ```

4.  **Base de Datos y Almacenamiento:**
    ```bash
    php artisan migrate
    php artisan storage:link
    ```

5.  **Ejecutar el proyecto:**
    ```bash
    npm run dev
    php artisan serve
    ```

## 📚 Documentación Técnica (phpDocumentor)

El proyecto utiliza **phpDocumentor** para la generación de documentación técnica. Para actualizarla o consultarla:

1.  Asegúrate de tener `phpDocumentor.phar` en la raíz del proyecto.
2.  Ejecuta el comando de generación:
    ```bash
    php phpDocumentor.phar -d app,routes -t public/docs
    ```
3.  Accede mediante el navegador a: `http://localhost:8000/docs/index.html`.

## 📁 Estructura Destacada

* **`app/Http/Controllers`**: Contiene la lógica de negocio para Clientes y Facturas.
* **`app/Models`**: Define las relaciones Eloquent (`HasMany` y `BelongsTo`) entre las entidades.
* **`resources/views`**: Plantillas Blade para la interfaz de usuario, organizadas por módulos.
* **`routes/web.php`**: Definición de todas las rutas de la aplicación.