<?php
require_once 'conecta.php';

// Manejar el envío del formulario de contacto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    // Conexión a la base de datos
    $conexion = getConexion();

    // Insertar datos en la tabla contactos
    $consulta = "INSERT INTO contactos (nombre, email, asunto, mensaje) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, 'ssss', $nombre, $email, $asunto, $mensaje);

    if (mysqli_stmt_execute($stmt)) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainWave | Sobre Nosotros</title>
    <link rel="stylesheet" href="../css/aboutUs.css" />
    <style>
        .error {
            color: orange;
        }
    </style>
</head>
<body>
    
    
    <div class="about-us">
        <div class="div">
            <div class="overlap">
                <div class="background"></div>
                <img class="img" src="../img/background.svg" />
                <div class="background-2"></div>
                <div class="botn">
                    <div class="overlap-group">
                        <img class="arrow" src="../img/flecha-derecha.png" />
                        <div class="ver-m-s">Ver Más</div>
                    </div>
                </div>
                <div class="team-block">
                    <div class="overlap-2">
                        <div class="team">
                            <div class="overlap-3">
                                <div class="background-3"></div>
                                <div class="background-4"></div>
                            </div>
                            <div class="image-placeholder-wrapper">
                                <img class="image-placeholder" src="../img/portada-2.png" />
                            </div>
                            <div class="overlap-group-2"></div>
                            <div class="background-5"></div>
                        </div>
                        <div class="img-wrapper"><img class="image-placeholder-2" src="../img/portada-3.png" /></div>
                        <div class="team-2"><img class="image-placeholder" src="../img/portada-4.png" /></div>
                        <div class="team-3"><img class="image-placeholder" src="../img/portada-5.png" /></div>
                        <div class="team-4"><img class="image-placeholder-2" src="../img/portada-6.png" /></div>
                        <div class="team-5"><img class="image-placeholder" src="../img/portada-1.png" /></div>
                        <img class="rectangle" src="../img/rectangle-29.png" />
                    </div>

    <h2>Contactanos</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="contactForm">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <span class="error" id="error_nombre"></span><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" required>
        <span class="error" id="error_email"></span><br>

        <label for="asunto">Asunto:</label>
        <input type="text" name="asunto" id="asunto" required>
        <span class="error" id="error_asunto"></span><br>

        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje" required></textarea>
        <span class="error" id="error_mensaje"></span><br>

        <input type="submit" value="Enviar" id="submit-btn" disabled>
    </form>

    <script>
        // Funciones para validar el formulario de contacto
        function validateContactForm() {
            const nombreInput = document.getElementById('nombre');
            const emailInput = document.getElementById('email');
            const asuntoInput = document.getElementById('asunto');
            const mensajeInput = document.getElementById('mensaje');
            const submitButton = document.getElementById('submit-btn');

            let valid = true;

            if (nombreInput.value.trim() === '') {
                showError(nombreInput, 'Por favor ingrese su nombre.', 'error_nombre');
                valid = false;
            } else {
                hideError(nombreInput, 'error_nombre');
            }

            if (emailInput.value.trim() === '') {
                showError(emailInput, 'Por favor ingrese su correo electrónico.', 'error_email');
                valid = false;
            } else if (!validateEmail(emailInput.value.trim())) {
                showError(emailInput, 'Ingrese una dirección de correo electrónico válida.', 'error_email');
                valid = false;
            } else {
                hideError(emailInput, 'error_email');
            }

            if (asuntoInput.value.trim() === '') {
                showError(asuntoInput, 'Por favor ingrese el asunto del mensaje.', 'error_asunto');
                valid = false;
            } else {
                hideError(asuntoInput, 'error_asunto');
            }

            if (mensajeInput.value.trim() === '') {
                showError(mensajeInput, 'Por favor ingrese su mensaje.', 'error_mensaje');
                valid = false;
            } else {
                hideError(mensajeInput, 'error_mensaje');
            }

            submitButton.disabled = !valid;

            return valid;
        }

        // Función para validar el formato del correo electrónico
        function validateEmail(email) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

        // Event listener para validar el formulario en el envío
        document.getElementById('contactForm').addEventListener('submit', function (event) {
            if (!validateContactForm()) {
                event.preventDefault();
            }
        });

        // Event listeners para validar el formulario en cada cambio de entrada
        document.getElementById('nombre').addEventListener('input', function () {
            validateContactForm();
        });
        document.getElementById('email').addEventListener('input', function () {
            validateContactForm();
        });
        document.getElementById('asunto').addEventListener('input', function () {
            validateContactForm();
        });
        document.getElementById('mensaje').addEventListener('input', function () {
            validateContactForm();
        });

        // Función para mostrar mensajes de error
        function showError(element, msj, errorId) {
            const errorDiv = document.getElementById(errorId);
            errorDiv.textContent = msj;
            errorDiv.style.display = 'block';
        }

        // Función para ocultar mensajes de error
        function hideError(element, errorId) {
            const errorDiv = document.getElementById(errorId);
            errorDiv.textContent = '';
            errorDiv.style.display = 'none';
        }
    </script>
