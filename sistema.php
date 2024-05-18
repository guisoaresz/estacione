<?php
    include "inc/functions.php";
    include ('inc/templates.php');
    headerStructure();
    headerTemp();
    checkStatus();

    if(isset($_POST["numeroVaga"])){
        if(isset($_POST["vagaStatus"])){
            toggleVagaStatus($_GET["id"], $_POST["numeroVaga"], $_POST["vagaStatus"]);
        }
    }

    if (isset($_POST["novoNome"])) {
        $id = $_GET["id"];
        $novoNome = $_POST["novoNome"];
        
        if (getEstacionamentoInfo($id, "nome") != $novoNome) {
            setEstacionamentoInfo($id, "nome", $novoNome);
        }
    }

    if (isset($_POST["novoNumero"])) {
        $id = $_GET["id"];
        $qtdVagas = $_POST["novoNumero"];
        
        if (getEstacionamentoInfo($id, "vagas") != $qtdVagas) {
            setEstacionamentoInfo($id, "vagas", $qtdVagas);
        }
    }

    if (isset($_POST["excluirEstacionamento"])) {
        $id = $_GET["id"];    
        deleteEstacionamento($id);
    }
?>
<main>
    <div class="sistema-container">
        <div class="sistema-container-title">
            <a href="/estacione/perfil.php"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            <h1><?php echo getEstacionamentoInfo($_GET["id"], "nome")?></h1>
        </div>
        <div class="sistema-container-info">
            <div class="sistema-container-info-funcionarios">
                <div class="sistema-container-vagas">
                    <h2>Vagas</h2>
                    <p>Total: <?php echo getEstacionamentoInfo($_GET["id"], "vagas")?> vaga(s)</p>
                    <p>Vagas disponíveis: <?php echo getEstacionamentoInfo($_GET["id"], "vagasDisponiveis")?> vaga(s)</p>
                </div>
                <div class="sistema-container-funcionarios">
                    <h2>Funcionários</h2>
                    <p>Total de Funcionários: <?php echo getEstacionamentoFuncionarios($_GET["id"])?> funcionário(s)</p>
                    <div class="listarFuncionarios">
                        <p>Listar funcionários</p>
                    </div>
                    <div class="criarCodigo" onclick=toggleSistemaModal(4)>
                        <p>Criar um código</p>
                    </div>
                </div>
            </div>
            <h2>Gerenciar vagas</h2>
            <?php getVagasCards($_GET["id"])?>
            <div class="sistema-container-gerenciar">
                <h2>Gerenciar estacionamento</h2>
                <div class="alterarNome" onclick=toggleSistemaModal(1)>
                    <p>Alterar nome</p>
                </div>
                <div class="alterarQtdVagas" onclick=toggleSistemaModal(2)>
                    <p>Alterar quantidade de vagas</p>
                </div>
                <div class="excluirEstacionamento" onclick=toggleSistemaModal(3)>
                    <p>Excluir estacionamento</p>
                </div>
            </div>
        </div>
        <div class="sistema-container-modal" id="sistema-container-modal">
            <div class="sistema-container-modal-content">
                <div class="sistema-container-modal-content-title">
                    <h2 id="sistema-modal-title-toggleVaga">Gerenciar vaga #id</h2>
                    <button onclick=toggleVagaModal(0)><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="sistema-container-modal-content-body">
                    <form method="post">
                        <input type="text" name="numeroVaga" id="numeroVaga" hidden>
                        <label for="vagaStatus">Estado da vaga</label>
                        <div class="vagaStatus">
                            <select name="vagaStatus" id="vagaStatus">
                                <option value="disponivel">Disponível</option>
                                <option value="indisponivel" selected>Indisponível</option>
                            </select>
                        </div>

                        <div class="sistema-container-modal-content-body-buttons">
                            <button type="submit">Atualizar</button>
                            <button id="btnCancelar" type="button" onclick=toggleVagaModal(0)>Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL: ALTERAR NOME -->

        <div class="sistema-container-modal" id="sistema-container-modal-alterName">
            <div class="sistema-container-modal-content">
                <div class="sistema-container-modal-content-title">
                    <h2 id="sistema-modal-title">Alterar nome</h2>
                </div>
                <div class="sistema-container-modal-content-body">
                    <form method="post">
                        <label for="novoNome">Novo nome</label>
                        <input type="text" id="novoNome" name="novoNome" placeholder=" Informe um novo nome">

                        <div class="sistema-container-modal-content-body-buttons">
                            <button type="submit">Alterar</button>
                            <button id="btnCancelar" type="button" onclick=toggleSistemaModal(0)>Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>        
        </div>

        <!-- MODAL: ALTERAR VAGAS -->

        <div class="sistema-container-modal" id="sistema-container-modal-alterVagas">
            <div class="sistema-container-modal-content">
                <div class="sistema-container-modal-content-title">
                    <h2 id="sistema-modal-title">Alterar vagas</h2>
                </div>
                <div class="sistema-container-modal-content-body">
                    <form method="post">
                        <label for="qtdVagasEstacionamento">Quantidade de vagas</label>
                        <input type="number" name="novoNumero" placeholder="30" min="1" max="150" required>

                        <div class="sistema-container-modal-content-body-buttons">
                            <button type="submit">Alterar</button>
                            <button id="btnCancelar" type="button" onclick=toggleSistemaModal(0)>Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>        
        </div>

        <!-- MODAL: EXCLUIR ESTACIONAMENTO -->

        <div class="sistema-container-modal" id="sistema-container-modal-excluir">
            <div class="sistema-container-modal-content">
                <div class="sistema-container-modal-content-title">
                    <h2 id="sistema-modal-title">Tem certeza?</h2>
                </div>
                <div class="sistema-container-modal-content-body">
                    <form method="post">
                        <input type="text" name="excluirEstacionamento" id="excluirEstacionamento" value="excluirEstacionamento" hidden>
                        <p id="alert">Esta ação é irreverssível, você perderá todos os dados que envolvem este estacionamento.</p>
                        <div class="sistema-container-modal-content-body-buttons">
                            <button type="submit" name="excluirEstacionamento">Excluir</button>
                            <button id="btnCancelar" type="button" onclick=toggleSistemaModal(0)>Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>        
        </div>

        <!-- MODAL: GERAR CÓDIGO -->

        <div class="sistema-container-modal" id="sistema-container-modal-gerarCodigo">
            <div class="sistema-container-modal-content">
                <div class="sistema-container-modal-content-title">
                    <h2 id="sistema-modal-title">Tem certeza?</h2>
                </div>
                <div class="sistema-container-modal-content-body">
                    <form method="post">
                        <input type="text" name="gerarCodigo" id="gerarCodigo" placeholder="XXXXX-XXXXX" disabled>
                        <p id="alert">Você irá criar um código de 10 caractéres, no qual qualquer pessoa que ativa-lo será adicionado como funcionário
                            deste estabelecimento.<br>Uso único.
                        </p>
                        <div class="sistema-container-modal-content-body-buttons">
                            <button type="submit" name="excluirEstacionamento">Criar</button>
                            <button id="btnCancelar" type="button" onclick=toggleSistemaModal(0)>Cancelar</button>
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
