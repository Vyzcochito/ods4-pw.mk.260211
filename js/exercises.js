function mostrarSeccion(id, btn) {

    document.querySelectorAll(".tab-section")
        .forEach(sec => sec.classList.remove("active"));

    document.querySelectorAll(".tab-btn")
        .forEach(b => b.classList.remove("active"));

    document.getElementById(id).classList.add("active");
    btn.classList.add("active");
}

function saveEntry() {
    const text = document.getElementById("textbox").value.trim();
    if (!text) return;

    const entries = JSON.parse(localStorage.getItem("entries")) || [];

    const entry = {
        id: Date.now(),
        text: text,
        date: new Date().toLocaleString()
    };

    entries.unshift(entry);
    localStorage.setItem("entries", JSON.stringify(entries));

    document.getElementById("textbox").value = "";
    renderEntries();
}

function renderEntries() {
    const container = document.getElementById("entries");
    const entries = JSON.parse(localStorage.getItem("entries")) || [];

    container.innerHTML = "";

    if (entries.length === 0) {
        container.innerHTML = `
            <div class="empty-state">
                Aún no hay nada por acá.
            </div>
        `;
        return;
    }
    entries.forEach(entry => {
        const div = document.createElement("div");
        div.className = "entry";

        div.innerHTML = `
            <div class="entry-header">
                <span>${entry.date}</span>
                <button onclick="deleteEntry(${entry.id})"><img src="/assets/trash.svg" alt="Eliminar entrada"></button>
            </div>
            <p>${entry.text}</p>
        `;

        container.appendChild(div);
    });
}

window.onload = renderEntries;

function deleteEntry(id) {
    let entries = JSON.parse(localStorage.getItem("entries")) || [];
    entries = entries.filter(entry => entry.id !== id);
    localStorage.setItem("entries", JSON.stringify(entries));
    renderEntries();
}

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

