let password = document.getElementById("password");
let password2 = document.getElementById("confirm");
let form = document.getElementById("reg");
form.addEventListener('submit', event => {
    if (password.value !== password2.value) {
        event.preventDefault();
        alert("Passwords does not match!");
    }
})