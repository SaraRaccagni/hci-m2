/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkUserLog()
{
    userName = $("#userNameLog");//recupero il riferimento al campo title (input con id=title) della form
    userName_msg = $("#invalid-userNameLog");//è lo span in cui verrà inserito il messaggio d'errore (in editBookBotstrap)

    password= $("#passwordLog");
    password_msg = $("#invalid-passwordLog");

    error = false;

    userName_msg.html("");
    password_msg.html("");
    
    //verifico che il titolo non sia vuoto, il trim toglie tuti gli spazi prima e dopo la stringa
    //-> è un controllo per evitare che l'utente inserisca solo la stringa vuota
    if (userName.val().trim() === "")
    {
        userName_msg.html("The Username field must not be empty");//messaggio d'errore
        userName.focus();//sposta il cursore sul campo da non lasciar vuoto
        error = true;
    }else if(password.val().trim() === "")
    {
        password_msg.html("The Password field must not be empty");//messaggio d'errore
        password.focus();//sposta il cursore sul campo da non lasciar vuoto
        error = true;
    }

    if(!error){
        $('form[name=login-form]').submit();//meglio on() o trigger()
    }
}

//VERIFICA CHE I CAMPI DELLA FORM DI REGISTRAZIONE NON SIANO VUOTI E CHE LO USERNAME NON ESISTO GIA'   
function checkUserReg(users_array)
{
    userName = $("#userNameReg");//recupero il riferimento al campo title (input con id=title) della form
    userName_msg = $("#invalid-userName");//è lo span in cui verrà inserito il messaggio d'errore (in editBookBotstrap)
    
    email= $("#emailReg");
    email_msg = $("#invalid-email");

    password= $("#passwordReg");
    password_msg = $("#invalid-password");

    confirmPassword= $("#confirm-password");
    confirm_msg = $("#invalid-confirm");

    var regularExpression = new RegExp("^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$","g");
    error = false;

    userName_msg.html("");
    email_msg.html("");
    password_msg.html("");
    confirm_msg.html("");
    
    //verifico che il titolo non sia vuoto, il trim toglie tuti gli spazi prima e dopo la stringa
    //-> è un controllo per evitare che l'utente inserisca solo la stringa vuota
    if (userName.val().trim() === "")
    {
        userName_msg.html("The Username field must not be empty");//messaggio d'errore
        userName.focus();//sposta il cursore sul campo da non lasciar vuoto
        error = true;
    }else if(email.val().trim() === "")
    {
        email_msg.html("The Email field must not be empty");//messaggio d'errore
        email.focus();//sposta il cursore sul campo da non lasciar vuoto
        error = true;
    }else if(!email.val().trim().match(regularExpression))
    {
        email_msg.html("The Email must contains letters, digits and @");//messaggio d'errore
        email.focus();//sposta il cursore sul campo da non lasciar vuoto
        error = true;
    }else if(password.val().trim() === "")
    {
        password_msg.html("The Password field must not be empty");//messaggio d'errore
        password.focus();//sposta il cursore sul campo da non lasciar vuoto
        error = true;
    }else if(confirmPassword.val().trim() === "")
    {
        confirm_msg.html("The Confirm Password field must not be empty");//messaggio d'errore
        confirmPassword.focus();//sposta il cursore sul campo da non lasciar vuoto
        error = true;
    }

    if (!error)//questa parte di codice viene eseguita se non c'è stato errore
    {
            if(password.val().trim() != confirmPassword.val().trim()){
                error= true;
                confirm_msg.html("Password and Confirm Passwor don't match");
                confirmPassword.focus();
            }
        }


    if(!error){
        $('form[name=register-form]').submit();//meglio on() o trigger()
        
    }
}




