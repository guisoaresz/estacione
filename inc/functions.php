<?php
    include "inc/conexao.php";

    define('BASE', "///localhost/estacione/");

    function checkStatus(){
        if(!isset($_SESSION["user"])){
            header("Location: ".BASE."login.php");
        }
    }

    function deslogarUsuario(){
        if(isset($_POST["deslogarUsuario"])){
            session_destroy();
            header("Location: ".BASE."login.php");
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
                $stmt = $conn->prepare("SELECT * from usuarios WHERE emailUsuario = :email");
                $stmt->bindParam(':email', $user, PDO::PARAM_STR);
            
                $stmt->execute();
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(!empty($res)){
                    $senha = $_POST["txtSenha"];
                    loginUser($user, $senha);
                } else {
                    header("Location: login.php");
                    setErro(0);
                }
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
                if(password_verify($senha, $rows["senhaUsuario"])){
                    $_SESSION["user"] = $user;
                    header("Location: perfil.php");
                } else {
                    header("Location: login.php");
                    setErro(2);
                }
            }
        } else {
            $stmt = $conn->prepare("SELECT * from usuarios WHERE emailUsuario = :user");
            $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($res)){
                foreach($res as $rows){
                    if(password_verify($senha, $rows["senhaUsuario"])){          
                        $_SESSION["user"] = $rows["userUsuario"];
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
    }

    function registerUser($user, $email, $senha){

        $conn = connect();

        $stmt = $conn->prepare("SELECT * from usuarios WHERE emailUsuario = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($res)){
            header("Location: login.php");
            setErro(3);
        } else {

            $stmt = $conn->prepare("INSERT INTO usuarios(userUsuario, emailUsuario, senhaUsuario, fotoUsuario) VALUES(:userUsuario, :emailUsuario, :senhaUsuario, 'no-image.png')");
            $stmt->bindParam(':userUsuario', $user, PDO::PARAM_STR);
            $stmt->bindParam(':emailUsuario', $email, PDO::PARAM_STR);

            $senha = password_hash($senha, PASSWORD_DEFAULT);

            $stmt->bindParam(':senhaUsuario', $senha, PDO::PARAM_STR);
        
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION["user"] = $user;
            header("Location: perfil.php");
        }
    }

    function getInfo($user, $info){
        $conn = connect();
        $getInfo = $conn->prepare("SELECT * FROM usuarios WHERE userUsuario = :userUsuario");
        $getInfo->bindParam('userUsuario', $user, PDO::PARAM_STR);
        $getInfo->execute();
        $res = $getInfo->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($res)){
            foreach($res as $rows){
                $nomeUsuario = $rows["userUsuario"];
                $emailUsuario = $rows["emailUsuario"];
                if($info == "user"){
                    return $nomeUsuario;
                } else if($info == "email"){
                    return $emailUsuario;
                }
            }
        }
    }

    function getId($user){
        $conn = connect();

        $getId = $conn->prepare("SELECT * FROM usuarios WHERE userUsuario = :userUsuario");
        $getId->bindParam(':userUsuario', $user, PDO::PARAM_STR);
        $getId->execute();
        $res = $getId->fetchAll(PDO::FETCH_ASSOC);
        $id = 0;
        if(!empty($res)){
            foreach($res as $rows){
                return $rows["idUsuario"];
            }
        } else {
            return 0;
        }        
    }

    function createEstacionamento($user){
        $nome = $_POST["nomeEstacionamento"];
        $vagas = $_POST["qtdVagasEstacionamento"];

        if(!empty($nome)){
            $id = getId($user);

            $conn = connect();
            $stmt = $conn->prepare("INSERT INTO estacionamentos(nomeEstacionamento, vagasEstacionamento, idProprietario) VALUES(:nomeEstacionamento, :vagasEstacionamento, $id)");
            $stmt->bindParam(':nomeEstacionamento', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':vagasEstacionamento', $vagas, PDO::PARAM_INT);

            $stmt->execute();

            header("Location: perfil.php");
        }
    }

    function getEstacionamentos($user){
        $conn = connect();
        $id = getId($user);
        
        $stmt = $conn->prepare("SELECT * FROM estacionamentos WHERE idProprietario = :idUsuario");
        $stmt->bindParam(':idUsuario', $id, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($res)){
            foreach($res as $rows){
                $idEs = $rows["idEstacionamento"];
                echo '<a href="sistema.php/?id='.$idEs.'" class="perfil-container-card">'.
                    getEstacionamentoInfo($idEs, "nome").'
                </a>';
            }
        }
        echo '<div class="perfil-container-card-create" onclick="toggleModal(1)">
            <i class="fa-solid fa-car fa-2xl"></i><i class="fa-solid fa-plus fa-xl"></i>
        </div>';
    }

    function getEstacionamentoInfo($id, $info){
        $conn = connect();
        $getInfo = $conn->prepare("SELECT * FROM estacionamentos WHERE idEstacionamento = :idEstacionamento");
        $getInfo->bindParam('idEstacionamento', $id, PDO::PARAM_STR);
        $getInfo->execute();
        $res = $getInfo->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($res)){
            foreach($res as $rows){
                $nomees = $rows["nomeEstacionamento"];
                $vagases = $rows["vagasEstacionamento"];
                if($info == "nome"){
                    return $nomees;
                } else if($info == "vagas"){
                    return $vagases;
                } else if($info == "vagasDisponiveis"){
                    $getVagasOcup = $conn->prepare("SELECT * from vagas WHERE idEstacionamento = :id");
                    $getVagasOcup->bindParam('id', $id, PDO::PARAM_INT);
                    $getVagasOcup->execute();
                    
                    if(!empty($getVagasOcup)){
                        $vagasOcup = $vagases - $getVagasOcup->rowCount();
                        return $vagasOcup;
                    } else {
                        return $getVagasTotal;
                    }
                }
            }
        } else {
            return "Não encontrado.";
        }
    }

    function getVagasCards($id){
        $qtdVagas = getEstacionamentoInfo($id, "vagas");
        echo '<div class="sistema-container-vagas">';
        for($i = 1; $i <= $qtdVagas; $i++){
            $stts = getVagaStatus($id, $i);
            if($stts == 0){
                echo '
                <div class="sistema-container-vaga-desocupada" onclick="toggleVagaModal(1)">
                    '.$i.'
                </div>';
            } else {
                echo '
                <div class="sistema-container-vaga-ocupada" onclick="toggleVagaModal(1)">
                    '.$i.'
                </div>';
            }
        }
        echo '</div>
        </div>';      
    }

    function getVagaStatus($id, $vaga){
        $conn = connect();
        $getVagaStts = $conn->prepare("SELECT * from vagas WHERE idEstacionamento = :id");
        $getVagaStts->bindParam('id', $id, PDO::PARAM_INT);
        $getVagaStts->execute();
        $res = $getVagaStts->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($res)){
            foreach ($res as $vagas) {
                if ($vagas['numeroVaga'] == $vaga) {
                    return 1;
                } else {
                    return 0;
                }
            }
        } else {
            return 0;
        }
    }

    function toggleVagaStatus($id, $vaga){

    }

    function setErro($erro){
        $erros = array("Usuário inexistente.", "Usuário já registrado.", "Senha incorreta.", "Email já registrado.");
        $_SESSION["erro"] = $erros[$erro];
    }

    function getErros(){
        if(isset($_SESSION["erro"])){
            $erro = $_SESSION["erro"];
            echo "<p id='erro'> Tente novamente: $erro </p>";
            unset($_SESSION["erro"]);
        }
    }
?>