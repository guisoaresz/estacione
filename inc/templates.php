<?php
    function headerStructure(){
        session_start();
        
        echo '<!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="'. BASE .'styles/all-styles.css">
            <script src="https://kit.fontawesome.com/e1aca6f76d.js" crossorigin="anonymous"></script>
            <script src="'.BASE.'scripts/scripts.js"></script>
            <link rel="shortcut icon" href="'.BASE.'images/logo.png" type="image/x-icon">
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
                        <a href="'. BASE .'index.php">Home</a>
                    </li>
                </ul>
            </div>';
            if(isset($_SESSION["user"])){
                echo '<div class="header-right"><a href="'. BASE .'perfil.php">Perfil<i class="fa-solid fa-user"></i></a>
                </div>';
            } else {
                echo'<div class="header-right"><a href="'. BASE .'login.php">Login<i class="fa-solid fa-user"></i></a>
                </div>';
            }
        echo '</header>';
    }

    function footerTemp() {
        echo '
        <footer>
            <h3>Guilherme Soares</h3>
            <ul>
                <li>
                    <a href="https://github.com/guisoaresz" target="_blank"><i class="fa-brands fa-github"></i></a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/in/guisxares/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                </li>
            </ul>
        </footer>';
    }
?>