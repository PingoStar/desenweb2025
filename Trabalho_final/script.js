document.addEventListener('DOMContentLoaded', () => {
  const perguntas = document.querySelectorAll('.pergunta');
  let perguntaAtual = 0;

  // Cria os botões de 0 a 10 em cada pergunta
  document.querySelectorAll('.escala').forEach(escala => {
    for (let i = 0; i <= 10; i++) {
      const btn = document.createElement('div');
      btn.classList.add('botao-nota');
      btn.dataset.valor = i;
      btn.textContent = i;
      escala.appendChild(btn);
    }
  });

  // Clique em uma nota
  document.querySelectorAll('.botao-nota').forEach(botao => {
    botao.addEventListener('click', () => {
      // Marca o selecionado
      const escala = botao.parentElement;
      escala.querySelectorAll('.botao-nota').forEach(b => b.classList.remove('selecionado'));
      botao.classList.add('selecionado');

      // Passa para a próxima pergunta
      perguntas[perguntaAtual].style.display = 'none';
      perguntaAtual++;
      if (perguntaAtual < perguntas.length) {
        perguntas[perguntaAtual].style.display = 'block';
      } else {
        document.getElementById('mensagem').classList.remove('oculto');
      }
    });
  });

  // Envio do formulário
  document.getElementById('avaliacaoForm').addEventListener('submit', (e) => {
    e.preventDefault();
    document.getElementById('avaliacaoForm').style.display = 'none';
    document.getElementById('mensagem').classList.remove('oculto');
  });
});