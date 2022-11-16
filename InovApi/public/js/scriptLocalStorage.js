var inputPassword = document.getElementById('inputPassword');
var inputUsername = document.getElementById('inputUsername');
var bouton = document.getElementById('connect');

bouton.addEventListener('click', storeData);

function storeData() {
    let username = inputUsername.value;
    let password = inputPassword.value;
    localStorage.setItem('username', username);
    localStorage.setItem('password', password);
}