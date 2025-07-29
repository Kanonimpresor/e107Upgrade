# Documentación del Tema LandingZero2 para e107

Este documento detalla la estructura, lógica de programación y configuración del tema LandingZero2.

## 1. Análisis Inicial (theme.xml)

El archivo `theme.xml` es el manifiesto del tema y define sus características y dependencias principales.

### 1.1. Dependencias

- **Framework CSS:** Bootstrap 3
- **Iconos:** FontAwesome 4

> **Nota Importante:** El tema está construido sobre Bootstrap 3. La validación y migración a Bootstrap 5 requerirá una refactorización significativa del código HTML y CSS.

### 1.2. Layouts (Diseños de Página)

El tema define 5 layouts para diferentes secciones del sitio:

- `homepage`: Un diseño especializado para la página de inicio, usualmente con el video de fondo.
- `full`: Diseño de ancho completo, sin barras laterales.
- `sidebar_right`: Contenido principal con una barra lateral a la derecha (usado por defecto para el sistema de noticias).
- `sidebar_left`: Contenido principal con una barra lateral a la izquierda.
- `3columns`: Un diseño con tres columnas.

### 1.3. Hojas de Estilo y Personalización

- Ofrece múltiples esquemas de color que se pueden seleccionar desde la configuración del tema (Default, Orange, Nightvision).
- Incluye `themePrefs` para configurar dinámicamente aspectos como el video de fondo y el ancho de los contenedores principales.

---

## 2. Lógica de Programación (theme.php)

El archivo `theme.php` es el cerebro del tema. Contiene la clase principal que controla cómo se carga el tema y cómo se renderizan los elementos.

### 2.1. Inicialización y Carga de Recursos

- **Desactivación del CSS Core:** El tema utiliza `define("CORE_CSS", false);` para deshabilitar las hojas de estilo por defecto de e107, tomando control total sobre el diseño.
- **Carga Modular:** La función `init()` organiza la carga de todos los recursos necesarios:
    - CSS (`e107.css`, estilos de Bootstrap, FontAwesome y del propio tema).
    - JavaScript (jQuery, Bootstrap.js y scripts personalizados).
    - Fuentes (locales o desde Google Fonts, configurable).
    - Iconos.

### 2.2. Motor de Renderizado (`tablestyle`)

La función `tablestyle()` es una de las más importantes en un tema de e107. Actúa como un motor de renderizado que dibuja diferentes tipos de bloques de contenido (menús, formularios, mensajes de bienvenida, etc.).

- **Estilos Personalizados:** Define estilos visuales únicos para elementos como los formularios de login (`singleform`) o los menús en las barras laterales.
- **Basado en Bootstrap 3:** Utiliza la estructura de `panel`, `panel-heading` y `panel-body` de Bootstrap 3 para renderizar la mayoría de los bloques, lo cual es un punto clave a considerar para la migración.

---

## 3. Funciones Aplicadas en el Frontend (theme_shortcodes.php)

Este archivo dota al tema de una gran flexibilidad y funcionalidades dinámicas a través de shortcodes personalizados.

### 3.1. Shortcodes Principales

- **`{HEADER}` y `{FOOTER}`**: Cargan dinámicamente el contenido de los archivos `headers/header_default.html` y `footers/footer_default.html`, permitiendo una estructura de plantillas modular.
- **`{THEME_MASTERHEAD}`**: Muestra una cabecera de gran impacto. Tiene una lógica de fallback: si el plugin `masthead` no está instalado, muestra una cabecera predefinida con un video de fondo.
- **`{LZ_VIDBG_FALLBACK}`**: Gestiona el fondo de video, mostrando una imagen estática en dispositivos móviles para mejorar el rendimiento y la experiencia de usuario.
- **`{NAVBAR_BRANDING}`**: Permite cambiar entre un logo de imagen o de texto en la barra de navegación, según la configuración del tema.
- **`{LZ_SUBSCRIBE}`**: Renderiza un formulario de suscripción a un boletín de noticias.
- **`{THEME_PREF: name=...}`**: Un shortcode muy potente que permite insertar el valor de cualquier preferencia del tema directamente en los archivos `.html`. Esto se usa, por ejemplo, para cambiar las clases de `container` a `container-fluid` desde el panel de administración.

