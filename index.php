<?php
    include ('inc/functions.php');
    headerTemp();
?>
    <div class="container-login">
        <h1>eStacione</h1>
        <form action="login.php" method="post">
            <input type="text" name="txtUsuario" placeholder="Nome de usuário ou email" required><br>
            <input type="password" name="txtSenha" placeholder="Senha" required><br>
            <button id="btnSubmit" type="submit">Logar</button>
        </form>
        <hr>
        <span>Não possui uma conta? <button id="btnLogar" onclick=toggleMethod(0)>Cadastre-se</button></span>
    </div>

    <div class="container-register">
        <h1>eStacione</h1>
        <form action="login.php" method="post">
            <input type="text" name="txtUsuario" placeholder="Nome de usuário ou email" required><br>
            <input type="password" name="txtSenha" placeholder="Senha" required><br>
            <button id="btnSubmit" type="submit">Logar</button>
        </form>
        <hr>
        <span>Ja possui uma conta? <button id="btnCadastrar" onclick=toggleMethod(1)>Logar-se</button></span>
    </div>
</body>
</html>