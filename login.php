<?php
    include ('inc/functions.php');
    include ('inc/templates.php');
    headerTemp("login");
    checkStatus("login");

    if(isset($_POST["txtFormType"])){
        $formType = $_POST["txtFormType"];
        $user = $_POST["txtUsuario"];
        $senha = $_POST["txtSenha"];
        if($formType == "login"){
            checkUser($user, "login");
        } else if($formType == "register"){
            checkUser($user, "register");
        }
    } else {
        echo '
        <body>
            <div class="container-login">
                <h1>eStacione</h1>
                <form method="post">
                    <input type="text" name="txtFormType" id="formType" value="login"><br>
                    <input type="text" name="txtUsuario" placeholder="Nome de usuário ou email" required minlenght="4" maxlenght="100"><br>
                    <input type="password" name="txtSenha" placeholder="Senha" required maxlenght="25"><br>
                    <button id="btnSubmit" type="submit">Logar</button>
                </form>'.getErros().'
                <hr>
                <span>Não possui uma conta? <button id="btnLogar" onclick=toggleMethod(0)>Cadastre-se</button></span>
            </div>

            <div class="container-register">
                <h1>eStacione</h1>
                <form method="post">
                    <input type="text" name="txtFormType" id="formType" value="register"><br>
                    <input type="text" name="txtUsuario" placeholder="Nome de usuário" required minlenght="4" maxlenght="25"><br>
                    <input type="email" name="txtEmail" placeholder="Email" required maxlenght="100"><br>
                    <input type="password" name="txtSenha" placeholder="Senha" required minlenght="8" maxlenght="25"><br>
                    <button id="btnSubmit" type="submit">Registrar</button>
                </form>'.getErros().'
                <hr>
                <span>Ja possui uma conta? <button id="btnCadastrar" onclick=toggleMethod(1)>Logar-se</button></span>
            </div>';
    }
?>
</body>
</html>