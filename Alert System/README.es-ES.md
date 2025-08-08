# 📢 Sistema de Alertas de e107

El sistema de alertas en e107 es un mecanismo para mostrar mensajes de notificación al usuario a través de la interfaz. A continuación, realizaré un recorrido completo por su estructura y funcionamiento.

### Estructura Básica del Sistema de Alertas
El sistema de alertas en e107 se compone principalmente de:
- Clase eMessage: Ubicada en e107_handlers/message_handler.php, es el núcleo del sistema.
- Plantillas: Las alertas se muestran usando plantillas ubicadas en e107_web/js/bootstrap/.
- JavaScript: Utiliza Bootstrap para el renderizado visual.
-----
#### (Choose your language below / Escolha o seu idioma abaixo / Elija su idioma abajo)
[![English](https://img.shields.io/badge/Language-English-blue)](README.md)
[![Português](https://img.shields.io/badge/Language-Português-green)](README.pt-PT.md)
[![Español](https://img.shields.io/badge/Language-Español-red)](README.es-ES.md)
---

## 🌟 Características Principales
- Sistema de notificaciones visuales para usuarios
- Integración con Bootstrap 4/5
- Persistencia entre redirecciones
- Soporte para AJAX y respuestas JSON
- Internacionalización incorporada
- Registro automático de errores

## 🏗 Estructura Técnica

### 📦 Dependencias
- **PHP**: Clase `eMessage` (core)
- **JavaScript**: `e107Alert` (frontend)
- **CSS**: Bootstrap Alert styles + personalizables

### 📂 Estructura de Archivos

````
e107/
├── e107_handlers/
│ └── message_handler.php # Clase principal
├── e107_web/
│ └── js/bootstrap/ # Plantillas
├── e107_plugins/
│ └── myplugin/ # Ejemplo para plugins
│ └── message.php # Handler personalizado
└── e107_config.php # Configuración
````

## 🎨 Tipos de Alertas (v2.3+)

### e107 soporta varios tipos de alertas:

| Tipo        | Constante           | CSS Class         | Uso Recomendado          |  Colores                                  |
|-------------|---------------------|-------------------|--------------------------|-------------------------------------------|
| Éxito       | `E_MESSAGE_SUCCESS` | `alert-success`   | Operaciones exitosas     | (éxito, verde)                            |
| Error       | `E_MESSAGE_ERROR`   | `alert-danger`    | Fallos críticos          | (error, rojo)                             |
| Advertencia | `E_MESSAGE_WARNING` | `alert-warning`   | Problemas recuperables   | (advertencia, amarillo)                   |
| Información | `E_MESSAGE_INFO`    | `alert-info`      | Notificaciones generales | (información, azul)                       |
| Depuración  | `E_MESSAGE_DEBUG`   | `alert-secondary` | Solo desarrollo          | (depuración, solo visible en modo debug)  |

## Flujo de Funcionamiento
Registro del mensaje: Se crea el mensaje con add().

- Almacenamiento: Los mensajes se guardan en la sesión PHP si es necesario persistirlos.
- Renderizado: Durante la generación de la página, los mensajes se convierten a HTML.
- Mostrar al usuario: El JavaScript los muestra usando las clases de Bootstrap.

## Desactivación de Alertas
Las alertas se pueden desactivar de varias formas:

1. Automáticamente
- Después de mostrarse (configurable por tiempo)
- Cuando el usuario hace clic en la "X" para cerrarlas

2. Programáticamente
```php
// Limpiar todos los mensajes
e107::getMessage()->reset();

// Limpiar un tipo específico
e107::getMessage()->reset(E_MESSAGE_ERROR);
```

## 💻 Uso Básico

### PHP (Backend)
```php
// Mensaje simple
e107::getMessage()->add("Configuración guardada", E_MESSAGE_SUCCESS);

// Con variables LAN (i18n)
e107::getMessage()->add(LAN_MYPLUGIN_SAVED, E_MESSAGE_SUCCESS);

// Mensaje persistente
e107::getMessage()->addSession("Perfil actualizado", E_MESSAGE_INFO);

// Con registro en log
e107::getMessage()->addError("Error DB")->log();

-----------------------

e107::getMessage()->add("Este es un mensaje de éxito", E_MESSAGE_SUCCESS);
e107::getMessage()->add("Este es un mensaje de error", E_MESSAGE_ERROR);
e107::getMessage()->add("Este es un mensaje de advertencia", E_MESSAGE_WARNING);
e107::getMessage()->add("Este es un mensaje de información", E_MESSAGE_INFO);
```

### JavaScript (Frontend)
```php
// Básico
e107Alert.add('¡Nuevo mensaje!', 'success');

// Opciones avanzadas
e107Alert.add({
  message: 'Carga completa',
  type: 'info',
  duration: 10000, // 10 segundos
  dismissible: false
});
```
## ⚙ Configuración Avanzada

### 1. Personalización Visual
```php
// En tu theme.php
$MESSAGE_TEMPLATE = [
  'success' => '<div class="my-alert success">{ICON} {MESSAGE}</div>',
  'error'   => '<div class="my-alert error">{ICON} {MESSAGE}</div>'
];
```

### 2. Configuración Global

- En e107_config.php:
```php
// e107_config.php
define('MESSAGE_STACK_DURATION', 8000); // 8 segundos
define('MESSAGE_STACK_LIMIT', 5);       // Máx. alertas simultáneas

-----------------------

define('MESSAGE_STACK', true); // Habilitar/deshabilitar el sistema
define('MESSAGE_STACK_DURATION', 5000); // Duración en milisegundos
define('MESSAGE_STACK_ANIMATION', 'fade'); // fade/slide
```

### 3. Para Plugins
```php
// myplugin/message.php
class myplugin_message extends eMessage
{
  public function customMethod() {
    // Lógica personalizada
  }
}

-----------------------

// En tu controlador o plugin
function myFunction() {
    $mes = e107::getMessage();
    
    try {
        // Lógica que puede fallar
        $mes->add("Operación exitosa", E_MESSAGE_SUCCESS);
    } catch (Exception $e) {
        $mes->add("Error: ".$e->getMessage(), E_MESSAGE_ERROR);
    }
    
    // Mensaje persistente entre redirecciones
    $mes->addSession("Este mensaje sobrevivirá a una redirección", E_MESSAGE_INFO);
    
    // Mensaje con HTML
    $mes->add("<strong>Importante</strong>: Mensaje con formato", E_MESSAGE_WARNING, false);
}
```

### 4. Extender la clase eMessage
Puedes crear tu propio manejador extendiendo la clase base:
```php
class myMessageHandler extends eMessage {
    public function add($message, $type = E_MESSAGE_INFO, $unique = true) {
        // Lógica personalizada
        parent::add($message, $type, $unique);
    }
}
```

## 🔍 API Completa
### Métodos Principales

- `add($message, $type, $unique) - Añadir mensaje`
- `addSession() - Persistir entre páginas`
- `render($type = null) - Obtener HTML`
- `reset($type) - Limpiar mensajes`
- `log() - Registrar en error_log`

### Helpers Especiales
```php
// Mensaje con contexto de depuración
e107::getMessage()->addDebug("Estado actual", $variables);

// Forzar renderizado inmediato
echo e107::getMessage()->render(E_MESSAGE_ERROR);
```
## 📚 Ejemplos Avanzados
### AJAX + JSON

```php
// Controlador
$response = [
  'status'  => 'error',
  'message' => e107::getMessage()->renderJson()
];
echo json_encode($response);
```

## JavaScript (Frontend)
```php
// Mostrar alerta
e107Alert.add('¡Nuevo mensaje!', 'success');

// Alertas después de AJAX
fetch('/api/endpoint')
  .then(response => response.json())
  .then(data => {
    if(data.error) {
      e107Alert.add(data.message, 'error');
    } else {
      e107Alert.add(data.message, 'success');
    }
  });
```

## 🛠 Personalización del Sistema de Alertas

### 1. Cambiar estilos CSS

Puedes sobrescribir las clases CSS en tu tema, ej:

```css
/* Alertas personalizadas */
.alert-success {
  background: var(--success-bg);
  border-color: var(--success-border);
}

.alert-success {
    background-color: #yourcolor;
    border-color: #yourcolor;
}

.alert-success {
  background-color: #4CAF50;
  border-left: 5px solid #2E7D32;
  border-radius: 0;
}

.alert-error {
  background-color: #FF5252;
  color: white;
}
```
### 2. Modificar plantillas

Las plantillas están en e107_web/js/bootstrap/
- Copia e107_web/js/bootstrap/alert-default.html a tu tema y modifícalo:
```html
<div class="alert alert-{TYPE} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <i class="fa {ICON}"></i> {MESSAGE}
</div>
```


## Consideraciones Avanzadas
Mensajes en AJAX: Para operaciones AJAX, puedes devolver mensajes como JSON y mostrarlos en el frontend.

- Logging: Los mensajes de error pueden configurarse para que también se registren en el log del sistema.
- Traducciones: Los mensajes soportan LANs para internacionalización.
- Depuración: En modo debug, los mensajes incluyen información adicional como traza de llamadas.

El sistema de alertas de e107 es altamente configurable y se integra bien con el resto del framework, proporcionando una experiencia consistente para la notificación de usuarios.
