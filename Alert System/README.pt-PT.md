# 📢 Sistema de Alertas do e107

#### (Choose your language below / Escolha o seu idioma abaixo / Elija su idioma abajo)
[![English](https://img.shields.io/badge/Language-English-blue)](README.md)
[![Português](https://img.shields.io/badge/Language-Português-green)](README.pt-PT.md)
[![Español](https://img.shields.io/badge/Language-Español-red)](README.es-ES.md)
---

## 🌟 Características Principais
- Sistema de notificações visuais
- Integração com Bootstrap 4/5
- Persistência entre páginas
- Suporte para AJAX e JSON
- Internacionalização incorporada
- Registo automático de erros

## 🏗 Estrutura Técnica

### 📦 Dependências
- PHP: Classe `eMessage` (core)
- JavaScript: `e107Alert` (frontend)
- CSS: Estilos Bootstrap + personalizáveis

### 📂 Estrutura de Ficheiros

```
e107/
├── e107_handlers/
│ └── message_handler.php # Classe principal
├── e107_web/
│ └── js/bootstrap/ # Templates
├── e107_plugins/
│ └── myplugin/ # Exemplo para plugins
│ └── message.php # Handler personalizado
└── e107_config.php # Configuração
```
```php

## 🎨 Tipos de Alertas (v2.3+)

| Tipo        | Constante           | Classe CSS     | Uso Recomendado |
|-------------|---------------------|---------------|----------------|
| Sucesso     | `E_MESSAGE_SUCCESS` | `alert-success` | Operações bem-sucedidas |
| Erro        | `E_MESSAGE_ERROR`   | `alert-danger`  | Falhas críticas |
| Aviso       | `E_MESSAGE_WARNING` | `alert-warning` | Problemas recuperáveis |
| Informação  | `E_MESSAGE_INFO`    | `alert-info`    | Notificações gerais |
| Depuração   | `E_MESSAGE_DEBUG`   | `alert-secondary` | Apenas desenvolvimento |

## 💻 Utilização Básica

### PHP (Backend)
```php
// Mensagem simples
e107::getMessage()->add("Configuração guardada", E_MESSAGE_SUCCESS);

// Com variáveis LAN (i18n)
e107::getMessage()->add(LAN_MYPLUGIN_SAVED, E_MESSAGE_SUCCESS);

// Mensagem persistente
e107::getMessage()->addSession("Perfil atualizado", E_MESSAGE_INFO);

// Com registo no log
e107::getMessage()->addError("Erro DB")->log();
```
## JavaScript (Frontend)
```php
// Básico
e107Alert.add('Nova mensagem!', 'success');

// Opções avançadas
e107Alert.add({
  message: 'Carregamento completo',
  type: 'info',
  duration: 10000, // 10 segundos
  dismissible: false
});
```
# ⚙ Configuração Avançada
1. Personalização Visual
```php
// No theme.php
$MESSAGE_TEMPLATE = [
  'success' => '<div class="my-alert success">{ICON} {MESSAGE}</div>',
  'error'   => '<div class="my-alert error">{ICON} {MESSAGE}</div>'
];
```
2. Configuração Global
```php
// e107_config.php
define('MESSAGE_STACK_DURATION', 8000); // 8 segundos
define('MESSAGE_STACK_LIMIT', 5);       // Máx. alertas simultâneos
```
3. Para Plugins
```php
// myplugin/message.php
class myplugin_message extends eMessage
{
  public function customMethod() {
    // Lógica personalizada
  }
}
```
# 🔍 API Completa
Métodos Principais
- add($message, $type, $unique) - Adicionar mensagem
- addSession() - Persistir entre páginas
- render($type = null) - Obter HTML
- reset($type) - Limpar mensagens
- log() - Registar no error_log

## Helpers Especiais
```php
// Mensagem de depuração com contexto
e107::getMessage()->addDebug("Estado atual", $variables);

// Forçar renderização imediata
echo e107::getMessage()->render(E_MESSAGE_ERROR);
```
# 📚 Exemplos Avançados
AJAX + JSON
```php
fetch('/api/endpoint')
  .then(res => res.json())
  .then(data => {
    if(data.message) {
      e107Alert.renderJson(data.message);
    }
  });
```
# 🛠 Resolução de Problemas
- Problema: Alertas não persistem
- Solução: Verificar se as sessões PHP estão ativas
- Problema: CSS não aplicado
- Solução: Sobrescrever classes no theme.css:
```css
.alert-success {
  background: var(--success-bg);
  border-color: var(--success-border);
}
```
