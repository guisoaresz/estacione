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
    
    echo "<main>";
?>
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
                <div class="perfil-imagem-usuario">
                    <img src="images/no-image.png" alt="Foto do usuário">
                    <p>Alterar imagem / Remover imagem</p>
                </div>
                <div class="perfil-form-editar">
                    <h1>Suas informações</h1>
                    <hr>
                    <form method="post">
                        <?php
                            echo '<label for="nome">Nome de usuário</label>';
                            echo '<input type="text" name="nome" value="'. getInfo($_SESSION["user"], "user") .'">';
                            echo '<label for="email">Email</label>';
                            echo '<input type="text" name="email" value="'. getInfo($_SESSION["user"], "email") .'">';
                            echo '<label for="senha">Senha</label>';
                            echo '<input type="text" name="senha" value="'. getInfo($_SESSION["user"], "senha") .'">';             
                        ?>
                        <button type="submit">Editar</button>
                        <button href="perfil.php" id="btnCancelar">Cancelar</button>
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
