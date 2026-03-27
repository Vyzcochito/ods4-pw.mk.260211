<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Comunidad - Bienestar Emocional</title>
  <base href="/ods4-pw.mk.260211/">
  <link rel="stylesheet" href="app/public/css/styles.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f7ff;
      color: #333;
      margin: 0;
      padding: 0;
    }

    main {
      max-width: 900px;
      margin: 10rem auto;
      background: white;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      padding: 2rem;
    }

    h1 {
      color: #4a00e0;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    input[type="text"], input[type="email"], input[type="password"] {
      width: 80%;
      padding: 0.6rem;
      margin: 0.5rem 0;
      border-radius: 8px;
      border: 1px solid #ccc;
    }

    button {
      background: linear-gradient(135deg, #8e2de2, #4a00e0);
      color: white;
      border: none;
      padding: 0.7rem 1.5rem;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 0.5rem;
    }

    button:hover {
      background: linear-gradient(135deg, #4a00e0, #8e2de2);
    }

    #register-form {
      display: none;
      text-align: center;
    }

    #login-section, #register-form {
      text-align: center;
      margin-bottom: 2rem;
    }

    #community-section {
      display: none;
    }

    .rules {
      background: #f0f0ff;
      border-left: 4px solid #4a00e0;
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 2rem;
    }

    .rules h2 {
      margin-top: 0;
    }

    .post-box {
      margin-bottom: 1.5rem;
    }

    textarea {
      width: 100%;
      border-radius: 8px;
      border: 1px solid #ccc;
      padding: 0.6rem;
      font-size: 1rem;
      resize: none;
    }

    .post {
      background: #f8f8ff;
      border-left: 4px solid #8e2de2;
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1rem;
    }

    .post small {
      display: block;
      color: #666;
      font-size: 0.9rem;
      margin-top: 0.3rem;
    }

    .logout-btn {
      display: block;
      background: #ff4b5c;
      color: #fff;
      border: none;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      cursor: pointer;
      margin: 0 auto 1.5rem auto; /* centrado */
      float: none;
    }

    .logout-btn:hover { 
      background: #ff3246;
    }

    .space {
      height: 10rem;
    }
  </style>
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
          <img src="app/public/assets/users.svg" class="nav-icon" alt="">Comunidad
        </a>
    </nav>
  </header>
  <main>
    <!-- INICIO DE SESIÓN -->
    <section id="login-section">
      <h1>Bienvenido a la Comunidad 💬</h1>
      <p>Inicia sesión o <a href="#" onclick="mostrarRegistro(); return false;">regístrate aquí</a> para participar.</p>

      <input type="text" id="login-username" placeholder="Apodo">
      <input type="password" id="login-password" placeholder="Contraseña">
      <br>
      <button onclick="login()">Iniciar sesión</button>
    </section>

    <!-- REGISTRO -->
    <section id="register-form">
      <h1>Crear cuenta</h1>
      <p>Completa tus datos para unirte a la comunidad 💜</p>

      <input type="text" id="nombre" placeholder="Nombre completo">
      <input type="email" id="correo" placeholder="Correo electrónico">
      <input type="text" id="apodo" placeholder="Apodo (como aparecerás en la comunidad)">
      <input type="password" id="reg-password" placeholder="Contraseña">
      <br>
      <button onclick="registrar()">Registrar</button>
      <br>
      <a href="#" onclick="mostrarLogin(); return false;">← Volver al inicio de sesión</a>
    </section>

    <!-- COMUNIDAD -->
    <section id="community-section">
      <h1>Comunidad de Bienestar 💜</h1>
      <button class="logout-btn" onclick="cerrarSesion()">Cerrar sesión</button>

      <div class="rules">
        <h2>Normas de convivencia digital</h2>
        <ul>
          <li>🤝 Respeta las opiniones de los demás.</li>
          <li>💬 No se permiten comentarios ofensivos o discriminatorios.</li>
          <li>💡 Comparte recursos o experiencias útiles para otros.</li>
          <li>❤️ Este espacio es de apoyo, no de diagnóstico.</li>
        </ul>
      </div>

      <div class="post-box">
        <textarea id="postText" rows="3" placeholder="Comparte tu mensaje o experiencia..."></textarea>
        <button onclick="publicar()">Publicar</button>
      </div>

      <div id="posts"></div>
    </section>
  </main>

  <script src ="app/public/js/community.js"></script>
</body>
</html>