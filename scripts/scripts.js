function toggleMethod(button){
    if(button == 0){
        document.querySelector('.container-login').style.display = "none";
        document.querySelector('.container-register').style.display = "grid";
    } else if(button == 1){
        document.querySelector('.container-login').style.display = "grid";
        document.querySelector('.container-register').style.display = "none";       
    }
}

function togglePerfil(button){
    if(button == 0){
        document.getElementById('perfil-sistema').style.display = "flex";
        document.getElementById('perfil-editar').style.display = "none";

    } else if(button == 1){
        document.getElementById('perfil-sistema').style.display = "none";
        document.getElementById('perfil-editar').style.display = "flex";
    }
}

function toggleModal(button){
    if(button == 0){
        document.getElementById('perfil-container-modal').style.display = "none";
    } else if(button == 1){
        document.getElementById('perfil-container-modal').style.display = "grid";
    }
}

function toggleVagaModal(button) {
    if(button == 0){
        document.getElementById('sistema-container-modal').style.display = "none";
    } else if(button >= 1){
        document.getElementById('sistema-container-modal').style.display = "grid";
        document.getElementById('sistema-modal-title-toggleVaga').innerHTML = "Gerenciar vaga #" + button;
        document.getElementById('numeroVaga').value = button;
    }
}

function toggleSistemaModal(button){
    if(button == 0) {
        document.getElementById('sistema-container-modal-alterName').style.display = "none";
        document.getElementById('sistema-container-modal-alterVagas').style.display = "none";
        document.getElementById('sistema-container-modal-excluir').style.display = "none";
        document.getElementById('sistema-container-modal-gerarCodigo').style.display = "none";
        document.getElementById('sistema-container-modal-listarFuncionarios').style.display = "none";
    } else if(button == 1) {
        document.getElementById('sistema-container-modal-alterName').style.display = "grid";
    } else if(button == 2) {
        document.getElementById('sistema-container-modal-alterVagas').style.display = "grid";
    } else if(button == 3) {
        document.getElementById('sistema-container-modal-excluir').style.display = "grid";
    } else if(button == 4) {
        document.getElementById('sistema-container-modal-gerarCodigo').style.display = "grid";
    } else if(button == 5) {
        document.getElementById('sistema-container-modal-listarFuncionarios').style.display = "grid";
    }
}