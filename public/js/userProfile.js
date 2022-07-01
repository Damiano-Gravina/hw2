function emailVisualization(){
    emailBoolean = document.querySelector("#visualizeEmail").textContent;
    emailButton = document.querySelector("#email_button");


    if(emailBoolean == 1){
        emailButton.textContent = "Nascondi Email agli utenti";

    }else{
        emailButton.textContent = "Rendi Email visibile agli utenti";
    }
}

emailVisualization();