// JavaScript para animar a rolagem dos produtos
const productContainer = document.querySelector(".product-container");

if (productContainer) {
    const productCards = document.querySelectorAll(".product-card");
    const cardCount = productCards.length;

    productContainer.style.animation = `scroll ${cardCount * 5}s linear infinite`;

    // Pausar a animação quando o mouse estiver sobre os cards
    productCards.forEach(card => {
        card.addEventListener("mouseover", () => {
            productContainer.style.animationPlayState = "paused";
        });

        card.addEventListener("mouseout", () => {
            productContainer.style.animationPlayState = "running";
        });
    });
}
