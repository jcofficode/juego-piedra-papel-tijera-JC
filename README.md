# ¡Piedra, Papel o Tijera! - Proyecto PHP

Una aplicación web interactiva desarrollada en **PHP** que permite a los usuarios registrarse, iniciar sesión y jugar al clásico **Piedra, Papel o Tijera**, guardando el historial de sus partidas de forma local.

## 🕹️ Características principales

* **Juego Interactivo:** Módulo central del juego donde el usuario compite contra el sistema (IA/RNG) con validación de jugadas en tiempo real.
* **Sistema de Autenticación:** Módulo seguro de inicio de sesión (`login.php`) y control de acceso para que cada jugador tenga su espacio.
* **Gestión de Sesiones:** Control del estado del jugador y mantenimiento de la sesión activa (`sesion.php`) durante las partidas.
* **Registro de Historial:** Almacenamiento local de los resultados, partidas jugadas o datos de usuarios en archivos de texto plano (`historial.txt` y `datos_obtenidos.txt`), funcionando como una base de datos ligera.
* **Interfaz Estilizada:** Diseño visual limpio y estructurado mediante CSS personalizado y normalizado (`normalize.css`).

## 🛠️ Tecnologías utilizadas

* **Backend:** PHP (Lógica del juego, manejo de sesiones y manipulación de archivos)
* **Frontend:** HTML5, CSS3
* **Persistencia:** Archivos planos (.txt)
