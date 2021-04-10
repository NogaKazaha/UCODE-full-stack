let password = document.getElementById("password");
let password2 = document.getElementById("confirm");
function checkPass() {
    if (password.value !== password2.value) {
        alert("Passwords does not match!");
    }
}