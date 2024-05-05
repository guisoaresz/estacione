<?php
    include "inc/conexao.php";

    function checkStatus(){
        if(!isset($_SESSION["user"])){
            header("Location: login.php");
        }
    }

    function deslogarUsuario(){
        if(isset($_POST["deslogarUsuario"])){
            session_destroy();
            header("Location: login.php");
            exit;
        }
    }

    function checkUser($user, $method){
        $conn = connect();
        $stmt = $conn->prepare("SELECT * from usuarios WHERE userUsuario = :user");
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
    
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($method == "login"){
            if(!empty($res)){
                $senha = $_POST["txtSenha"];
                loginUser($user, $senha);
            } else {
                header("Location: login.php");
                setErro(0);
            }
        } else if($method == "register"){
            if(!empty($res)){
                header("Location: login.php");
                setErro(1);
            } else {
                $email = $_POST["txtEmail"];
                $senha = $_POST["txtSenha"];
                registerUser($user, $email, $senha);
            }
        }
    }

    function loginUser($user, $senha){
        $conn = connect();
        $stmt = $conn->prepare("SELECT * from usuarios WHERE userUsuario = :user");
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
    
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($res)){
            foreach($res as $rows){
                $senhab = $rows["senhaUsuario"];
                if($senha == $senhab){
                    $_SESSION["user"] = $user;
                    header("Location: perfil.php");
                } else {
                    header("Location: login.php");
                    setErro(2);
                }
            }
        } else {
            setErro(0);
        }
    }

    function registerUser($user, $email, $senha){

        $conn = connect();

        $stmt = $conn->prepare("INSERT INTO usuarios(userUsuario, emailUsuario, senhaUsuario) VALUES(:userUsuario, :emailUsuario, :senhaUsuario)");
        $stmt->bindParam(':userUsuario', $user, PDO::PARAM_STR);
        $stmt->bindParam(':emailUsuario', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senhaUsuario', $senha, PDO::PARAM_STR);
    
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION["user"] = $user;
        header("Location: perfil.php");
    }

    function setErro($erro){
        $erros = array("Usuário inexistente.", "Usuário já registrado.", "Senha incorreta.");
        $_SESSION["erro"] = $erros[$erro];
    }

    function getErros(){
        if(isset($_SESSION["erro"])){
            $erro = $_SESSION["erro"];
            echo "<p id='erro'> $erro </p>";
            unset($_SESSION["erro"]);
        }
    }
?>