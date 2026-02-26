

document.querySelectorAll(".faq-question").forEach(button => {
    button.addEventListener("click", () => {

        const item = button.parentElement;
        const answer = item.querySelector(".faq-answer");

        // Close others
        document.querySelectorAll(".faq-item").forEach(faq => {
            if (faq !== item) {
                faq.classList.remove("active");
                faq.querySelector(".faq-answer").style.maxHeight = null;
            }
        });

        // Toggle current
        item.classList.toggle("active");

        if (item.classList.contains("active")) {
            answer.style.maxHeight = answer.scrollHeight + "px";
        } else {
            answer.style.maxHeight = null;
        }

    });
});

