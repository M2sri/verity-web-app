document.addEventListener('DOMContentLoaded', () => {

    /* ==========================
       THEME TOGGLE
    ========================== */
    const themeToggle = document.getElementById('themeToggle');

    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem(
                'theme',
                document.body.classList.contains('dark-mode') ? 'dark' : 'light'
            );
        });

        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark-mode');
        }
    }

    /* ==========================
       ENHANCED MOBILE NAV
    ========================== */
    const menuToggle = document.getElementById('menuToggle');
    const nav = document.getElementById('mainNav');
    const navLinks = nav ? nav.querySelectorAll('a') : [];

    if (menuToggle && nav) {
        const icon = menuToggle.querySelector('i');

        menuToggle.addEventListener('click', () => {
            const isOpen = nav.classList.toggle('active');

            icon.classList.toggle('fa-bars', !isOpen);
            icon.classList.toggle('fa-times', isOpen);

            document.body.classList.toggle('no-scroll', isOpen);
            menuToggle.setAttribute('aria-expanded', isOpen);
        });

        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('active');
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
                document.body.classList.remove('no-scroll');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });

        document.addEventListener('click', (e) => {
            if (!nav.contains(e.target) && !menuToggle.contains(e.target)) {
                nav.classList.remove('active');
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
                document.body.classList.remove('no-scroll');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    /* ==========================
       PRICING TABS
    ========================== */
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    const pricingSection = document.getElementById('pricing');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const target = button.dataset.tab;

            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            button.classList.add('active');
            document.getElementById(target)?.classList.add('active');

            pricingSection?.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });

});


