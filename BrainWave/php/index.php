<?php
    include 'psychologists-db.php';
    session_start();

    $query = mysqli_query($conn,"SELECT * FROM team");
    $team = mysqli_fetch_all($query,MYSQLI_ASSOC);
    $_SESSION['team'] = $team;
    if(!isset($_SESSION['team'])){
    }
    $members = $_SESSION['team'];    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/psych.css">
</head>

<body>
    <header class="header-area">
        <!-- site-navbar start -->
        <div class="nav">
            <nav class="site-navbar">
                <a href="#home" class="site-logo"><img src="images/logo-img.png" alt=""></a>
                <ul>
                    <li class="item"><a href="#">Servicios</a></li>
                    <li class="item"><a href="#">recursos</a></li>
                    <li class="item"><a href="#">Nosotros</a></li>
                    <li class="button"><a href="#">contact</a></li>
                </ul>

                <button class="nav-toggler">
                    <span></span>
                </button>
            </nav>
            <div class="head">
                <h1>Psicólogos</h1>
            </div>
        </div>
    </header>
    <section id="hero-section" class="hero-section">
        <div class="hero-area">
            <h2>Brainwave</h2>
            <h1>nuestros Psicólogos</h1>
            <img src="images/hero-img.png" alt="">
            <p>Sabemos que cada persona es única, y entendemos las complejidades que pueden surgir al vivir con TDAH.
                Nuestro equipo de psicólogos altamente capacitados está aquí para proporcionar un enfoque dinámico y
                personalizado, adaptado a las necesidades específicas de cada cliente</p>
        </div>
    </section>

    <!-- Team section -->
    <section id="team" class="team">
        <div class="row1">
            <div class="filter">
                <h1>filtro 1</h1>
            </div>
            <div class="filter">
                <h1>filtro 2</h1>
            </div>
            <div class="filter">
                <h1>filtro 3</h1>
            </div>
            <div class="filter">
                <h1>filtro 4</h1>
            </div>
        </div>
        <!-- PHP loop to generate team members -->
        <?php
        if (isset($_SESSION['team']) && is_array($_SESSION['team'])) {
            for ($i = 0; $i < count($members); $i++) {
        ?>
        <div class="container">
            <div class="left">
                <img class="" src="images/<?php echo  $members[$i]['img'] ?>" alt="<?php echo  $members[$i]['name'] ?>"
                    style="aspect-ratio: 80 / 96; object-fit: cover;">
            </div>
            <div class="right">
                <h2>
                    <?php echo  $members[$i]['name'] ?>
                </h2>
                <div class="stars">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                    <span>(23)</span>
                </div>
                <p class="detail">
                    <?php echo  $members[$i]['detail']?>
                </p>
            </div>
            <div class="div">
                <button class="show-popup" data-member-img="images/<?php echo $members[$i]['img']; ?>"
                    data-member-name="<?php echo $members[$i]['name']; ?>"
                    data-member-detail="<?php echo $members[$i]['detail']; ?>"
                    data-member-number="<?php echo $members[$i]['number']; ?>"
                    data-member-expert='<?= json_encode(["TERAPIA FAMILIAR", "PSICOLOGÍA INFANTIL", "PSICOLOGÍA DE LA ADOLESCENCIA", "PSICOANÁLISIS"]) ?>'>PEDIR CITA
                </button>
            </div>
        </div>
        <?php
      }
        }
        ?>
    </section>
    <footer>
        <h1 class="brainwave2">BRAINWAVE</h1>
        <div class="footer">

        <div class="contact-info">
            <div class="contact">Contactanos</div>
            <div style="direction: rtl;">
                <div class="address">
                    <img src="images/location.png" alt="" width=20>
                    <p>123 Calle de la Serenidad, Distrito Creativo</p>
                </div>
                <div class="email">
                    <img src="images/email.png" alt=""width=20>
                    <p>Brain.wave.us@gmail.com</p>
                </div>
            </div>

        </div>
        <div class="contact-info">
            <div>
                <h1>Redes Sociales</h1>
                <div class="social">
                    <img class="footer12-child" alt="" src="images/facebook.png" width=50/>
                    <img class="footer12-item" alt="" src="images/twitter.png" width=50/>
                    <img class="footer12-inner" alt="" src="images/instagram.png" width=50/>
                </div>
            </div>
            
            <div class="subscribe">Subscribe</div>

        </div>
            <div class="brainwave-copyright-">
                brainwave copyright - own elements
            </div>
        </div>
    </footer>


    <!-- The Modal -->
    <dialog id="memberModal" class="modal">
        <!-- Modal content -->
        <div class="popup">
            <div class="btn-close">&times;</div>
            <div class="row">
                <div class="left">
                    <div class="upper">
                        <div class="left-side">
                            <img class="modal-img" src="" alt="">
                        </div>
                        <div class="right-side">
                            <h2 class="modal-name"></h2>
                            <div class="stars">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>



                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>

                                <span>(23)</span>
                            </div>
                            <p class="detail modal-expert"></p>
                        </div>
                    </div>
                    <div class="lower">
                        <p class="detail modal-detail"></p>
                    </div>
                </div>
                <div class="right">
                    <div class="info">
                        <a class="phone" href="#">
                            <img src="images/phone.png" alt="">
                            <h1 class="modal-number"></h1>
                        </a>
                        <div class="email">
                            <button class="show-popup">EMAIL</button>
                            <button class="">PEDIR CITA</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </dialog>

    <script src="script.js"></script>

</html>