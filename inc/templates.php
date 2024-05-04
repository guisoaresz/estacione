<?php
    function headerStructure(){
        session_start();
        
        echo '<!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="styles/all-styles.css">
            <script src="https://kit.fontawesome.com/e1aca6f76d.js" crossorigin="anonymous"></script>
            <script src="scripts/scripts.js"></script>
            <title>eStacione</title>
        </head>
        ';
    }

    function headerTemp() {
        echo'
        <header>
            <div class="header-left">
                <a href="#"><i class="fa-solid fa-bars"></i> Menu</a>
            </div>
            <div class="header-center">
                <h1>eStacione</h1>
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">Tutorial</a>
                    </li>
                    <li>
                        <a href="#">Contato </a>
                    </li>
                </ul>
            </div>
            <div class="header-right">
                <a href="login.php">Login <i class="fa-solid fa-user"></i></a>
            </div>
        </header>';
    }

    function footerTemp() {
        echo '
        <footer>
            <div class="footer-center">
                <h3>Guilherme Soares</h1>
                <ul>
                    <li>
                        <a href="https://github.com/guisoaresz" target="_blank"><i class="fa-brands fa-github"></i></a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/guisxares/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    </li>
                </ul>
                <h2>
            </div>
        </footer>';
    }
?>