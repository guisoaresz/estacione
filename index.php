<?php
    include ('inc/functions.php');
    include ('inc/templates.php');
    headerStructure();
?>
<main>
    <body>
        <?php
            headerTemp();
        ?>
        <main>
            <div class="intro">
                <div class="intro-text">
                    <i class="fa-solid fa-car-side"></i>
                    <p>Controle total dos seus estacionamentos na ponta dos seus dedos.</p>
                    <a href="perfil.php">Clique aqui e comece agora mesmo, gratuitamente!</a>
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
        </main>
        <?php
            footerTemp();
        ?>
    </body>
</html>