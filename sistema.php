<?php
    include "inc/functions.php";
    include ('inc/templates.php');
    headerStructure();
    headerTemp();
    checkStatus();

?>
<main>
    <div class="sistema-container">
        <div class="sistema-container-title">
            <a href="/estacione/perfil.php"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            <h1><?php echo getEstacionamentoInfo($_GET["id"], "nome")?></h1>
        </div>
        <h2>Vagas</h2>
        Total: <?php echo getEstacionamentoInfo($_GET["id"], "vagas")?> vagas<br>
        Vagas disponíveis:
    </div>
</main>
    <?php
        footerTemp();
    ?>
</body>
</html>