---

## 4. Estructura HTML (theme.html y Módulos)

El tema utiliza una arquitectura de "micro-plantillas" muy eficiente y profesional.

### 4.1. El Esqueleto (`theme.html`)

El archivo `theme.html` no contiene la estructura HTML completa. En su lugar, actúa como un esqueleto simple que define tres áreas principales:

- **`{---HEADER---}`**: Un marcador de posición donde se inyectará la cabecera.
- **`{---LAYOUT---}`**: El área de contenido principal, gestionada por el sistema de layouts de e107.
- **`{---FOOTER---}`**: Un marcador de posición donde se inyectará el pie de página.

### 4.2. Módulos de Cabecera y Pie de Página

La verdadera estructura se encuentra en archivos separados, cargados por los shortcodes `{HEADER}` y `{FOOTER}`:

- `headers/header_default.html`: Contiene la barra de navegación principal.
- `footers/footer_default.html`: Contiene las áreas de widgets del pie de página, enlaces sociales y copyright.

### 4.3. Análisis de la Cabecera (`headers/header_default.html`)

Este archivo contiene una barra de navegación estándar de Bootstrap 3. Es un punto clave para la futura migración a Bootstrap 5.

- **Shortcodes Utilizados:** `{THEME_PREF}`, `{NAVBAR_BRANDING}`, `{NAVIGATION=main}`, `{NAVIGATION=alt}` y `{SIGNIN}`.
- **Clases de Bootstrap 3 a Migrar:**
  - `navbar-default` -> Reemplazar con nuevas clases de estilo de navbar.
  - `navbar-fixed-top` -> `fixed-top`.
  - `navbar-toggle` y `.icon-bar` -> Reemplazar con la estructura de `.navbar-toggler`.
  - `navbar-right` -> Usar clases de utilidad como `ms-auto`.
  - `data-toggle` -> `data-bs-toggle`.

### 4.4. Análisis del Pie de Página (`footers/footer_default.html`)

El pie de página es una sección rica en funcionalidades que también depende en gran medida de Bootstrap 3.

- **Shortcodes Utilizados:** `{THEME_PREF}`, `{NAVIGATION=footer}`, `{NAVIGATION=alt5}`, `{LZ_SUBSCRIBE}`, `{XURL_ICONS}`, `{SITEDISCLAIMER}` y `{ABOUTMODAL}`.
- **Estructura y Clases de Bootstrap 3 a Migrar:**
  - **Sistema de Rejilla:** Utiliza `col-xs-*` y `col-sm-*`. Debe ser actualizado a la nueva sintaxis de Bootstrap 5.
  - **Componente Modal:** Incluye un modal para una galería de imágenes (`#galleryModal`) con la estructura y atributos de Bootstrap 3 (`data-dismiss`). Necesitará ser completamente reescrito para Bootstrap 5.
  - **Clases de Utilidad:** `pull-right` y `text-right` deben ser reemplazadas por `float-end` y `text-end`.

---

## 5. Áreas de Administración y Configuración (theme_config.php)

El archivo `theme_config.php` define el panel de opciones del tema en el área de administración de e107. La configuración es modular y se divide en opciones principales y sub-páginas.

### 5.1. Opciones Principales

- **Branding:** Permite elegir el formato del logo en la barra de navegación (solo texto, solo imagen, o ambos).
- **Fuentes:** Da la opción de cargar las fuentes desde los archivos locales del tema o desde un CDN externo para optimizar la velocidad. También permite cargar subconjuntos de caracteres.

### 5.2. Configuraciones Extendidas (Sub-páginas)

El tema enlaza a paneles de configuración adicionales para funcionalidades más complejas:

- **Custom CSS:** Una página dedicada para que el administrador pueda añadir código CSS personalizado de forma segura.
- **Masthead:** Un panel para configurar la cabecera principal. Esta sección depende del plugin `masthead` y el tema comprueba si está instalado, guiando al administrador en caso de que falte.

---
*Análisis y documentación completados. El tema está ahora completamente analizado y traducido, listo para la Fase 2: Migración a Bootstrap 5.*
