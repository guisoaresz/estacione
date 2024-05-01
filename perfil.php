<?php
    include ('inc/templates.php');
    headerTemp();

    $user = $_SESSION["user"];
    echo "<h1> $user, logado com sucesso </h1>";
?>
</body>
</html>
