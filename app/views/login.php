<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Bienestar Emocional</title>
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
    <main class="auth-main">
      <section class="auth-main">
        <h1 class="page-title">Iniciar Sesión</h1>
        <p class="page-subtitle">Bienvenido de nuevo, por favor ingresa tus datos.</p>
        <p class="page-subtitle">¿No tienes una cuenta? <a href="index.php?page=register">Regístrate aquí</a></p>
      </section>

      <form id="loginForm" class="auth-form">
        <input type="text" id="login-username" name="apodo" required placeholder="Apodo">

        <input type="password" id="password" name="password" required placeholder="Contraseña">

        <button type="submit">Iniciar Sesión</button>
      </form>

      
    </main>
    
  </body>
  </html>