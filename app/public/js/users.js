function registrar() {
    const nombre = document.getElementById('nombre').value.trim();
    const correo = document.getElementById('correo').value.trim();
    const apodo = document.getElementById('apodo').value.trim();
    const password = document.getElementById('reg-password').value.trim();

    fetch("index.php?page=community", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: 
            "accion=registro" +
            "&nombre=" + encodeURIComponent(nombre) +
            "&correo=" + encodeURIComponent(correo) +
            "&apodo=" + encodeURIComponent(apodo) +
            "&password=" + encodeURIComponent(password)
    })
    .then(res => res.text())
    .then(() => {
        alert("Registro guardado en base de datos");
        mostrarLogin();
    });
}