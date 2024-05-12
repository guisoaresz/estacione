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
        Vagas disponíveis: <?php echo getEstacionamentoInfo($_GET["id"], "vagasDisponiveis")?> vagas
        <h2>Gerenciar vagas</h2>
        <?php getVagasCards($_GET["id"])?>
        <div class="sistema-container-modal" id="sistema-container-modal">
            <div class="sistema-container-modal-content">
                <div class="sistema-container-modal-content-title">
                    <h2>Gerenciar vaga #id</h2>
                    <button onclick=toggleVagaModal(0)><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="sistema-container-modal-content-body">
                    <form method="post">
                        <label for="statusVaga">Nome do estacionamento</label>
                        <input type="text" name="statusVaga" placeholder="Disponível" required>

                        <label for="qtdVagasEstacionamento">Quantidade de vagas</label>
                        <input type="number" name="qtdVagasEstacionamento" placeholder="30" min="1" required>

                        <div class="sistema-container-modal-content-body-buttons">
                            <button type="submit">Criar</button>
                            <button id="btnCancelar" onclick=toggleVagaModal(0)>Cancelar</button>
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
