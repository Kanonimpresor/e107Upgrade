# 📢 e107 Alert System

#### (Choose your language below / Escolha o seu idioma abaixo / Elija su idioma abajo)
[![English](https://img.shields.io/badge/Language-English-blue)](README.md)
[![Português](https://img.shields.io/badge/Language-Português-green)](README.pt-PT.md)
[![Español](https://img.shields.io/badge/Language-Español-red)](README.es-ES.md)
---

## 🌟 Key Features
- Visual notification system
- Bootstrap 4/5 integration
- Cross-page persistence
- AJAX and JSON support
- Built-in internationalization
- Automatic error logging

## 🏗 Technical Structure

### 📦 Dependencies
- PHP: `eMessage` class (core)
- JavaScript: `e107Alert` (frontend)
- CSS: Bootstrap Alert styles + customizable

### 📂 File Structure
````
e107/
├── e107_handlers/
│ └── message_handler.php # Core class
├── e107_web/
│ └── js/bootstrap/ # Templates
├── e107_plugins/
│ └── myplugin/ # Plugin example
│ └── message.php # Custom handler
└── e107_config.php # Configuration
````

## 🎨 Alert Types (v2.3+)

| Type       | Constant            | CSS Class      | Recommended Use |
|------------|---------------------|---------------|----------------|
| Success    | `E_MESSAGE_SUCCESS` | `alert-success` | Successful operations |
| Error      | `E_MESSAGE_ERROR`   | `alert-danger`  | Critical failures |
| Warning    | `E_MESSAGE_WARNING` | `alert-warning` | Recoverable issues |
| Info       | `E_MESSAGE_INFO`    | `alert-info`    | General notices |
| Debug      | `E_MESSAGE_DEBUG`   | `alert-secondary` | Development only |

## 💻 Basic Usage

### PHP (Backend)
```php
// Simple message
e107::getMessage()->add("Settings saved", E_MESSAGE_SUCCESS);

// With LAN variables (i18n)
e107::getMessage()->add(LAN_MYPLUGIN_SAVED, E_MESSAGE_SUCCESS);

// Persistent message
e107::getMessage()->addSession("Profile updated", E_MESSAGE_INFO);

// With error logging
e107::getMessage()->addError("DB Error")->log();
```
### JavaScript (Frontend)
```php
// Basic
e107Alert.add('New message!', 'success');

// Advanced options
e107Alert.add({
  message: 'Load complete',
  type: 'info',
  duration: 10000, // 10 seconds
  dismissible: false
});
```
## ⚙ Advanced Configuration
1. Visual Customization
```php
// In theme.php
$MESSAGE_TEMPLATE = [
  'success' => '<div class="my-alert success">{ICON} {MESSAGE}</div>',
  'error'   => '<div class="my-alert error">{ICON} {MESSAGE}</div>'
];
```
2. Global Settings
```php
// e107_config.php
define('MESSAGE_STACK_DURATION', 8000); // 8 seconds
define('MESSAGE_STACK_LIMIT', 5);       // Max simultaneous alerts
```
3. For Plugins
```php
// myplugin/message.php
class myplugin_message extends eMessage
{
  public function customMethod() {
    // Custom logic
  }
}
```
# 🔍 Complete API
Core Methods
- add($message, $type, $unique) - Add message
- addSession() - Persist across pages
- render($type = null) - Get HTML
- reset($type) - Clear messages
- log() - Log to error_log

## Special Helpers

```php
// Debug message with context
e107::getMessage()->addDebug("Current state", $variables);

// Force immediate render
echo e107::getMessage()->render(E_MESSAGE_ERROR);
```

# 📚 Advanced Examples
AJAX + JSON
```php
// Controller
$response = [
  'status'  => 'error',
  'message' => e107::getMessage()->renderJson()
];
echo json_encode($response);
```
JavaScript (Frontend)
```php
fetch('/api/endpoint')
  .then(res => res.json())
  .then(data => {
    if(data.message) {
      e107Alert.renderJson(data.message);
    }
  });
```
# 🛠 Troubleshooting
- Issue: Alerts not persisting
- Solution: Verify PHP sessions are active

- Issue: CSS not applying
- Solution: Override classes in theme.css:

```css
.alert-success {
  background: var(--success-bg);
  border-color: var(--success-border);
}
```
```php
```
```php
```
