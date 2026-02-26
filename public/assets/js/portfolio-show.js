document.addEventListener("DOMContentLoaded", function () {

    /* Lightbox */
    const images = document.querySelectorAll(".gallery-img");

    images.forEach(img => {
        img.addEventListener("click", () => {
            const overlay = document.createElement("div");
            overlay.className = "lightbox";
            overlay.innerHTML = `
                <div class="lightbox-content">
                    <img src="${img.src}">
                </div>
            `;
            document.body.appendChild(overlay);

            overlay.addEventListener("click", () => {
                overlay.remove();
            });
        });
    });

    /* Counter Animation */
    const counters = document.querySelectorAll("[data-count]");

    const animate = (el) => {
        let target = parseInt(el.dataset.count);
        let count = 0;
        let step = target / 60;

        const interval = setInterval(() => {
            count += step;
            if (count >= target) {
                el.textContent = target;
                clearInterval(interval);
            } else {
                el.textContent = Math.floor(count);
            }
        }, 20);
    };

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animate(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));

});
