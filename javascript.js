
login_button.addEventListener('click', funclogin)

register_button.addEventListener('click', funcregister)

var login = document.getElementById('login')

var register = document.getElementById('register')

register.style.display = 'none'

function funclogin(e) {
    register.style.display = 'none'
    login.style.display = 'block'
}

function funcregister(e) {
    login.style.display = 'none'
    register.style.display = 'block'
}