### O Papel do `sitedown_template.php`

#### (Choose your language below / Escolha o seu idioma abaixo / Elija su idioma abajo)
[![English](https://img.shields.io/badge/Language-English-blue)](README.md)
[![Português](https://img.shields.io/badge/Language-Português-green)](README.pt-PT.md)
[![Español](https://img.shields.io/badge/Language-Español-red)](README.es-ES.md)
---

Quando o seu site precisa de uma pausa para atualizações ou manutenção, o `sitedown_template.php` torna-se a face pública da sua web. É o guardião que informa os visitantes de que está a trabalhar nos bastidores e que voltará em breve, mantendo sempre uma imagem profissional.

#### Funcionalidade Chave

-   **Ponto de Entrada para Manutenção**: É o ficheiro que o e107 executa automaticamente quando o site é colocado em "Modo de Manutenção" a partir do painel de administração.
-   **Resposta HTTP 503**: Envia um cabeçalho de resposta `503 Service Unavailable`. Isto é crucial para o SEO, pois indica aos motores de busca como o Google que a indisponibilidade é temporária e que não devem remover as suas páginas do índice.
-   **Acesso para Administradores**: Permite que o Administrador Principal (ID de utilizador 1) continue a ver e a navegar no site normalmente, o que facilita a realização de testes e ajustes em tempo real.
-   **Ambiente de Carregamento Mínimo**: Opera num modo especial onde apenas uma parte mínima do núcleo do e107 é carregada. Isto tem implicações importantes:
    -   **O carregamento de ficheiros externos (CSS/JS) pode falhar.** Como descobrimos, ligar uma folha de estilos externa (`sitedown.css`) pode não funcionar. A solução mais robusta é incorporar o CSS diretamente no ficheiro do template usando as tags `<style>`.
    -   **Disponibilidade de Shortcodes limitada.** Nem todos os shortcodes funcionam como esperado. É necessário testá-los; por exemplo, `{THEME}` pode funcionar enquanto `{THEME_PATH}` não, ou vice-versa, dependendo da configuração do servidor.

#### Personalização e Templates

A aparência da página de manutenção é controlada através de um template específico localizado no diretório do seu tema:

-   **`templates/sitedown_template.php`**: Este ficheiro contém toda a estrutura HTML e a lógica para exibir a mensagem de manutenção. É aqui que se define o layout, se insere o logótipo, o texto e as ligações para as redes sociais.

Para a nossa implementação, criámos um design moderno e responsivo com uma imagem de fundo em ecrã inteiro e uma caixa de conteúdo com o efeito "glassmorphism" (desfoque de fundo). Todo o CSS foi incorporado diretamente no `sitedown_template.php` para garantir o seu carregamento e funcionalidade.

**Resumo:** O `sitedown_template.php` é mais do que uma simples página de "site em baixo". É uma ferramenta de comunicação essencial e um componente técnico que, se configurado corretamente, protege o seu SEO e mantém uma imagem profissional mesmo durante as tarefas de manutenção.

# Gerir o Modo de Manutenção
Siga estes passos para controlar a página de manutenção do seu website a partir do painel de administração.

## 1. Ativar o Modo de Manutenção
Quando precisar de realizar atualizações ou alterações significativas, ative o modo de manutenção para exibir uma página informativa aos seus visitantes.

1. Navegue para o seu Painel de Administração: Inicie sessão como administrador.
2. Vá a Ferramentas: No menu de administração, encontre e clique em Ferramentas (Tools).
3. Aceda a Manutenção: Dentro de Ferramentas, selecione a opção Manutenção (Maintenance).
4. Ative a caixa de seleção: Marque a caixa que diz "Ativar modo de manutenção" (Activate maintenance mode).
5. Guarde as Alterações: Clique no botão "Guardar Definições" (Save Settings). O seu site está agora em modo de manutenção.

## 2. Editar a Mensagem de Manutenção
Pode personalizar o texto que os seus utilizadores veem na página de manutenção.

1. Permaneça na página de Manutenção (Ferramentas > Manutenção).
2. Encontre a área de texto: Localize o campo de texto grande, normalmente rotulado como "Texto de manutenção" (Maintenance Text).
3. Escreva a sua mensagem: Introduza o texto que deseja exibir. Pode usar código HTML para formatar, adicionar links ou imagens.
4. Guarde as Alterações: Clique em "Guardar Definições" para atualizar a mensagem.

## 3. Desativar o Modo de Manutenção
Assim que tiver terminado o seu trabalho, siga estes passos para que o seu site volte a estar online.

1. Volte a Ferramentas > Manutenção.
2. Desative a caixa de seleção: Desmarque a caixa "Ativar modo de manutenção".
3. Guarde as Alterações: Clique em "Guardar Definições". O seu website ficará novamente visível para todos os utilizadores.

> Nota Importante: Como Administrador Principal (ID de utilizador 1), verá sempre o site completo, mesmo em modo de manutenção. Para ver a página de manutenção tal como os seus visitantes a veem, utilize um navegador diferente onde não tenha sessão iniciada ou abra uma janela de navegação anónima/privada.
