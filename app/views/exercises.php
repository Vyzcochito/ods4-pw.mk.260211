<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienestar emocional</title>
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
      <h1 class="page-title">Ejercicios para tu Bienestar Mental</h1>
      <p class="page-subtitle">¿Qué necesitas hoy?</p>
    </section>

    <div class="tabs">
      <div class="tab-buttons">
        <button class="tab-btn active" onclick="mostrarSeccion('op1', this)">
          <img src = "app/public/assets/umbrella.svg" alt="Ejercicio de escritura" width="20" style="margin-right: 8px;">
          Descarga Mental
        </button>
        <button class="tab-btn" onclick="mostrarSeccion('op2', this)">
          <img src = "app/public/assets/wind.svg" alt="Ejercicio de respiración" width="20" style="margin-right: 8px;">
          Respiración Guiada
        </button>
        <button class="tab-btn" onclick="mostrarSeccion('op3', this)">
          <img src = "app/public/assets/activity.svg" alt="Ejercicio de pausas activas" width="20" style="margin-right: 8px;">
          Pausas Activas
        </button>
      </div>

      <div class="tab-content">
        <!-- Sección 1 -->
        <div id="op1" class="tab-section active">
          <div class="tab">
            <h4>Descarga Mental</h4>
            <p>Escribe todo lo que tengas en la mente. No lo ordenes, ni lo pienses.</p>
            <textarea id="textbox" class="textbox" placeholder="Incluso una sola palabra es suficiente."></textarea>
            <button onclick="saveEntry()">Guardar</button>
          </div>
          <h3>Tus Entradas</h3>
          <div class="entry-size" id="entries"></div>
        </div>

        <!-- Sección 2 -->
        <div id="op2" class="tab-section">
          <div class="breathing-container">
            <div id="circle">
              <h1 id="time">4</h1>
              <p id="phase">Inhala</p>
            </div>
            <div class="progress">
              <div id="bar"></div>
            </div>
            <div class="cycles-info">
              <p>Ciclos completados</p>
              <h2 id="cycles">0</h2>
            </div>
            <div class="controls">
              <button id="btn-toggle" onclick="togglePlay()">Iniciar</button>
              <button onclick="reset()">Reiniciar</button>
            </div>
          </div>
        </div>

        <!-- Sección 3 - Pausas Activas -->
        <div id="op3" class="tab-section">
          <section class="pausas-activas">
            <div class="pausas-header">
              <h2>Pausas Activas</h2>
              <p>Realiza estas actividades durante el día para reducir tensión y mejorar tu concentración.</p>
              <div class="progress-container">
                <div class="progress-info">
                  <span>Progreso del día</span>
                  <span id="contador-text">0 de 6</span>
                </div>
                <div class="progress-bar">
                  <div id="progress-fill" class="progress-fill"></div>
                </div>
              </div>
            </div>

            <div id="pausas-list" class="pausas-list"></div>

            <div id="temporizador-container" class="temporizador" style="display:none;">
              <div class="temporizador-card">
                <h3 id="pausa-actual" class="pausa-actual"></h3>
                <div class="reloj">
                  <h1 id="tiempo-restante">00:00</h1>
                  <p>Tiempo restante</p>
                </div>
                <button class="cancelar-btn" onclick="cancelarTemporizador()">Cancelar</button>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>

    <section class="final-section">
      <p>Este sitio provee información orientativa. No sustituye atención profesional. Si sientes que necesitas apoyo profesional, busca ayuda de un psicólogo o terapeuta.</p>
      <p>Fuentes:</p>
      <div class="sources">
        <a href="https://www.who.int/es" class="source-link">OMS</a>
        <span>| Secretaría de Salud</span>
      </div>
    </section>
  </main>

  <script src="app/public/js/exercises.js"></script>
</body>
</html>