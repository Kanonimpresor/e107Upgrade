<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 */

if (!defined('e107_INIT')) { exit; }

// ##### SITEDOWN TABLE -----------------------------------------------------------------
if(!isset($SITEDOWN_TABLE))
{
	// Use modern HTML5 doctype. The old XML declaration and XHTML doctype are no longer needed.
	$SITEDOWN_TABLE = "<!DOCTYPE html>";
	$SITEDOWN_TABLE .= '
    <html xmlns="http://www.w3.org/1999/xhtml"'.(defined('TEXTDIRECTION') ? ' dir="'.TEXTDIRECTION.'"' : '').(defined('CORE_LC') ? ' xml:lang=\''.CORE_LC.'\'' : '').'>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{SITEDOWN_FAVICON}" type="image/x-icon" />
        <link rel="shortcut icon" href="{SITEDOWN_FAVICON}" type="image/xicon" />
        <!-- Bootstrap 5.3.2 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome 6.4.2 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
		<link rel="stylesheet" href="{SITEDOWN_SOCIAL_CSS}" type="text/css" media="all" />
        <link rel="stylesheet" href="{SITEDOWN_E107_CSS}" type="text/css" media="all" />
        <link rel="stylesheet" href="{SITEDOWN_THEME_CSS}" type="text/css" media="all" />
        <title>{SITEDOWN_TABLE_PAGENAME}</title>
    <style>
    .img-responsive { display: inline }

body.sitedown {
  min-height: 100vh;
  margin: 0;
  padding: 20px;
  box-sizing: border-box;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  overflow-x: hidden;
  font-size: 1.2em;
}

.sitedown-content {
  width: 100%;
  max-width: 800px; /* Ajusta el ancho máximo de la caja */
  text-align: center;
}

.sitedown-box {
  margin-top: 20px;
  margin-bottom: 20px;
  padding: 30px;
  position: relative;
  z-index: 9;
  backdrop-filter: blur(80px);
  -webkit-backdrop-filter: blur(80px);
  background-color: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 10px;
  box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
  color: #212121; /* Asumiendo que el fondo es oscuro */
}

.sitedown-box .hr-custom {
    border-top: 1px solid rgba(255, 255, 255, 0.3);
    margin: 20px 0;
}

.social-icons a {
  color: #212121; /* Asumiendo que el fondo es oscuro */
  transition: opacity 0.3s ease;
}

.social-icons a:hover {
    opacity: 0.7;
}

.logo-container img {
    max-height: 150px; /* Limita la altura del logo */
    width: auto;
}

    </style>
    </head>
    <body class="sitedown" style="background-image: url({THEME}images/sitedown_bg.jpg);">
        <div class="sitedown-content">
            <div class="logo-container sitedown-box mb-4">{LOGO: h=150}</div>
            <div class="sitedown-box">{SITEDOWN_TABLE_MAINTAINANCETEXT}
            <hr>
            <div class="social-icons mt-4">
                <a href="#" class="mx-3"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="#" class="mx-3"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="#" class="mx-3"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="#" class="mx-3"><i class="fab fa-youtube fa-2x"></i></a>
                <a href="#" class="mx-3"><i class="fab fa-linkedin fa-2x"></i></a>
            </div></div>
        </div>
    </body>
    </html>';

}
