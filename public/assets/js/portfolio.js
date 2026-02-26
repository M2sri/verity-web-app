document.addEventListener("DOMContentLoaded", function () {

    /* FILTER */
    const buttons = document.querySelectorAll(".filter-btn");
    const cards = document.querySelectorAll(".portfolio-card");

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {

            buttons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");

            const filter = btn.dataset.filter;

            cards.forEach(card => {
                if (filter === "all" || card.dataset.category === filter) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });


    /* LOAD MORE */
    const loadMoreBtn = document.getElementById("loadMore");
    if (loadMoreBtn) {

        const initialVisible = 6;
        let visible = initialVisible;

        const allCards = Array.from(cards);
        allCards.slice(initialVisible).forEach(card => card.style.display = "none");

        loadMoreBtn.addEventListener("click", () => {
            visible += 3;

            allCards.slice(0, visible).forEach(card => {
                card.style.display = "block";
            });

            if (visible >= allCards.length) {
                loadMoreBtn.style.display = "none";
            }
        });
    }

});