</body>
</html>


                        
                        <br>
                        <br>
                        <br>
                        <br>

                    </div>
                    <img class="rectangle-2" src="../img/Ico-3.png" />
                    <img class="rectangle-3" src="../Ico-2.png" />
                    <img class="rectangle-4" src="../Ico-1.png" />
                    <img class="rectangle-5" src="../Ico-3.png"/>
                    <img class="rectangle-7" src="../Ico-1.png" />
                    <img class="rectangle-8" src="../Ico-4.png" />
                    <img class="rectangle-9" src="../Ico-2.png" />
                    <img class="rectangle-10" src="../Ico-6.png" />
                    <img class="rectangle-11" src="../Ico-4.png" />
                    <img class="rectangle-12" src="../img/Ico-6.png" />
                    <img class="rectangle-13" src="../img/Ico-1.png" />
                    <img class="rectangle-14" src="../img/Ico-4.png" />
                    <img class="rectangle-15" src="../img/Ico-2.png" />
                    <img class="rectangle-16" src="../img/Ico-1.png" />
                    <img class="rectangle-17" src="../img/Ico-3.png" />
                    <img class="rectangle-18" src="../img/Ico-5.png" />
                    <div class="brain-wave-team">BRAIN WAVE TEAM PROGRAMAS</div>
                    <div class="brain-wave">BRAIN WAVE</div>
                    <div class="boton-secundario"><button class="button">APUNTARME</button></div>
                    <div class="button-wrapper"><button class="button">APUNTARME</button></div>
                    <div class="div-wrapper"><button class="button">UNIRME</button></div>
                    <div class="boton-secundario-2"><button class="button">APUNTARME</button></div>
                    <div class="boton-secundario-3"><button class="button">LEER</button></div>
                    <div class="boton-secundario-4"><button class="button">VER</button></div>

                    

                    <footer class="footer">
                        <div class="overlap-4">
                            <div class="text-wrapper">BRAINWAVE</div>
                            <div class="rectangle-19"></div>
                            <div class="misc"></div>
                            <div class="contacto">
                                <div class="subscribe-wrapper"><div class="subscribe">SUBSCRIBE</div></div>
                                <div class="text-wrapper-2"></div>
                                <div class="text-wrapper-3"></div>
                            </div>
                            <div class="footer-2">
                                <img class="rectangle-20" src="../img/instagram.png" />
                                <img class="rectangle-21" src="../img/Twitter.png" />
                                <img class="rectangle-22" src="../img/facebook.png" />
                                <div class="botn-contacto">
                                    <div class="contactanos-wrapper"><div class="contactanos">CONTACTANOS</div></div>
                                </div>
                                <div class="redes-sociales">REDES SOCIALES</div>
                                <div class="politica-de">POLITICA DE PRIVACIDAD</div>
                                <div class="disclamer">DISCLAMER</div>
                                <div class="terminos-de-uso">TERMINOS DE USO</div>
                            </div>
                            <p class="element-calle-de-la">123 CALLE DE LA SERENIDAD, DISTRITO CREATIVO</p>
                            <div class="brain-wave-us-gmail">BRAIN.WAVE.US@GMAIL.COM</div>
                            <p class="brainwave-copyright">BRAINWAVE COPYRIGHT - OWN ELEMENTS</p>
                        </div>



                    </footer>
                </div>
                <div class="overlap-5">
                    <div class="overlap-6">
                        <div class="pics">
                            <div class="overlap-7">
                                <p class="emb-rcate-en-un">
                                    EMBÁRCATE EN UN VIAJE DE DESCUBRIMIENTO Y CONEXIÓN EN &#39;MENTES EN SINTONÍA&#39;. ESTE FESTIVAL
                                    ÚNICO CELEBRA LA DIVERSIDAD Y CREATIVIDAD DE LAS MENTES AFECTADAS POR EL TDAH. ÚNETE A NOSOTROS PARA
                                    UNA JORNADA LLENA DE INSPIRACIÓN, APRENDIZAJE Y SOLIDARIDAD
                                </p>
                                <img class="right-column" src="../img/right-column.png" />
                            </div>
                        </div>
                        <img class="rectangle-23" src="../img/rectangle-206.svg" />
                        <img class="rectangle-24" src="../img/rectangle-207.svg" />
                        <img class="rectangle-25" src="../img/rectangle-208.svg" />
                        <p class="element-de-octubre-dia">27 DE OCTUBRE<br />DIA DEL TDAH</p>
                        <p class="mentes-en-sinton-a">
                            <span class="span">Mentes en Sintonía: Un Festival de Conexión TDAH<br /></span>
                            <span class="text-wrapper-4"><br /></span>
                        </p>
                        <p class="libera-tu-potencial">LIBERA TU POTENCIAL: TDAH EN FOCO</p>
                        <div class="left-column">
                            <div class="overlap-8">
                                <img class="brainwave-descubre" src="../img/brainwave-descubre-nuestros-proyectos-y-nete-a-ellos.svg" />
                                <div class="proyectos-brain-wave">PROYECTOS BRAIN WAVE</div>
                            </div>
                        </div>
                    </div>
                    <div class="boton-primario"><div class="i-nscribete">INSCRÍBETE</div></div>
                    <p class="bienvenido-a-la">
                        BIENVENIDO A LA PLATAFORMA DONDE LA INNOVACIÓN Y LA CONEXIÓN SE ENCUENTRAN: BRAINWAVE. TE INVITAMOS A
                        EXPLORAR NUESTROS PROYECTOS DISEÑADOS EXCLUSIVAMENTE PARA TI. DESDE EVENTOS INSPIRADORES HASTA EXPERIENCIAS
                        EDUCATIVAS, CADA PROYECTO ESTÁ DISEÑADO PARA CELEBRAR LA DIVERSIDAD Y DESATAR EL POTENCIAL ÚNICO DE LAS
                        MENTES AFECTADAS POR EL TDAH. ÚNETE A NOSOTROS EN ESTE EMOCIONANTE VIAJE HACIA EL DESCUBRIMIENTO PERSONAL Y
                        EL CRECIMIENTO COLECTIVO. ¡DESCUBRE LO QUE PODEMOS LOGRAR JUNTOS!
                    </p>
                </div>
                <div class="overlap-9">
                    <div class="right-column-2"></div>
                    <div class="rectangle-26"></div>
                    <div class="frame">
                        <div class="ttulo"><div class="con-cenos">CONÓCENOS</div></div>
                        <div class="overlap-10">
                            <div class="equipo-wrapper"><div class="equipo">EQUIPO</div></div>
                            <img class="persona" src="../img/user.png" />
                        </div>
                        <div class="overlap-11">
                            <div class="ttulo-2">
                                <div class="trayectoria">TRAYECTORIA</div>
                                <div class="proyectos-wrapper"><div class="proyectos">PROYECTOS</div></div>
                            </div>
                            <img class="persona-2" src="../img/Reloj.png" />
                            <img class="persona-3" src="../img/computer.png" />
                        </div>
                        <p class="bienvenido-a">
                            <br />BIENVENIDO A BRAINWAVE: DONDE LA INNOVACIÓN ENCUENTRA LA CALMA EN BRAINWAVE, ESTAMOS DEDICADOS A
                            TRANSFORMAR LA EXPERIENCIA DE QUIENES VIVEN CON TRASTORNO POR DÉFICIT DE ATENCIÓN E HIPERACTIVIDAD (TDAH).
                            FUNDADA POR UN EQUIPO APASIONADO Y COMPROMETIDO, COMPUESTO POR MIGUEL SANZ, PAULA MOURE Y ARIS KUHS,
                            NUESTRA MISIÓN ES IR MÁS ALLÁ DE LOS LÍMITES CONVENCIONALES PARA OFRECER SERVICIOS, EVENTOS Y CURSOS
                            DISEÑADOS ESPECÍFICAMENTE PARA POTENCIAR LAS MENTES CREATIVAS Y BRILLANTES QUE CARACTERIZAN A QUIENES
                            ENFRENTAN EL TDAH.
                        </p>
                    </div>
                    <div class="background-6"></div>
                    <div class="quote-block">
                        <div class="overlap-group-wrapper">
                            <div class="overlap-group-3">
                                <div class="image-placeholder-3"></div>
                                <div class="icon-box">
                                    <div class="content-icon-box">
                                        <div class="text-wrapper-5"><img class="persona-2" src="../img/telefono.png" /></div>
                                        <div class="ll-manos">LLÁMANOS</div>
                                        <p class="p">( +34 ) 123 456 789</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="brainwave-desatando">
                            <span class="text-wrapper-6">b</span>
                            <span class="text-wrapper-7">rain</span>
                            <span class="text-wrapper-6">w</span>
                            <span class="text-wrapper-7">ave desatando tu </span>
                            <span class="text-wrapper-6">potencial</span>
                            <span class="text-wrapper-7">,<br />Transformando <br />tu </span>
                            <span class="text-wrapper-6">mundo</span>
                        </p>
                    </div>
                    <img class="atomo" src="../img/Us.png" />
                    <div class="nav">
                        <div class="search-wrapper"><img class="search" src="../img/search.png" /></div>
                        <div class="servicios">SERVICIOS</div>
                        <div class="recursos">RECURSOS</div>
                        <div class="nosotros">NOSOTROS</div>
                        <div class="boton-primario-2"><button class="button-2">REGISTRO</button></div>
                    </div>
                    <div class="text-wrapper-8">ABOUT US</div>
                    <img class="IMG" src="../img/logo-transp.png" />
                </div>
            </div>
        </div>
    </body>
</html>
