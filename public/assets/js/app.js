document.addEventListener("DOMContentLoaded", () => {

  // ================= DARK MODE =================
  function initializeTheme() {
    const themeToggle = document.getElementById('themeToggle');
    if (!themeToggle) return;

    const icon = themeToggle.querySelector('i');
    const savedTheme = localStorage.getItem('theme');

    if (savedTheme === 'dark') {
      document.body.classList.add('dark-mode');
      icon.className = 'fas fa-sun';
    }

    themeToggle.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');

      const isDark = document.body.classList.contains('dark-mode');
      icon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';

      localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });
  }

  initializeTheme();


  // ================= MOBILE MENU =================
  const menuBtn = document.getElementById("mobileMenuBtn");
  const mobileNav = document.getElementById("mobileNav");
  const menuIcon = menuBtn?.querySelector("i");
  const mobileLinks = mobileNav?.querySelectorAll("a");

  if (menuBtn && mobileNav) {
    menuBtn.addEventListener("click", () => {
      const isOpen = mobileNav.classList.toggle("active");

      if (menuIcon) {
        menuIcon.classList.toggle("fa-bars", !isOpen);
        menuIcon.classList.toggle("fa-times", isOpen);
      }

      document.body.classList.toggle("no-scroll", isOpen);
    });

    mobileLinks.forEach(link => {
      link.addEventListener("click", () => {
        mobileNav.classList.remove("active");

        if (menuIcon) {
          menuIcon.classList.add("fa-bars");
          menuIcon.classList.remove("fa-times");
        }

        document.body.classList.remove("no-scroll");
      });
    });
  }


  // ================= SCROLL SPY =================
  const pageSections = document.querySelectorAll("section[id]");
  const desktopNavLinks = document.querySelectorAll("nav ul li a");

  function setActiveLink() {
    let current = "";

    pageSections.forEach(section => {
      const sectionTop = section.offsetTop - 120;
      const sectionHeight = section.offsetHeight;

      if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
        current = section.getAttribute("id");
      }
    });

    desktopNavLinks.forEach(link => {
      link.classList.remove("active");

      if (link.getAttribute("href") === `#${current}`) {
        link.classList.add("active");
      }
    });
  }

  window.addEventListener("scroll", setActiveLink);

});
