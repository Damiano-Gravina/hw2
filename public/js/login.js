function visualizePassword(){
    if (visible == false){
        visibility = document.querySelector(".material-symbols-outlined");
        visibility.textContent = "visibility";
        password = document.querySelector("#label_password");
        password.type = "text";
        visible = true;
    }
    else{
        visibility = document.querySelector(".material-symbols-outlined");
        visibility.textContent = "visibility_off";
        password = document.querySelector("#label_password");
        password.type = "password";
        visible = false;
    }
}


function checkForm(event){
    const username = document.querySelector('#label_username input');
    const password = document.querySelector('#label_password');
    let usernameBool = false;
    let passwordBool = false;

    if (username.value.length > 0) {
        usernameBool = true;
    }  

    if(password.value.length > 0){
        passwordBool = true;
    }
    
    if(usernameBool == false || passwordBool == false){
        event.preventDefault();
        errorWindow = document.querySelector('.errorWindow');
        errorWindow.parentNode.classList.remove('hide');
    }
}


document.querySelector('#regist').addEventListener('click', checkForm);
document.querySelector(".material-symbols-outlined").addEventListener("click", visualizePassword )

visible = false;
