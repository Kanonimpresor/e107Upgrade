# El Rol de `sitedown_template.php`

#### (Choose your language below / Escolha o seu idioma abaixo / Elija su idioma abajo)
[![English](https://img.shields.io/badge/Language-English-blue)](README.md)
[![Português](https://img.shields.io/badge/Language-Português-green)](README.pt-PT.md)
[![Español](https://img.shields.io/badge/Language-Español-red)](README.es-ES.md)
---

Cuando tu sitio necesita una pausa para actualizaciones o mantenimiento, `sitedown_template.php` se convierte en el rostro público de tu web. Es el guardián que informa a los visitantes que estás trabajando en segundo plano y que volverás pronto, manteniendo siempre una imagen profesional.

### Funcionalidad Clave

-   **Punto de Entrada para Mantenimiento**: Es el archivo que e107 ejecuta automáticamente cuando el sitio se pone en "Modo Mantenimiento" desde el panel de administración.
-   **Respuesta HTTP 503**: Envía una cabecera de respuesta `503 Service Unavailable`. Esto es crucial para el SEO, ya que le indica a los motores de búsqueda como Google que la inaccesibilidad es temporal y que no deben eliminar tus páginas de su índice.
-   **Acceso para Administradores**: Permite que el Administrador Principal (ID de usuario 1) siga viendo y navegando por el sitio web con normalidad, lo que facilita la realización de pruebas y ajustes en tiempo real.
-   **Entorno de Carga Mínimo**: Opera en un modo especial donde solo se carga una parte mínima del núcleo de e107. Esto tiene una implicación importante:
    -   **La carga de archivos externos (CSS/JS) puede fallar.** Como descubrimos, enlazar una hoja de estilos externa (`sitedown.css`) puede no funcionar. La solución más robusta es incrustar el CSS directamente en el archivo de la plantilla usando etiquetas `<style>`.
    -   **Disponibilidad de Shortcodes limitada.** No todos los shortcodes funcionan como se espera. Es necesario probarlos; por ejemplo, `{THEME}` puede funcionar mientras que `{THEME_PATH}` no, o viceversa, dependiendo de la configuración del servidor.

### Personalización y Plantillas

La apariencia de la página de mantenimiento se controla a través de una plantilla específica ubicada en el directorio de tu tema:

-   **`templates/sitedown_template.php`**: Este archivo contiene toda la estructura HTML y la lógica para mostrar el mensaje de mantenimiento. Aquí es donde se define el diseño, se inserta el logo, el texto y los enlaces a redes sociales.

Para nuestra implementación, creamos un diseño moderno y responsivo con una imagen de fondo a pantalla completa y una caja de contenido con efecto "glassmorphism" (desenfoque de fondo). Todo el CSS se incrustó directamente en `sitedown_template.php` para garantizar su carga y funcionalidad.

**Resumen:** `sitedown_template.php` es más que una simple página de "sitio caído". Es una herramienta de comunicación esencial y una pieza técnica que, si se configura correctamente, protege tu SEO y mantiene una imagen profesional incluso durante las tareas de mantenimiento.

# Gestionar el Modo Mantenimiento
Sigue estos pasos para controlar la página de mantenimiento de tu sitio web desde el panel de administración.

## 1. Activar el Modo Mantenimiento
Cuando necesites realizar actualizaciones o cambios importantes, activa el modo mantenimiento para mostrar una página informativa a tus visitantes.

1. Navega a tu Panel de Administración: Inicia sesión como administrador.
2. Ve a Herramientas: En el menú de administración, busca y haz clic en Herramientas (Tools).
3. Accede a Mantenimiento: Dentro de Herramientas, selecciona la opción Mantenimiento (Maintenance).
4. Activa la casilla: Marca la casilla que dice "Activar modo mantenimiento" (Activate maintenance mode).
5. Guarda los cambios: Haz clic en el botón "Guardar Configuración" (Save Settings). Tu sitio estará ahora en modo mantenimiento.

## 2. Editar el Mensaje de Mantenimiento
Puedes personalizar el texto que ven tus usuarios en la página de mantenimiento.

1. Permanece en la página de Mantenimiento (Herramientas > Mantenimiento).
2. Busca el área de texto: Localiza el campo de texto grande, normalmente etiquetado como "Texto de mantenimiento" (Maintenance Text).
3. Escribe tu mensaje: Introduce el texto que deseas mostrar. Puedes usar código HTML para dar formato, añadir enlaces o imágenes.
4. Guarda los cambios: Haz clic en "Guardar Configuración" para actualizar el mensaje.

## 3. Desactivar el Modo Mantenimiento
Una vez que hayas terminado tu trabajo, sigue estos pasos para que tu sitio vuelva a estar online.

1. Vuelve a Herramientas > Mantenimiento.
2. Desactiva la casilla: Desmarca la casilla "Activar modo mantenimiento".
3. Guarda los cambios: Haz clic en "Guardar Configuración". Tu sitio web será visible para todos los usuarios de nuevo.

> Nota Importante: Como Administrador Principal (ID de usuario 1), siempre verás el sitio web completo, incluso en modo mantenimiento. Para ver la página de mantenimiento tal como la ven tus visitantes, utiliza un navegador diferente donde no hayas iniciado sesión o abre una ventana de incógnito/privada.
