// ================= PRICING MODULE =================
const pricingModule = {
  swipers: [],

  init() {
    this.setupTabs();
    this.setupSwipers();
    this.setupWhatsApp();
  },

  // Handle tab switching
 setupTabs() {
  const tabButtons = document.querySelectorAll('.pricing-tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');

  tabButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const target = btn.dataset.tab;

      tabButtons.forEach(b => b.classList.remove('active'));
      tabContents.forEach(c => c.classList.remove('active'));

      btn.classList.add('active');
      document.getElementById(target)?.classList.add('active');

      setTimeout(() => {
        this.swipers.forEach(swiper => swiper.update());
      }, 100);
    });
  });
},

  // Initialize all Swipers
setupSwipers() {
  document.querySelectorAll(".pricing-swiper").forEach(swiperEl => {
    const swiper = new Swiper(swiperEl, {
      slidesPerView: 1,
      spaceBetween: 30,
      speed: 600,
      grabCursor: true,

      centeredSlides: true,
      initialSlide: 1,
    

      navigation: {
        nextEl: swiperEl.querySelector(".pricing-next"),
        prevEl: swiperEl.querySelector(".pricing-prev")
      },

      pagination: {
        el: swiperEl.querySelector(".pricing-progress"),
        type: "progressbar"
      },

      breakpoints: {
        768: { slidesPerView: 2, initialSlide: 1 },
        1024: { slidesPerView: 3, initialSlide: 1 }
      }
    });

    this.swipers.push(swiper);
  });
},

  // WhatsApp message handler
  setupWhatsApp() {
    document.querySelectorAll('.whatsapp-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const service = btn.dataset.service;
        const phone = "201124939521";

        const message = `Hello Verity Team 👋

I'm interested in the following service:

📌 ${service}

Please contact me with more details, pricing, and next steps.

Thank you!`;

        window.open(
          `https://wa.me/${phone}?text=${encodeURIComponent(message)}`,
          '_blank'
        );
      });
    });
  }
};

document.addEventListener("DOMContentLoaded", () => pricingModule.init());
