<?php
    include ('inc/functions.php');
    include ('inc/templates.php');
    headerTemp("index");
?>
    <body>
        <header>
            <div class="header-left">
                <a href=""><i class="fa-solid fa-bars"></i> Menu</a>
            </div>
            <div class="header-center">
                <h1>eStacione</h1>
                <ul>
                    <li>
                        <a href="">Sobre nós</a>
                    </li>
                    <li>
                        <a href="">Tutorial</a>
                    </li>
                    <li>
                        <a href="">Contato </a>
                    </li>
                </ul>
            </div>
            <div class="header-right">
                <a href="login.php">Login <i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <div class="container">
            <div class="intro">
                <div class="intro-text">
                    <p id="intro-text-1">Controle total dos seus estacionamentos na ponta dos seus dedos.</p>
                </div>
            </div>
            <div class="vantagens">
                <h2 id="vantages-title">Por que utilizar o eStacione?</h2>
                <div class="vantagens-cards">
                    <div class="card-1">
                        <div class="card-title">
                            <h3>Organização</h3>
                        </div>
                        <div class="card-content">
                            <p>Ofeceremos a solução ideal
                            para uma organização eficiente e sem complicações.</p>
                        </div>
                    </div>
                    <div class="card-2">
                        <div class="card-title">
                            <h3>Agilidade</h3>
                        </div>
                        <div class="card-content">
                            <p>Projetado para oferecer máxima agilidade,
                            simplificando o processo de reserva e permitindo
                            que todos economizem tempo e esforço.</p>
                        </div>
                    </div>
                    <div class="card-3">
                        <div class="card-title">
                            <h3>Tecnologia</h3>
                        </div>
                        <div class="card-content">
                            <p>Site moderno e tecnológico para
                            tornar a experiência dos usuários
                            mais eficiente e agradável.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <li>
                        <a href="#" target="_blank"><i class="fa-solid fa-envelope"></i></i></a>
                    </li>
                </ul>
                <h2>
            </div>
        </footer>
    </body>
</html>