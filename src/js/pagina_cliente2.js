// JavaScript para abrir e fechar o pop-up de alteração de dados
document.addEventListener("DOMContentLoaded", function() {
    const alterarDadosBtn = document.querySelector('.alterar-dados-btni');
    const popup = document.getElementById('alterarDadosPopupi');
    const fecharPopup = document.getElementById('fecharPopupi');

    alterarDadosBtn.addEventListener('click', () => {
        popup.style.display = 'block';
    });

    fecharPopup.addEventListener('click', () => {
        popup.style.display = 'none';
    });
});