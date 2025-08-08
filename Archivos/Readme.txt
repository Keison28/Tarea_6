Proyecto Gestión de Personajes - Inspirado en One Piece

Descripción
Esta es una aplicación web desarrollada en PHP para gestionar personajes de la serie One Piece. Permite agregar, editar, eliminar y visualizar personajes, además de descargar sus perfiles en PDF.

---

Requisitos

- PHP 7.4 o superior
- Servidor web con soporte PHP (XAMPP, WAMP, MAMP, LAMP, etc.)
- Base de datos MySQL
- Composer (para gestionar dependencias como DomPDF)
- Navegador web moderno (Chrome, Firefox, Edge, etc.)

---

Instalación y Configuración

1. Clonar el repositorio  
   git clone https://github.com/tu_usuario/tu_repositorio.git

2. Configurar la base de datos  
   - Crear una base de datos llamada serie_db (o el nombre que hayas definido).  
   - Ejecutar el script SQL database.sql para crear la tabla personajes.  
   - Configurar las credenciales en el archivo db_config.php.

3. Instalar dependencias con Composer  
   En la raíz del proyecto, ejecutar:  
   composer install

4. Configurar servidor local  
   - Colocar el proyecto en la carpeta raíz del servidor web (htdocs para XAMPP, www para WAMP, etc.).  
   - Iniciar el servidor Apache y MySQL.

5. Abrir la aplicación  
   En el navegador, acceder a:  
   http://localhost/tu_carpeta_proyecto/index.php

---

Uso

- Navega con el menú superior para gestionar personajes o ver la sección "Acerca de".  
- Usa los formularios para agregar o editar personajes.  
- Puedes descargar el perfil de cada personaje en PDF desde la lista.

---

Librerías usadas

- Bootstrap 5 (https://getbootstrap.com/) para estilos y diseño responsive.  
- DomPDF (https://github.com/dompdf/dompdf) para generación de PDFs.

---

Autor

- Nombre completo: Tu Nombre  
- Matrícula: 123456789  
- Contacto: tu.email@dominio.com

---

Notas

- Asegúrate que la carpeta vendor/ y los archivos de Composer estén correctamente instalados.  
- Para soporte o dudas, contacta al autor.
