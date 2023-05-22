// Primer formulario
const btnLogin = document.querySelector('input[value="Iniciar sesión"]');

// Segundo formulario
const btnLogin2 = document.querySelector('#boton2');
const inputEmail2 = document.querySelector('#email2');
const inputPassword2 = document.querySelector('#password2');
const checkRemember2 = document.querySelector('#remember2');

btnLogin.addEventListener('click', testLogin);

async function generateToken() {
    const inputEmail = document.querySelector('#email').value;
    const inputPassword = document.querySelector('#password').value;

    let data = {
        'email': inputEmail,
        'password': inputPassword
    }

    await fetch(`${location.origin}/api/getToken`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(response => {
        return response.json()
    }).then(data => {
        if (data['success']) {
            localStorage.setItem('email', data['email']);
            localStorage.setItem('token', data['token']);
            console.log(data);
        } else {
            console.log(data);
        }
    })
}

async function testLogin(e) {
    e.preventDefault();

    await generateToken();

    const inputEmail = document.querySelector('#email').value;
    const inputPassword = document.querySelector('#password').value;
    const checkRemember = document.querySelector('#remember').checked;

    if (checkRemember) {
        checkRemember2.click();
    }
    inputEmail2.value = inputEmail;
    inputPassword2.value = inputPassword;

    btnLogin2.click();
}
