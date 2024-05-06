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

    $user = $_SESSION["user"];
    echo "<h1> $user, logado com sucesso </h1>";
?>

    <form method="post">
        <button type="submit" name="deslogarUsuario">Deslogar</button>
    </form>
    <?php
        footerTemp();
    ?>
</main>
</body>
</html>
