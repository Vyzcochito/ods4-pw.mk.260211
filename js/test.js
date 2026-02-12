function evaluarTest() {
  const categorias = ["animo", "ansiedad", "estres", "autoestima", "relaciones"];
  let resultados = {};
  let interpretacion = "";

  categorias.forEach(cat => {
    let suma = 0;
    for (let i = 1; i <= 3; i++) {
      const r = document.querySelector(`input[name="${cat}${i}"]:checked`);
      if (r) suma += parseInt(r.value);
    }
    resultados[cat] = suma;
  });

  interpretacion += `<h2>🧭 Tu resultado general</h2>`;
  interpretacion += `<p>Este test ofrece una visión general de tu bienestar emocional. No reemplaza la evaluación de un profesional, pero puede ayudarte a reflexionar sobre cómo te sientes en distintas áreas de tu vida.</p>`;
  interpretacion += `<hr>`;

  for (let cat in resultados) {
    let nivel = "";
    let mensaje = "";

    if (resultados[cat] >= 7) {
      nivel = "Alto";
    } else if (resultados[cat] >= 4) {
      nivel = "Moderado";
    } else {
      nivel = "Bajo";
    }

    switch (cat) {
      case "animo":
        if (nivel === "Alto") {
          mensaje = "😔 Podrías estar atravesando un momento de bajo ánimo o desmotivación. Tómate pausas, realiza actividades que disfrutes y busca apoyo emocional si sientes que lo necesitas.";
        } else if (nivel === "Moderado") {
          mensaje = "🙂 A veces puedes sentirte desanimado, pero parece que logras mantenerte activo. Escucha tus emociones y date tiempo para descansar.";
        } else {
          mensaje = "😊 Tu nivel de ánimo es estable. Sigue cultivando tus intereses y cuidando tu energía emocional.";
        }
        interpretacion += `<p><strong>Ánimo / Motivación:</strong> ${mensaje}</p>`;
        break;

      case "ansiedad":
        if (nivel === "Alto") {
          mensaje = "😟 Tus respuestas reflejan un nivel alto de preocupación o tensión. Intenta practicar técnicas de relajación y, si la ansiedad es persistente, considera hablar con un profesional.";
        } else if (nivel === "Moderado") {
          mensaje = "😐 En general manejas bien la ansiedad, aunque a veces podrías sentir inquietud. Dedica tiempo a relajarte o realizar respiraciones conscientes.";
        } else {
          mensaje = "😌 Te sientes tranquilo la mayor parte del tiempo. Continúa con hábitos que promuevan tu bienestar mental.";
        }
        interpretacion += `<p><strong>Ansiedad / Nerviosismo:</strong> ${mensaje}</p>`;
        break;

      case "estres":
        if (nivel === "Alto") {
          mensaje = "🔥 Estás experimentando un nivel alto de estrés. Tal vez tienes muchas responsabilidades o te cuesta desconectarte. Procura organizar tu tiempo y buscar momentos de descanso.";
        } else if (nivel === "Moderado") {
          mensaje = "⚖️ Tienes un nivel moderado de estrés, lo cual es normal. Aun así, busca equilibrar tus rutinas y tomar pausas cuando las necesites.";
        } else {
          mensaje = "🌿 Te adaptas bien a las exigencias diarias. Mantén ese equilibrio y cuida tu bienestar físico y mental.";
        }
        interpretacion += `<p><strong>Estrés / Cansancio mental:</strong> ${mensaje}</p>`;
        break;

      case "autoestima":
        if (nivel === "Alto") {
          mensaje = "💭 Puede que estés siendo muy crítico contigo mismo. Recuerda que vales por quién eres, no solo por lo que logras. Practica hablarte con amabilidad.";
        } else if (nivel === "Moderado") {
          mensaje = "🙂 Tienes una autoestima en desarrollo. Aprecia tus esfuerzos y reconoce tus logros, aunque sean pequeños.";
        } else {
          mensaje = "💪 Tu nivel de autoestima parece saludable. Sigue cultivando la confianza en ti y celebra tus avances.";
        }
        interpretacion += `<p><strong>Autoestima / Seguridad personal:</strong> ${mensaje}</p>`;
        break;

      case "relaciones":
        if (nivel === "Alto") {
          mensaje = "🤝 Podrías estar sintiendo soledad o dificultad para conectar con los demás. Busca espacios seguros para compartir o hablar sobre lo que sientes.";
        } else if (nivel === "Moderado") {
          mensaje = "💬 Tus relaciones sociales parecen estables, aunque podrías beneficiarte de abrirte más o compartir tus emociones con personas de confianza.";
        } else {
          mensaje = "❤️ Te sientes acompañado y conectado con los demás. Mantén esos vínculos que te aportan bienestar.";
        }
        interpretacion += `<p><strong>Relaciones / Conexión social:</strong> ${mensaje}</p>`;
        break;
    }
  }

  interpretacion += `<hr><p>💬 Recuerda: este resultado no reemplaza la valoración de un especialista. Si notas malestar persistente, busca acompañamiento profesional o emocional. Cuidarte también es un acto de fortaleza.</p>`;
  document.getElementById("resultado").innerHTML = interpretacion;
}
