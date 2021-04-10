let password = document.getElementById("password");
let password2 = document.getElementById("confirm");
function checkPass() {
    if (password.value !== password2.value) {
        alert("Passwords does not match!");
    }
}
let LoginPage = document.getElementsByClassName("login")[0];
let registrationPage = document.getElementsByClassName("register")[0];
let remindPage = document.getElementsByClassName("reminder")[0];
function changePage(option) {
    switch(option){
        case 'login': 
            registrationPage.style.display = "none";
            remindPage.style.display = "none";
            LoginPage.style.display = "block";
            break;
        case 'register': 
            LoginPage.style.display = "none";
            remindPage.style.display = "none";
            registrationPage.style.display = "block";
            break;
        case 'reminder': 
            registrationPage.style.display = "none";
            LoginPage.style.display = "none";
            remindPage.style.display = "block";
            break;
    }
}
