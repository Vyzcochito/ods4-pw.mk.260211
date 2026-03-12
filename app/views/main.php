<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset="UTF-8">
        <title> Bienestar Mental</title>
        <base href="/ods4-pw.mk.260211/">
        <link rel="stylesheet" href="app/public/css/styles.css">
    </head>
    <body>
        <header class="navbar container">
            <a href = "index.php?page=index">  
                <img src="app/public/assets/home.png" alt="Ir a Inicio" width="200">
            </a>
            <nav class="navbar-upper">
                <a class="navbar-card" href="index.php?page=resources">
                    <img src="app/public/assets/book-open.svg" class="nav-icon" alt="">Recursos
                </a>
                <a class="navbar-card" href="index.php?page=exercises">
                    <img src="app/public/assets/heart-pulse.svg" class="nav-icon" alt="">Ejercicios
                </a>
                <a class="navbar-card" href="index.php?page=community">
                    <img src="app/public/assets/users.svg" class="nav-icon" alt="">Comunidad</a>
            </nav>
        </header>
        <main>
            <section>
                <img src = "app/public/assets/home-star.png" alt="Estrella de Bienestar" class = "home-star">
                <h1 class = "gradient-text"> Tu espacio de bienestar emocional </h1>
                <p class = "main-section"> Un lugar seguro con información confiable, actividades para ayudarte y una comunidad para acompañarte en tu camino hacia tu bienestar emocional </p>
            </section>
            <a href="index.php?page=test" class="testbox-click">
                <section class = "testbox">
                    <div class = "upper-testbox">
                        <div class = "icon violet">
                            <img src="app/public/assets/home_brain.svg" class="home-icons" alt="Brain Icon">
                        </div>
                        <h2 class = "white-text"> Test de bienestar emocional </h2>
                    </div>
                    <p class = "white-text"> ¿Cómo estás hoy? Permítenos ayudarte de forma anónima, rápida y orientativa. Después de responder unas cuantas preguntas te daremos sugerencias personalizadas para ayudar a mejorar tu bienestar</p>
                </section>
            </a>
            <section class="cards-container">
                <a href="index.php?page=resources" class="card">
                    <div class="icon blue"><img src="app/public/assets/book-open.svg" class="home-icons" alt="Book Icon"></div>
                    <h3>Recursos Educativos</h3>
                    <p>Artículos, infografías y videos verificados sobre bienestar mental</p>
                    <span class="explore">Explorar →</span>
                </a>
                <a href="index.php?page=exercises" class="card">
                    <div class="icon red"><img src="app/public/assets/heart-pulse.svg" class="home-icons" alt="Heart Icon"></div>
                    <h3>Ejercicios Interactivos</h3>
                    <p>Actividades guiadas de respiración, meditación y autocuidado</p>
                    <span class="explore">Explorar →</span>
                </a>

                <a href="index.php?page=community" class="card">
                    <div class="icon green"><img src="app/public/assets/users.svg" class="home-icons" alt="Users Icon"></div>
                    <h3>Comunidad de Apoyo</h3>
                    <p>Espacio seguro y anónimo para compartir experiencias</p>
                    <span class="explore">Explorar →</span>
                </a>
            </section>
            <section class = "health-explanation">
                <h2> ¿Es tan importante tu bienestar emocional? </h2>
                <p>Aunque no se hable con tanta importancia como tu salud física, influye en la forma en que piensas, sientes y actúas en tu vida diaria, la mente también requiere equilibrio, pausas y espacios para procesar emociones y experiencias. Al cuidarla, manejamos mejor el estrés, tomamos decisiones con mayor claridad, y por supueso, también relaciones sanas y enfrentar los problemas sin sentirse sobrepasado. </p>
            </section>
            <section class = "final-section">
                <p> Este sitio provee información orientativa. No sustituye atención profesional. Si sientes que necesitas apoyo profesional, no dudes en buscar ayuda de un psicólogo o terapeuta. </p>
                <p> Fuentes:</p>
                <div class="sources">
                    <a href="..." class="source-link">OMS</a>
                    <span>| Secretaría de Salud</span>
                </div>
            </section>      
        </main>
    </body>
</html>