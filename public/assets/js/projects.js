// ===============================
// Tabs
// ===============================
const projectTabs = document.querySelectorAll('.projects-tabs .tab-btn');
const projectContents = document.querySelectorAll('.project-content');

projectTabs.forEach(tab => {
  tab.addEventListener('click', () => {
    projectTabs.forEach(t => t.classList.remove('active'));
    projectContents.forEach(c => c.classList.remove('active'));

    tab.classList.add('active');
    const content = document.getElementById(tab.dataset.tab);
    content.classList.add('active');

    // 🔁 Update correct swiper after tab switch
    if (tab.dataset.tab === 'web') {
      webSwiper.update();
    } else {
      systemSwiper.update();
    }
  });
});


// ===============================
// Web Projects Swiper
// ===============================
const webSwiper = new Swiper('.web-projects', {
  slidesPerView: 1,
  spaceBetween: 20,
  centeredSlides: true,
  initialSlide: 1,
  loop: false,

  observer: true,
  observeParents: true,

  navigation: {
    nextEl: '.web-projects .project-next',
    prevEl: '.web-projects .project-prev',
  },

  breakpoints: {
    768: { slidesPerView: 1 },
    1024: { slidesPerView: 3 }
  }
});


// ===============================
// System Projects Swiper (FIXED)
// ===============================
const systemSwiper = new Swiper('.system-projects', {
  slidesPerView: 1,
  spaceBetween: 20,
  centeredSlides: true,
  initialSlide: 0,
  loop: false,

  observer: true,
  observeParents: true,

  navigation: {
    nextEl: '.system-projects .project-next',
    prevEl: '.system-projects .project-prev',
  },

  breakpoints: {
    768: { slidesPerView: 1 },
    1024: { slidesPerView: 3 }
  }
});

// ===============================
// Progress Bar
// ===============================
function addProgress(swiper, barSelector) {
  const bar = document.querySelector(barSelector);
  if (!bar) return;

  bar.innerHTML = '';
  const fill = document.createElement('span');
  bar.appendChild(fill);

  const update = () => {
    const total = swiper.slides.length;
    const progress = ((swiper.activeIndex + 1) / total) * 100;
    fill.style.width = `${progress}%`;
  };

  swiper.on('slideChange', update);
  update();
}

addProgress(webSwiper, '.web-progress');
addProgress(systemSwiper, '.system-progress');


