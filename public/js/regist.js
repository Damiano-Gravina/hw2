function OnResponse(response){
    return response.json();
}

function onUsernameJson(json){
    const username = document.querySelector('.username input');
    const warning = username.parentNode.parentNode.querySelector('span');
    warning.classList.add('hide');
    username.classList.remove('error');
    formStatus.username = true;
    formStatus.username = !json.exists;

    if(formStatus.username == false){
        username.classList.add('error');
        warning.textContent = "Username non disponibile";
        warning.classList.remove('hide');
        formStatus.username = false;
    }
}

function onEmailJson(json){
    const email = document.querySelector('.email input');
    const warning = email.parentNode.parentNode.querySelector('span');
    warning.classList.add('hide');
    email.classList.remove('error');
    formStatus.email = true;
    formStatus.email = !json.exists;
    
    if(formStatus.email == false){
        email.classList.add('error');
        warning.textContent = "Email non disponibile";
        warning.classList.remove('hide');
        formStatus.email = false;
    }
}


function checkForm(event){
    const name = document.querySelector('.name input');
    const surname = document.querySelector('.surname input');

    if (name.value.length > 0) {
        formStatus.name= true;
    }  

    if(surname.value.length > 0){
        formStatus.surname = true;
    }
    
    if(formStatus.name == false || formStatus.surname == false || formStatus.username == false ||
        formStatus.password == false || formStatus.confirm_password == false || formStatus.email == false){
        event.preventDefault();
        console.log(formStatus.name);
        errorWindow = document.querySelector('.errorWindow')
        errorWindow.parentNode.classList.remove('hide');
    }
}



function checkName(value) {
    const elem = value.currentTarget;
    const warning = elem.parentNode.parentNode.querySelector('span');

    if (elem.value.length > 0){
        warning.classList.add('hide');
        elem.classList.remove('error');

    } else {
        elem.classList.add('error');
        warning.textContent = "Riempire il campo";
        warning.classList.remove('hide');
    } 
}


function checkUsername(value) {
    const username = value.currentTarget;
    const warning = username.parentNode.parentNode.querySelector('span');
    warning.classList.add('hide');
    username.classList.remove('error');
    formStatus.username = true;
    
    if(!/^[a-zA-Z0-9_]{1,15}$/.test(username.value)) {
        username.classList.add('error');
        warning.textContent = "Ammessi lettere, numeri e underscore, Max 15";
        warning.classList.remove('hide');
        formStatus.username = false;
    } else{
        fetch("register/username/"+encodeURIComponent(username.value)).then(OnResponse).then(onUsernameJson);
    }
}


function checkEmail(value) {
    const email = value.currentTarget;
    const warning = email.parentNode.parentNode.querySelector('span');
    warning.classList.add('hide');
    email.classList.remove('error');
    formStatus.email = true;
    
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(email.value).toLowerCase())) {
        email.classList.add('error');
        warning.textContent = "Formato e-mail non corretto";
        warning.classList.remove('hide');
        formStatus.email = false;
    }else{
        fetch("register/email/"+encodeURIComponent(email.value)).then(OnResponse).then(onEmailJson);
    }
}


function checkPassword(value) {
    const password = value.currentTarget;
    const warning = password.parentNode.parentNode.querySelector('span');
    warning.classList.add('hide');
    password.classList.remove('error');
    formStatus.password = true;
    
    if(password.value.length < 8) {
        password.classList.add('error');
        warning.textContent = "Lunghezza minima 8 caratteri";
        warning.classList.remove('hide');
        formStatus.password = false;
    } 
}


function checkConfirmPassword(value) {
    const checkPW = value.currentTarget;
    const password = document.querySelector('.password input');
    const warning = checkPW.parentNode.parentNode.querySelector('span');
    warning.classList.add('hide');
    checkPW.classList.remove('error');
    formStatus.confirm_password = true;
    
    if(checkPW.value !== password.value) {
        checkPW.classList.add('error');
        warning.textContent = "Questo campo e Password sono diversi";
        warning.classList.remove('hide');
        formStatus.confirm_password = false;
    } 
}

const formStatus = {'name' : false,
                    'surname' : false,
                    'email' : false,
                    'password' : false,
                    'confirm_password' : false
};




document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkName);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword);

document.querySelector('#regist').addEventListener('click', checkForm);



