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

    /*$user = $_SESSION["user"];
    echo "<h1 id='perfilIntro'> $user, logado com sucesso </h1>";*/
?>
    <div class="perfil-container">
        <div class="perfil-container-left">
            <div class="perfil-container-opc">
                <ul>
                    <li>
                        <a href="#">Editar perfil</a>
                    </li>
                    <li>
                        <a href="#">Preferências</a>
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
            <div class="perfil-container-sistema">
                <div class="perfil-container-sistema-proprietario">
                    <h4>Seus estacionamentos</h4>
                    <div class="perfil-container-cards">
                        <div class="perfil-container-card">
                            <i class="fa-solid fa-car fa-2xl"></i>
                        </div>
                        <div class="perfil-container-card">
                            <i class="fa-solid fa-car fa-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="perfil-container-sistema-funcionario">
                    <h4>Estacionamentos que você é funcionário</h4>
                    <div class="perfil-container-cards">
                        <div class="perfil-container-card">
                            <i class="fa-solid fa-car fa-2xl"></i>
                        </div>
                    </div>
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
