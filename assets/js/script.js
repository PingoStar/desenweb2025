document.addEventListener('DOMContentLoaded', () => {
  const intro = document.getElementById('intro');
  const startBtn = document.getElementById('startBtn');
  const splash = document.getElementById('splash');
  const questionario = document.getElementById('questionario');
  const depTitle = document.getElementById('dep-title');
  const perguntasContainer = document.getElementById('perguntas-container');

  // Mostrar tela de departamentos após clicar em "Iniciar"
  startBtn.addEventListener('click', () => {
    intro.style.display = 'none';
    splash.style.display = 'flex';
  });

  // Clique em departamento
  document.querySelectorAll('.dep-box').forEach(box => {
    box.addEventListener('click', () => {
      const depId = box.dataset.id;
      const depNome = box.textContent;
      depTitle.textContent = depNome;

      splash.style.display = 'none';
      questionario.style.display = 'block';

      // Carregar perguntas via PHP
      fetch(`buscar_perguntas.php?id=${depId}`)
        .then(res => res.json())
        .then(perguntas => {
          perguntasContainer.innerHTML = '';

          perguntas.forEach((p, idx) => {
            const div = document.createElement('div');
            div.classList.add('pergunta');
            if (idx !== 0) div.style.display = 'none';

            const isFeedback = idx === perguntas.length - 1;

            // Se for feedback, mostra textarea + botão
            div.innerHTML = `
              <h3>${p.texto}</h3>
              ${isFeedback 
                ? `<textarea placeholder="Escreva seu feedback"></textarea><button id="finalizarBtn">Enviar Avaliação</button>` 
                : '<div class="escala"></div>'}
            `;

            // Atribui id ao dataset da div (importante para feedback)
            div.dataset.id = p.id;

            perguntasContainer.appendChild(div);

            // Botões de nota só para perguntas de nota
            if (!isFeedback) {
              const escala = div.querySelector('.escala');
              for (let i = 0; i <= 10; i++) {
                const btn = document.createElement('div');
                btn.classList.add('botao-nota');
                btn.dataset.valor = i;
                btn.textContent = i;
                escala.appendChild(btn);

                btn.addEventListener('click', () => {
                  escala.querySelectorAll('.botao-nota').forEach(b => b.classList.remove('selecionado'));
                  btn.classList.add('selecionado');

                  div.style.display = 'none';
                  const next = div.nextElementSibling;
                  if (next) next.style.display = 'block';
                });
              }
            }
          });

          // Envio do feedback
          const finalizarBtn = perguntasContainer.querySelector('#finalizarBtn');
          if (finalizarBtn) {
            finalizarBtn.addEventListener('click', () => {
              const respostas = [];

              // Todas as perguntas de nota
              perguntasContainer.querySelectorAll('.pergunta').forEach(div => {
                const btnSelecionado = div.querySelector('.botao-nota.selecionado');
                if (btnSelecionado) {
                  respostas.push({
                    id_pergunta: div.dataset.id,
                    nota: btnSelecionado.dataset.valor
                  });
                }
              });

              // Feedback textual (última pergunta)
              const feedbackDiv = perguntasContainer.querySelector('.pergunta:last-child textarea');
              const feedback = feedbackDiv
                ? { 
                    texto: feedbackDiv.value, 
                    id_pergunta: feedbackDiv.parentElement.dataset.id // <- CORREÇÃO AQUI
                  }
                : null;

              // Envia respostas e feedback para o PHP
              fetch('salvar_avaliacao.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                  respostas: respostas,
                  feedback: feedback
                })
              })
                .then(res => res.json())
                .then(data => {
                  if (data.sucesso) {
                    questionario.style.display = 'none';
                    document.getElementById('mensagem').classList.remove('oculto');
                  } else {
                    alert('Erro ao salvar avaliação: ' + (data.erro || ''));
                  }
                });
            });
          }

        });
    });
  });
});
