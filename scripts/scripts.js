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