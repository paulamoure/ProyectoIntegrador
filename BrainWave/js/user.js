function login() {
    const sampleAccounts = [ ["Paula", "Paula123"],  ["Miguel", "Maiky123"], ["Alicia", "Alicia000"] ];
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const errorInput = document.getElementById("error_pwd");

    const match = sampleAccounts.find(account => account[0] === username && account[1] === password);

    if (match) {
        // Si coincide con una de las cuentas, redirige a index.html
        window.location.href = "index.html";
    } else {
        // Si no, muestra un mensaje de error
        showError(errorInput, 'Usuario o contraseña incorrecta.');
    }
}

// Función para validar el nombre de usuario
function validateUsername(username) {
    const regex = /^[a-zA-Z0-9]+$/;
    return regex.test(username);
}

// Función para validar la contraseña
function validatePassword(password) {
    // Al menos una letra mayúscula, un número y longitud mínima de 7 caracteres
    const regex = /^(?=.*[A-Z])(?=.*\d).{7,}$/;
    return regex.test(password);
}

// Función para mostrar mensajes de error
function showError(element, msj) {
    const errorDiv = element.nextElementSibling;
    errorDiv.textContent = msj;
    errorDiv.style.display = 'block';
}
// Función para ocultar mensajes de error
function hideError(element) {
    const errorDiv = element.nextElementSibling;
    errorDiv.textContent = '';
    errorDiv.style.display = 'none';
}

function showErrorUser(msj) {
    const errorDiv = document.getElementById("error_user");
    errorDiv.textContent = msj;
    errorDiv.style.display = 'block';
}

// Función para ocultar mensajes de error del usuario
function hideErrorUser() {
    const errorDiv = document.getElementById("error_user");
    errorDiv.textContent = '';
    errorDiv.style.display = 'none';
}

// Función para mostrar mensajes de error de la contraseña
function showErrorPassword(msj) {
    const errorDiv = document.getElementById("error_pwd");
    errorDiv.textContent = msj;
    errorDiv.style.display = 'block';
}

// Función para ocultar mensajes de error de la contraseña
function hideErrorPassword() {
    const errorDiv = document.getElementById("error_pwd");
    errorDiv.textContent = '';
    errorDiv.style.display = 'none';
}

// Función para validar el formulario de inicio de sesión
function validateForm() {
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const loginButton = document.getElementById('login-btn');

    let valid = true;

    if (usernameInput.value.trim() === '') {
        showErrorUser('Por favor ingrese un nombre de usuario.');
        valid = false;
    } else if (!validateUsername(usernameInput.value.trim())) {
        showErrorUser('El nombre de usuario solo puede contener letras y números.');
        valid = false;
    } else {
        hideErrorUser();
    }

    if (passwordInput.value.trim() === '') {
        showErrorPassword('Por favor ingrese una contraseña.');
        valid = false;
    } else if (!validatePassword(passwordInput.value.trim())) {
        showErrorPassword('La contraseña debe tener al menos una letra mayúscula, un número y tener como mínimo 7 caracteres.');
        valid = false;
    } else {
        hideErrorPassword();
    }

    loginButton.disabled = !valid;

    return valid;
}


// Event listener para validar el formulario en el envío
document.getElementById('myForm').addEventListener('submit', function(event) {
    if (!validateForm()) {
        event.preventDefault();
    }
});
// Event listener para validar el formulario en cada cambio de entrada
document.getElementById('username').addEventListener('input', validateForm);
document.getElementById('password').addEventListener('input', validateForm);

// Función para mostrar/ocultar la contraseña
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.src = '../img/eye-open.png';
    } else {
        passwordInput.type = 'password';
        eyeIcon.src = '../img/eye-close.png';
    }
}