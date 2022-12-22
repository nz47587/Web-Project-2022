var emailError = document.getElementById('email-error');
var pwdError = document.getElementById('pwd-error');
var submitError = document.getElementById('submit-error');

var passRegex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;



function validateEmail(){
    var email = document.getElementById('contact-email').value;

    if(email.length == 0){
        emailError.innerHTML = 'Email is required';
        return false;
    }
    if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        emailError.innerHTML = 'Email is invalid';
        return false;
    }

    emailError.innerHTML = 'valid';
    return true;

}


function validatePwd(){
    var pwd = document.getElementById('contact-pwd').value;

    if(pwd == 0){
        pwdError.innerHTML = "Password is required";
        return false;
    }
    if(!passRegex.test(pwd)){
        pwdError.innerHTML = "Password is invalid";
        return false;
    }
    pwdError.innerHTML = "Valid";
    return true;
}

function validateForm(){
    if(!validateEmail() || !validatePwd()){
            submitError.innerHTML = "Validation not met";
            return false;
    }
}