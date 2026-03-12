<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset="UTF-8">
        <title> Bienestar emocional</title>
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
            <section class="page-header">
                <h1 class="page-title">Recursos Educativos</h1>
                <p class="page-subtitle">Información verificada y confiable para tu bienestar mental</p>
            </section>

            <!-- Tabs de navegación -->
            <section class="tabs-section">
                <button class="tab-button" onclick="showTab('articulos')">
                    📄 Artículos
                </button>
                <button class="tab-button" onclick="showTab('infografias')">
                    🖼️ Infografías
                </button>
                <button class="tab-button" onclick="showTab('videos')">
                    🎥 Videos
                </button>
            </section>

            <!-- Contenido de Artículos -->
            <section id="articulos" class="content-section">
                <div class="article-card">
                    <img src="https://images.unsplash.com/photo-1505142468610-359e7d316be0?w=400" alt="Océano" class="article-image">
                    <div class="article-content">
                        <div class="article-meta">
                            <span class="tag tag-stress">Estrés</span>
                            <span class="meta-info">5 min • Fuente: OMS</span>
                        </div>
                        <h3 class="article-title">Manejo del Estrés: Técnicas Efectivas</h3>
                        <p class="article-description">Aprende estrategias comprobadas para reducir el estrés en tu vida diaria. Incluye ejercicios prácticos y consejos respaldados por la OMS.</p>
                        <a href="https://www.who.int/es/news-room/questions-and-answers/item/stress#" class="article-link">Leer artículo ↗</a>
                    </div>
                </div>

                <div class="article-card">
                    <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=400" alt="Luz" class="article-image">
                    <div class="article-content">
                        <div class="article-meta">
                            <span class="tag tag-emotions">Emociones</span>
                            <span class="meta-info">7 min • Fuente: Secretaría de Salud</span>
                        </div>
                        <h3 class="article-title">Entendiendo tus Emociones</h3>
                        <p class="article-description">Guía completa para identificar, comprender y gestionar tus emociones de manera saludable.</p>
                        <a href="https://www.gob.mx/salud/prensa/070-herramientas-para-proteger-la-salud-emocional-de-la-poblacion" class="article-link">Leer artículo ↗</a>
                    </div>
                </div>
            </section>

            <!-- Contenido de Infografías -->
            <section id="infografias" class="content-section hidden">
                <div class="grid-container">
                    <div class="grid-card">
                        <div class="grid-card-header">
                            <div class="grid-card-icon">🖼️</div>
                        </div>
                        <div class="grid-card-body">
                            <span class="tag tag-stress">Estrés</span>
                            <h3 class="grid-card-title">¡Estoy tan estresado!</h3>
                            <p class="grid-card-description">La vida puede ser estresante. Si tiene dificultad para sobrellevar la situación, o si los síntomas del estrés o la ansiedad no desaparecen, podría ver afectada su salud.</p>
                            <a href="https://www.nimh.nih.gov/sites/default/files/images/outreach/social-media-graphics/ImSoStressed_Infographic_Sp_REV_FINAL%201.24.22.jpg" class="grid-card-link">Ver infografía ↗</a>
                        </div>
                    </div>

                    <div class="grid-card">
                        <div class="grid-card-header">
                            <div class="grid-card-icon">🖼️</div>
                        </div>
                        <div class="grid-card-body">
                            <span class="tag tag-emotions">Emociones</span>
                            <h3 class="grid-card-title">La Rueda de las Emociones</h3>
                            <p class="grid-card-description">Descubre cómo identificar y nombrar correctamente tus emociones.</p>
                            <a href="https://ayuda-psicologica-en-linea.com/wp-content/uploads/2017/09/Rueda-Emociones-2D.png" class="grid-card-link">Ver infografía ↗</a>
                        </div>
                    </div>

                    <div class="grid-card">
                        <div class="grid-card-header">
                            <div class="grid-card-icon">🖼️</div>
                        </div>
                        <div class="grid-card-body">
                            <span class="tag tag-habits">Mente</span>
                            <h3 class="grid-card-title">Bienestar Mental</h3>
                            <p class="grid-card-description">El documento enfatiza la importancia del autocuidado diario para mantener una buena salud mental, incluyendo hábitos como ejercicio, alimentación saludable y gestión del estrés.</p>
                            <a href="https://www.scribd.com/document/939242405/Infografia-Salud-Mental" class="grid-card-link">Ver infografía ↗</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contenido de Videos -->
            <section id="videos" class="content-section hidden">
                <div class="grid-container">
                    <div class="grid-card">
                        <div class="grid-card-header video-header">
                            <div class="grid-card-icon">🔹</div>
                            <div class="video-duration">0:28</div>
                        </div>
                        <div class="grid-card-body">
                            <span class="tag tag-breathing">Respiración</span>
                            <h3 class="grid-card-title">Técnica de Respiración 4-7-8</h3>
                            <p class="grid-card-description">Aprende esta técnica simple para reducir la ansiedad.</p>
                            <a href="https://www.youtube.com/watch?v=a4LxzATy-4Y" class="grid-card-link">Ver video ↗</a>
                        </div>
                    </div>

                    <div class="grid-card">
                        <div class="grid-card-header video-header">
                            <div class="grid-card-icon">🔹</div>
                            <div class="video-duration">12:00</div>
                        </div>
                        <div class="grid-card-body">
                            <span class="tag tag-meditation">Meditación</span>
                            <h3 class="grid-card-title">Meditación para Principiantes</h3>
                            <p class="grid-card-description">Guía paso a paso para comenzar tu práctica de meditación.</p>
                            <a href="https://www.youtube.com/watch?v=3oCC4NDgYrY" class="grid-card-link">Ver video ↗</a>
                        </div>
                    </div>

                    <div class="grid-card">
                        <div class="grid-card-header video-header">
                            <div class="grid-card-icon">🔹</div>
                            <div class="video-duration">120:00</div>
                        </div>
                        <div class="grid-card-body">
                            <span class="tag tag-gratitude">Sonidos</span>
                            <h3 class="grid-card-title"> Ruidos de lluvia de fondo</h3>
                            <p class="grid-card-description">Aveces para porder sentir paz unicamente nesesitamos sonidos que nos relajen como el de la lluvia.</p>
                            <a href="https://youtu.be/Z_fEKap24wU?si=phWQ809G29-wOnlp" class="grid-card-link">Ver video ↗</a>
                        </div>
                    </div>
                </div>
            </section>

            <script>
                function showTab(tabName) {
                    document.getElementById('articulos').classList.add('hidden');
                    document.getElementById('infografias').classList.add('hidden');
                    document.getElementById('videos').classList.add('hidden');
                    
                    document.getElementById(tabName).classList.remove('hidden');
                }
            </script>
        </main>
    </body>
</html>
