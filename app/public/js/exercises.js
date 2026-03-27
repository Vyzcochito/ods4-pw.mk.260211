let usuarioActivo = JSON.parse(localStorage.getItem("usuarioActivo"));

function mostrarSeccion(id, btn) {

    document.querySelectorAll(".tab-section")
        .forEach(sec => sec.classList.remove("active"));

    document.querySelectorAll(".tab-btn")
        .forEach(b => b.classList.remove("active"));

    document.getElementById(id).classList.add("active");
    btn.classList.add("active");
}

// 🔷 GUARDAR ENTRADA
function saveEntry() {
    const text = document.getElementById("textbox").value.trim();
    if (!text) return;

    if (!usuarioActivo || !usuarioActivo.id) {
        alert("Debes iniciar sesión");
        return;
    }

    fetch('/ods4-pw.mk.260211/app/controllers/descargasController.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body:
            "contenido=" + encodeURIComponent(text) +
            "&usuario_id=" + usuarioActivo.id
    })
    .then(res => res.text())
    .then(text => {
        console.log(text); // 🔥 IMPORTANTE
        document.getElementById("textbox").value = "";
        loadEntries();
    });
}

// 🔷 CARGAR ENTRADAS
function loadEntries() {
    if (!usuarioActivo) return;

    fetch("app/api/getEntries.php?usuario_id=" + usuarioActivo.id)
        .then(res => res.json())
        .then(entries => renderEntries(entries));
}

// 🔷 RENDER
function renderEntries(entries) {
    const container = document.getElementById("entries");
    container.innerHTML = "";

    entries.forEach(entry => {
        const div = document.createElement("div");
        div.className = "entry";

        div.innerHTML = `
            <div class="entry-header">
                <span>${entry.fecha}</span>
            </div>
            <p>${entry.contenido}</p>
        `;

        container.appendChild(div);
    });
}

// 🔷 INIT
document.addEventListener("DOMContentLoaded", loadEntries);
/*
function deleteEntry(id) {
    let entries = JSON.parse(localStorage.getItem("entries")) || [];
    entries = entries.filter(entry => entry.id !== id);
    localStorage.setItem("entries", JSON.stringify(entries));
    renderEntries();
}
    */

/* Respiración consciente */

const phases = [
    { name: "Inhala", time: 4, scale: 1.2 },
    { name: "Mantén", time: 7, scale: 1.2 },
    { name: "Exhala", time: 8, scale: 1.0 } 
];

let phaseIndex = 0;
let timeLeft = phases[0].time;
let cycles = 0;
let interval = null;
let hasStarted = false;
let isPaused = true; 

const dom = {
    circle: document.getElementById("circle"),
    time: document.getElementById("time"),
    phase: document.getElementById("phase"),
    bar: document.getElementById("bar"),
    cycles: document.getElementById("cycles"),
    toggleBtn: document.getElementById("btn-toggle")
};

function togglePlay() {
    if (!hasStarted) {
        start(); 
        hasStarted = true;
        isPaused = false;
    } else {
        isPaused = !isPaused;
    }
    
    updateButtonStyles();
}

function updateButtonStyles() {
    if (isPaused) {
        dom.toggleBtn.innerText = "Reanudar";
        dom.toggleBtn.style.background = "#6c5ce7";
        dom.toggleBtn.style.color = "white";
    } else {
        dom.toggleBtn.innerText = "Pausar";
        dom.toggleBtn.style.background = "#fab1a0";
        dom.toggleBtn.style.color = "#2d3436";
    }
}

function start() {
    if (!interval) {
        updateVisuals();
        interval = setInterval(tick, 1000);
    }
}

function tick() {
    if (isPaused) return;

    timeLeft--;
    dom.time.innerText = timeLeft;
    updateProgressBar();
    if (timeLeft <= 0) {
        nextPhase();
    }
}

function nextPhase() {
    phaseIndex++;
    if (phaseIndex >= phases.length) {
        phaseIndex = 0;
        cycles++;
        dom.cycles.innerText = cycles;
    }
    timeLeft = phases[phaseIndex].time;
    dom.time.innerText = timeLeft;
    updateVisuals();
}

function updateVisuals() {
    const current = phases[phaseIndex];
    dom.phase.innerText = current.name;
    dom.circle.style.transitionDuration = `${current.time}s`;
    dom.circle.style.transform = `scale(${current.scale})`;
    dom.bar.style.transition = 'none';
    dom.bar.style.width = '0%';
}

function updateProgressBar() {
    const totalTime = phases[phaseIndex].time;
    const progress = ((totalTime - timeLeft) / totalTime) * 100;
    
    dom.bar.style.transition = 'width 1s linear';
    dom.bar.style.width = `${progress}%`;
}

function reset() {
    isPaused = true;
    hasStarted = false;
    clearInterval(interval);
    interval = null;
    phaseIndex = 0;
    cycles = 0;
    timeLeft = phases[0].time;
    dom.cycles.innerText = 0;
    dom.time.innerText = timeLeft;
    dom.phase.innerText = "Listo";
    dom.bar.style.width = "0%";
    dom.circle.style.transform = "scale(1)";
    dom.toggleBtn.innerText = "Iniciar";
    dom.toggleBtn.style.background = "#6c5ce7"; 
    dom.toggleBtn.style.color = "white";
}

