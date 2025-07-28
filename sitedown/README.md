### The Role of `sitedown_template.php`

#### (Choose your language below / Escolha o seu idioma abaixo / Elija su idioma abajo)
[![English](https://img.shields.io/badge/Language-English-blue)](README.md)
[![Português](https://img.shields.io/badge/Language-Português-green)](README.pt-PT.md)
[![Español](https://img.shields.io/badge/Language-Español-red)](README.es-ES.md)
---

When your site needs a break for updates or maintenance, `sitedown_template.php` becomes the public face of your website. It's the gatekeeper that informs visitors you're working behind the scenes and will be back soon, always maintaining a professional image.

#### Key Functionality

-   **Entry Point for Maintenance**: This is the file that e107 automatically executes when the site is put into "Maintenance Mode" from the admin panel.
-   **HTTP 503 Response**: It sends a `503 Service Unavailable` response header. This is crucial for SEO, as it tells search engines like Google that the unavailability is temporary and they should not de-index your pages.
-   **Admin Access**: It allows the Main Administrator (User ID 1) to continue viewing and browsing the website normally, which facilitates real-time testing and adjustments.
-   **Minimal Load Environment**: It operates in a special mode where only a minimal part of the e107 core is loaded. This has significant implications:
    -   **Loading external files (CSS/JS) may fail.** As we discovered, linking to an external stylesheet (`sitedown.css`) might not work. The most robust solution is to embed the CSS directly into the template file using `<style>` tags.
    -   **Limited Shortcode Availability.** Not all shortcodes work as expected. They need to be tested; for example, `{THEME}` might work while `{THEME_PATH}` does not, or vice versa, depending on the server configuration.

#### Customization and Templates

The appearance of the maintenance page is controlled through a specific template located in your theme's directory:

-   **`templates/sitedown_template.php`**: This file contains the entire HTML structure and logic for displaying the maintenance message. This is where the layout is defined, and the logo, text, and social media links are inserted.

For our implementation, we created a modern, responsive design with a full-screen background image and a content box with a "glassmorphism" effect (background blur). All CSS was embedded directly into `sitedown_template.php` to ensure it loads and functions correctly.

**Summary:** `sitedown_template.php` is more than just a "site down" page. It's an essential communication tool and a technical component that, when configured correctly, protects your SEO and maintains a professional image even during maintenance tasks.

# Managing Maintenance Mode
Follow these steps to control your website's maintenance page from the admin panel.

## 1. Activating Maintenance Mode
When you need to perform updates or significant changes, activate maintenance mode to display an informational page to your visitors.

1. Navigate to your Admin Panel: Log in as an administrator.
2. Go to Tools: In the admin menu, find and click on Tools.
3. Access Maintenance: Within Tools, select the Maintenance option.
4. Check the box: Tick the checkbox labeled "Activate maintenance mode".
5. Save Settings: Click the "Save Settings" button. Your site is now in maintenance mode.

## 2. Editing the Maintenance Message
You can customize the text your users see on the maintenance page.

1. Stay on the Maintenance page (Tools > Maintenance).
2. Find the text area: Locate the large text field, usually labeled "Maintenance Text".
3. Write your message: Enter the text you want to display. You can use HTML to format text, add links, or images.
3. Save Settings: Click "Save Settings" to update the message.

## 3. Deactivating Maintenance Mode
Once you have finished your work, follow these steps to bring your site back online.

1. Go back to Tools > Maintenance.
2. Uncheck the box: Untick the "Activate maintenance mode" checkbox.
3. Save Settings: Click "Save Settings". Your website will be visible to all users again.

>Important Note: As the Main Administrator (User ID 1), you will always see the full website, even in maintenance mode. To see the maintenance page as your visitors see it, use a different browser where you are not logged in, or open a private/incognito window.
