var nameError = document.getElementById('name-error');
var usernameError = document.getElementById('username-error');
var emailError = document.getElementById('email-error');
var pwdError = document.getElementById('pwd-error');
var submitError = document.getElementById('submit-error');

var nameRegex = /^[A-Za-z]{2,10}/;
var usernameRegex = /^[A-Za-z]{8,12}/;
var emailRegex = /^\w+[._-]?\w+@[a-z]+\.[a=z]{2,3}/; //forme standarde per email
var passRegex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;


function validateName(){
    var name = document.getElementById('contact-name').value;

    if(name.length == 0){
        nameError.innerHTML = "Name is required";
        return false;
    }
    if(!nameRegex.test(name)){
        nameError.innerHTML = "Name is invalid";
        return false;
    }
    nameError.innerHTML = "Valid";
    return true;
    
}   


function validateUsername(){
    var username = document.getElementById('contact-username').value;

    if(username.length == 0){
        usernameError.innerHTML = "Username is required";
        return false;
    }
    if(!usernameRegex.test(username)){
        usernameError.innerHTML = "Username is invalid";
        return false;
    }
    usernameError.innerHTML = "Valid";
    return true;
    
}

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
    if(!validateName() || !validateUsername() || !validateEmail() || !validatePwd()){
            submitError.innerHTML = "Validation not met";
            return false;
    }
}
