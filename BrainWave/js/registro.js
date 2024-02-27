function redirect() {
    if (registro()) {
        showErrorPassword('Cuenta creada!');
        // Redirigir a otra página
        window.location.href = "home.php";
    } else {
        showError('Por favor ingrese los datos correctos.');
    }
}


// Función para validar el correo electrónico
function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
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

function showErrorName(msj) {
    const errorDiv = document.getElementById("error_name");
    errorDiv.textContent = msj;
    errorDiv.style.display = 'block';
}

function hideErrorName() {
    const errorDiv = document.getElementById("error_name");
    errorDiv.textContent = '';
    errorDiv.style.display = 'none';
}

function showErrorLastN(msj) {
    const errorDiv = document.getElementById("error_lastname");
    errorDiv.textContent = msj;
    errorDiv.style.display = 'block';
}

// Función para ocultar mensajes de error del apellido
function hideErrorLastN() {
    const errorDiv = document.getElementById("error_lastname");
    errorDiv.textContent = '';
    errorDiv.style.display = 'none';
}

function showErrorMail(msj) {
    const errorDiv = document.getElementById("error_mail");
    errorDiv.textContent = msj;
    errorDiv.style.display = 'block';
}

// Función para ocultar mensajes de error del mail
function hideErrorMail() {
    const errorDiv = document.getElementById("error_mail");
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

function registro() {
    const user_R = document.getElementById("username");
    const nom_R = document.getElementById("nombre");
    const apell_R = document.getElementById("apellido");
    const mail_R = document.getElementById("email");
    const pwd_R = document.getElementById("password");
    const registrationButton = document.getElementById('btn_R');

    let valid = true;

    if (user_R.value.trim() === '') {
        showErrorUser('Por favor ingrese un nombre de usuario.');
        valid = false;
    } else {
        hideErrorUser();
    }

    if (nom_R.value.trim() === '') {
        showErrorName('Por favor ingrese su nombre.');
        valid = false;
    } else {
        hideErrorName();
    }

    if (apell_R.value.trim() === '') {
        showErrorLastN('Por favor ingrese sus apellidos.');
        valid = false;
    } else {
        hideErrorLastN();
    }

    if (mail_R.value.trim() === '') {
        showErrorMail('Por favor ingrese su correo electrónico.');
        valid = false;
    } else if (!isValidEmail(mail_R.value.trim())) {
        showErrorMail('Por favor ingrese un correo electrónico válido.');
        valid = false;
    } else {
        hideErrorMail();
    }

    if (pwd_R.value.trim() === '') {
        showErrorPassword('Por favor ingrese una contraseña.');
        valid = false;
    } else if (!validatePassword(pwd_R.value.trim())) {
        showErrorPassword('La contraseña debe tener al menos una letra mayúscula, un número y tener como mínimo 7 caracteres.');
        valid = false;
    } else {
        hideErrorPassword();
    }

    registrationButton.disabled = !valid;

    return valid;
}

// Event listener para validar el formulario de registro en el envío
document.getElementById('myForm').addEventListener('submit', function(event) {
    if (!registro) {
        event.preventDefault();
    }
});

// Event listener para validar el formulario de registro en cada cambio de entrada
document.querySelectorAll('.user-box input').forEach(input => {
    input.addEventListener('input', registro);
});

// Función para mostrar/ocultar la contraseña en el formulario de registro
function togglePasswordVisibility() {
    const pwd_R = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');

    if (pwd_R.type === 'password') {
        pwd_R.type = 'text';
        eyeIcon.src = '../img/eye-open.png';
    } else {
        pwd_R.type = 'password';
        eyeIcon.src = '../img/eye-close.png';
    }
}