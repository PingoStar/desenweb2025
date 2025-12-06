document.addEventListener('DOMContentLoaded', () => {
  const intro = document.getElementById('intro');
  const startBtn = document.getElementById('startBtn');
  const splash = document.getElementById('splash');
  const questionario = document.getElementById('questionario');
  const depTitle = document.getElementById('dep-title');
  const perguntasContainer = document.getElementById('perguntas-container');
  const mensagem = document.getElementById('mensagem');

  startBtn.addEventListener('click', () => {
    intro.style.display = 'none';
    splash.style.display = 'flex';
  });

  document.querySelectorAll('.dep-box').forEach(box => {
    box.addEventListener('click', () => {
      const depId = box.dataset.id;
      const depNome = box.textContent;
      depTitle.textContent = depNome;
      splash.style.display = 'none';
      questionario.style.display = 'block';

      fetch(`buscar_perguntas.php?id=${depId}`)
        .then(res => res.json())
        .then(perguntas => {
          perguntasContainer.innerHTML = '';
          mensagem.style.display = 'none';

          perguntas.forEach((p, idx) => {
            const div = document.createElement('div');
            div.classList.add('pergunta');
            if (idx !== 0) div.style.display = 'none';

            const isFeedback = idx === perguntas.length - 1;
            div.innerHTML = `
              <h3>${p.texto}</h3>
              ${isFeedback 
                ? `<textarea placeholder="Escreva seu feedback"></textarea><button id="finalizarBtn">Enviar Avaliação</button>`
                : '<div class="escala"></div>'}
            `;
            div.dataset.id = p.id;
            perguntasContainer.appendChild(div);

            if (!isFeedback) {
              const escala = div.querySelector('.escala');
              for (let i=0;i<=10;i++){
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

          const finalizarBtn = perguntasContainer.querySelector('#finalizarBtn');
          if(finalizarBtn){
            finalizarBtn.addEventListener('click', () => {
              const respostas = [];
              perguntasContainer.querySelectorAll('.pergunta').forEach(div=>{
                const btnSel = div.querySelector('.botao-nota.selecionado');
                if(btnSel) respostas.push({id_pergunta: div.dataset.id, nota: btnSel.dataset.valor});
              });

              const feedbackDiv = perguntasContainer.querySelector('textarea');
              const feedback = feedbackDiv ? {texto: feedbackDiv.value, id_pergunta: feedbackDiv.parentElement.dataset.id} : null;

              fetch('salvar_avaliacao.php',{
                method:'POST',
                headers:{'Content-Type':'application/json'},
                body: JSON.stringify({respostas, feedback})
              })
              .then(res=>res.json())
              .then(data=>{
                if(data.sucesso){
                  questionario.style.display = 'none';
                  mensagem.style.display = 'block';

                  setTimeout(()=>{
                    mensagem.style.display = 'none';
                    splash.style.display = 'flex';
                    perguntasContainer.innerHTML = '';
                    depTitle.textContent = '';
                  },5000);
                } else {
                  alert('Erro ao salvar avaliação: '+(data.erro||''));
                }
              });
            });
          }
        });
    });
  });
});
