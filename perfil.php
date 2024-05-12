<?php
    include "inc/functions.php";
    include ('inc/templates.php');
    headerStructure();
    headerTemp();
    checkStatus();

    if(isset($_POST["deslogarUsuario"])){
        session_destroy();
        header("Location: login.php");
        exit;
    }

    if(isset($_POST["nomeEstacionamento"])){
        createEstacionamento($_SESSION["user"]);
    }
?>
<main>
    <div class="perfil-container">
        <div class="perfil-container-left">
            <div class="perfil-container-opc">
                <ul>
                    <li>
                        <button onclick="togglePerfil(0)">Sistema</button>
                    </li>
                    <li>
                        <button onclick="togglePerfil(1)">Editar perfil</button>
                    </li>
                </ul>
            </div>
            <div class="perfil-container-desconect">
                <form method="post">
                    <button type="submit" name="deslogarUsuario">Desconectar</button>
                </form>
            </div>
        </div>
        <div class="perfil-container-main">
            <div class="perfil-container-sistema" id="perfil-sistema">
                <div class="perfil-container-sistema-proprietario">
                    <h4>Seus estacionamentos</h4>
                    <div class="perfil-container-cards">
                        <?php
                            getEstacionamentos($_SESSION["user"]);
                        ?>
                        <div class="perfil-container-modal" id="perfil-container-modal">
                            <div class="perfil-container-modal-content">
                                <div class="perfil-container-modal-content-title">
                                    <h2>Criar um estacionamento</h2>
                                    <button onclick=toggleModal(0)><i class="fa-solid fa-xmark"></i></button>
                                </div>
                                <div class="perfil-container-modal-content-body">
                                    <form method="post">
                                        <label for="nomeEstacionamento">Nome do estacionamento</label>
                                        <input type="text" name="nomeEstacionamento" placeholder="eStacionamento" required>

                                        <label for="qtdVagasEstacionamento">Quantidade de vagas</label>
                                        <input type="number" name="qtdVagasEstacionamento" placeholder="30" min="1" required>

                                        <div class="perfil-container-modal-content-body-buttons">
                                            <button type="submit">Criar</button>
                                            <button id="btnCancelar" onclick=toggleModal(0)>Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="perfil-container-sistema-funcionario">
                    <h4>Estacionamentos que você é funcionário</h4>
                    <div class="perfil-container-cards">
                        <div class="perfil-container-card">
                            <i class="fa-solid fa-car fa-2xl"></i>
                        </div>
                        <div class="perfil-container-card">
                            <i class="fa-regular fa-keyboard fa-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="perfil-container-editar" id="perfil-editar">
                <div class="perfil-form-editar">
                    <h1>Suas informações</h1>
                    <hr>
                    <form method="post">
                        <?php
                            echo '<label for="nome">Nome de usuário</label>';
                            echo '<input type="text" name="nome" value="'. getInfo($_SESSION["user"], "user") .'">';
                            echo '<label for="email">Email</label>';
                            echo '<input type="text" name="email" value="'. getInfo($_SESSION["user"], "email") .'">';         
                        ?>
                        <div class="perfil-form-editar-buttons">
                            <button type="submit">Editar</button>
                            <button href="perfil.php" id="btnCancelar">Cancelar</button>
                        </div>
                    </form>
                </div>
                <div class="perfil-imagem-usuario">
                    <img src="images/no-image.png" alt="Foto do usuário">
                    <p>Alterar imagem / Remover imagem</p>
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
