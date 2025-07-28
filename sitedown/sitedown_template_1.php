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
	// Use modern HTML5 doctype.
	$SITEDOWN_TABLE = "<!DOCTYPE html>";
	$SITEDOWN_TABLE .= '
    <html lang="'.CORE_LC.'"'.(defined('TEXTDIRECTION') ? ' dir="'.TEXTDIRECTION.'"' : '').'>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{SITEDOWN_TABLE_PAGENAME}</title>
        <link rel="icon" href="{SITEDOWN_FAVICON}" type="image/x-icon" />
        <!-- Bootstrap 5.3.2 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome 6.4.2 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body.sitedown {
            padding: 0;
            margin: 0;
            height: 100vh;
            overflow: hidden;
            font-family: "Poppins", sans-serif;
            font-size: 16px;
        }
        .sitedown-left {
            background-color: #272C30;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
            overflow-y: auto;
            overflow-x: hidden;
            text-align: center;
        }
        .sitedown-right {
            background-image: url({THEME}images/sitedown.jpg);
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .content-wrapper {
            max-width: 420px;
        }
        .logo-container img {
            max-height: 80px;
            margin-bottom: 40px;
        }
        .text-content h1 {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .text-content p {
            color: #ccc;
            line-height: 1.6;
        }
        .countdown-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 40px 0;
        }
        .countdown-item {
            background-color: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 8px;
            width: 90px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .countdown-item span {
            font-size: 2.5rem;
            font-weight: 700;
            display: block;
        }
        .countdown-item .label {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #ccc;
        }
        .social-icons {
            margin-top: 40px;
        }
        .social-icons a {
            color: #fff;
            margin: 0 12px;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }
        .social-icons a:hover {
            color: #aaa;
        }
    </style>
    </head>
    <body class="sitedown">
        <div class="container-fluid g-0">
            <div class="row g-0">
                <!-- Left Side (Content) -->
                <div class="col-lg-5 col-md-6 sitedown-left">
                    <div class="content-wrapper">
                        <div class="logo-container">{LOGO: h=150}</div>
                        <div class="text-content">
                            <h1>Coming Soon</h1>
                            <div>{SITEDOWN_TABLE_MAINTAINANCETEXT}</div>
                        </div>
                        <div id="countdown" class="countdown-container">
                            <div class="countdown-item"><span id="days">00</span><div class="label">Dias</div></div>
                            <div class="countdown-item"><span id="hours">00</span><div class="label">Horas</div></div>
                            <div class="countdown-item"><span id="minutes">00</span><div class="label">Minutos</div></div>
                            <div class="countdown-item"><span id="seconds">00</span><div class="label">Segundos</div></div>
                        </div>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Right Side (Image) -->
                <div class="col-lg-7 col-md-6 d-none d-md-block sitedown-right"></div>
            </div>
        </div>

        <script>
            // ATENÇÃO: Altere a data de término da contagem regressiva aqui.
            const countDownDate = new Date("Dec 31, 2025 23:59:59").getTime();

            const x = setInterval(function() {
                const now = new Date().getTime();
                const distance = countDownDate - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("days").innerText = days.toString().padStart(2, \'0\');
                document.getElementById("hours").innerText = hours.toString().padStart(2, \'0\');
                document.getElementById("minutes").innerText = minutes.toString().padStart(2, \'0\');
                document.getElementById("seconds").innerText = seconds.toString().padStart(2, \'0\');

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown").innerHTML = "<h2>Estamos de volta!</h2>";
                }
            }, 1000);
        </script>
    </body>
    </html>';
}