// ===========================
// 🟣 PAUSAS ACTIVAS
// ===========================

const pausas = [
  {
    id: 1,
    titulo: "Estiramiento de cuello",
    descripcion: "Inclina suavemente la cabeza hacia un lado, mantén 10 segundos. Repite al otro lado.",
    duracion: 60, // segundos
    tipo: "Estiramiento"
  },
  {
    id: 2,
    titulo: "Rotación de hombros",
    descripcion: "Gira los hombros hacia atrás 10 veces, luego hacia adelante 10 veces.",
    duracion: 60,
    tipo: "Estiramiento"
  },
  {
    id: 3,
    titulo: "Desconexión digital",
    descripcion: "Aléjate de pantallas. Mira por la ventana o cierra los ojos.",
    duracion: 90,
    tipo: "Desconexión"
  },
  {
    id: 4,
    titulo: "Respira profundamente",
    descripcion: "Inhala por 4 segundos, mantén 7 y exhala por 8. Repite 3 veces.",
    duracion: 80,
    tipo: "Respiración"
  },
  {
    id: 5,
    titulo: "Estiramiento de piernas",
    descripcion: "Ponte de pie y toca la punta de tus pies por 15 segundos. Repite 3 veces.",
    duracion: 75,
    tipo: "Estiramiento"
  },
  {
    id: 6,
    titulo: "Círculos con muñecas",
    descripcion: "Haz círculos con ambas muñecas durante 30 segundos.",
    duracion: 45,
    tipo: "Movilidad"
  }
];

let pausasCompletadas = JSON.parse(localStorage.getItem("pausasCompletadas")) || [];
let pausaActiva = null;
let tiempoRestante = 0;
let intervalo = null;

// Elementos del DOM
const lista = document.getElementById("pausas-list");
const contadorText = document.getElementById("contador-text");
const progressFill = document.getElementById("progress-fill");
const temporizadorContainer = document.getElementById("temporizador-container");
const pausaActualTitulo = document.getElementById("pausa-actual");
const tiempoRestanteEl = document.getElementById("tiempo-restante");

// Renderizar la lista de pausas
function renderPausas() {
  lista.innerHTML = "";

  pausas.forEach(pausa => {
    const completada = pausasCompletadas.includes(pausa.id);

    const div = document.createElement("div");
    div.className = `pausa ${completada ? "completed" : ""}`;
    div.innerHTML = `
      <div>
        <h4>${pausa.titulo} <span class="badge">${pausa.tipo}</span></h4>
        <p>${pausa.descripcion}</p>
        <small>🕒 ${Math.floor(pausa.duracion / 60)} min</small>
      </div>
      <button ${completada ? "disabled" : ""} onclick="iniciarPausa(${pausa.id})">
        ${completada ? "Hecho" : "Iniciar"}
      </button>
    `;
    lista.appendChild(div);
  });

  actualizarProgreso();
}

// Iniciar una pausa
function iniciarPausa(id) {
  const pausa = pausas.find(p => p.id === id);
  pausaActiva = pausa;
  tiempoRestante = pausa.duracion;

  pausaActualTitulo.textContent = pausa.titulo;
  temporizadorContainer.style.display = "block";
  lista.style.display = "none";

  actualizarTemporizador();

  intervalo = setInterval(() => {
    tiempoRestante--;
    actualizarTemporizador();

    if (tiempoRestante <= 0) {
      clearInterval(intervalo);
      marcarCompletada(pausa.id);
    }
  }, 1000);
}

// Mostrar tiempo restante
function actualizarTemporizador() {
  const min = Math.floor(tiempoRestante / 60);
  const seg = tiempoRestante % 60;
  tiempoRestanteEl.textContent = `${min.toString().padStart(2, "0")}:${seg
    .toString()
    .padStart(2, "0")}`;
}

// Cancelar pausa
function cancelarTemporizador() {
  clearInterval(intervalo);
  temporizadorContainer.style.display = "none";
  lista.style.display = "flex";
  pausaActiva = null;
}

// Marcar pausa como completada
function marcarCompletada(id) {
  if (!pausasCompletadas.includes(id)) {
    pausasCompletadas.push(id);
    localStorage.setItem("pausasCompletadas", JSON.stringify(pausasCompletadas));
  }

  temporizadorContainer.style.display = "none";
  lista.style.display = "flex";
  renderPausas();
}

// Actualizar progreso y contador
function actualizarProgreso() {
  const total = pausas.length;
  const completadas = pausasCompletadas.length;
  const porcentaje = (completadas / total) * 100;

  contadorText.textContent = `${completadas} de ${total}`;
  progressFill.style.width = `${porcentaje}%`;
}

// Resetear pausas cada día (opcional)
function resetDiario() {
  const hoy = new Date().toLocaleDateString();
  const ultimoDia = localStorage.getItem("ultimoDiaPausas");

  if (ultimoDia !== hoy) {
    localStorage.removeItem("pausasCompletadas");
    localStorage.setItem("ultimoDiaPausas", hoy);
    pausasCompletadas = [];
  }
}

// Inicialización
window.addEventListener("load", () => {
  resetDiario();
  renderPausas();
});