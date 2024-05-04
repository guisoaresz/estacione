function toggleMethod(button){
    if(button == 0){
        document.querySelector('.container-login').style.display = "none";
        document.querySelector('.container-register').style.display = "grid";
    } else if(button == 1){
        document.querySelector('.container-login').style.display = "grid";
        document.querySelector('.container-register').style.display = "none";       
    }
}