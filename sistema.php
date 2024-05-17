<?php
    include "inc/functions.php";
    include ('inc/templates.php');
    headerStructure();
    headerTemp();
    checkStatus();

    if(isset($_POST["numeroVaga"])){
        toggleVagaStatus($_GET["id"], $_POST["numeroVaga"], $_POST["switch"]);
    }
?>
<main>
    <div class="sistema-container">
        <div class="sistema-container-title">
            <a href="/estacione/perfil.php"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            <h1><?php echo getEstacionamentoInfo($_GET["id"], "nome")?></h1>
        </div>
        <div class="sistema-container-info">
            <div class="sistema-container-info-vagas">
                <h2>Vagas</h2>
                <p>Total: <?php echo getEstacionamentoInfo($_GET["id"], "vagas")?> vagas</p>
                <p>Vagas disponíveis: <?php echo getEstacionamentoInfo($_GET["id"], "vagasDisponiveis")?> vagas</p>
            </div>
            <h2>Gerenciar vagas</h2>
            <?php getVagasCards($_GET["id"])?>
        </div>
        <div class="sistema-container-modal" id="sistema-container-modal">
            <div class="sistema-container-modal-content">
                <div class="sistema-container-modal-content-title">
                    <h2 id="sistema-modal-title">Gerenciar vaga #id</h2>
                    <button onclick=toggleVagaModal(0)><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="sistema-container-modal-content-body">
                    <form method="post">
                        <label for="qtdVagasEstacionamento">Estado da vaga</label>
                        <input type="text" name="numeroVaga" id="numeroVaga" hidden>
                        <div class="switch">
                            <input type="checkbox" name="switch" id="switch" >
                            <label for="switch"></label>
                        </div>

                        <div class="sistema-container-modal-content-body-buttons">
                            <button type="submit">Atualizar</button>
                            <button id="btnCancelar" type="button" onclick=toggleVagaModal(0)>Cancelar</button>
                        </div>
                    </form>
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
