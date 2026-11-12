# 🏫 Sistema de Gestión Colegio

Proyecto web desarrollado en **PHP** y **MySQL** para gestionar profesores, estudiantes, asignaturas y grupos de un colegio.

## 🚀 Funcionalidades
- **Profesores:** Registro, consulta, actualización y eliminación.
- **Estudiantes:** Registro y asignación a grupos.
- **Asignaturas y Grupos:** Altas de materias y conformación de grupos.
- **Usuarios:** Sistema básico de login.

## 🛠️ Tecnologías
- HTML5, Bootstrap 5
- PHP
- MySQL

## ⚙️ Instalación
1. Clona este repositorio en tu servidor local (XAMPP, IIS, etc.).
2. Importa el archivo `.sql` de la base de datos en tu MySQL.
3. Crea un archivo `conecta.php` en la raíz con tus credenciales:
   ```php
   <?php
   $servername = "localhost";
   $username = "tu_usuario";
   $password = "tu_contraseña";
   $dbname = "colegio";
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   ?>


