document.addEventListener('DOMContentLoaded', () => {
    const matrixBackground = document.getElementById('matrix-background');
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよらりるれろわをん'; // Incluindo caracteres japoneses
    const charWidth = 20; // Largura de cada caractere
    const charHeight = 20; // Altura de cada caractere
    const numColumns = Math.floor(window.innerWidth / charWidth); // Número de colunas
    const numRows = Math.ceil(window.innerHeight / charHeight); // Número de linhas

    // Função para criar uma coluna de caracteres
    function createColumn(x) {
        for (let i = 0; i < numRows; i++) {
            const matrixChar = document.createElement('div');
            matrixChar.className = 'matrix-char';
            matrixChar.style.left = `${x}px`;
            matrixChar.style.top = `${i * charHeight}px`;
            matrixChar.style.animationDuration = `${Math.random() * 2 + 1}s`; // Tempo de animação aleatório
            matrixChar.textContent = chars.charAt(Math.floor(Math.random() * chars.length));
            matrixBackground.appendChild(matrixChar);
        }
    }

    // Cria colunas de caracteres para toda a largura da tela
    for (let i = 0; i < numColumns; i++) {
        createColumn(i * charWidth);
    }
});
