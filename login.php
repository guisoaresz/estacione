<?php
    include ('inc/functions.php');
    include ('inc/templates.php');
    headerTemp();
    checkStatus();

    $formType = $_POST["txtFormType"];
    $user = $_POST["txtUsuario"];
    $senha = $_POST["txtSenha"];

    if(isset($formType)){
        if($formType == "login"){
            checkUser($user, "login");
        } else if($formType == "register"){
            checkUser($user, "register");
        }
    } else {
        header("Location: index.php");
    }
?>
</body>
</html>