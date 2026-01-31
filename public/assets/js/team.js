// ====================================================
// TEAM SLIDER MODULE
// ====================================================
function setupTeamSlider() {
  const teamMembers = [
    { name: "Rahaf El-amin", role: "Co-Founder", image: "assets/team/Rahaf.jpeg", description: "Organizational leader with 5+ years in recruitment & team management." },
    { name: "Mohamed Adam", role: "Co-Founder & CTO", image: "assets/team/Mohamed.png", description: "CTO & Security Officer with 5+ years in cybersecurity & systems." },
    { name: "Omar Khalid", role: "Web Developer", image: "assets/team/Omar.jpeg", description: "Front-end developer focused on modern UI & performance." },
    { name: "Basil El-tayeb", role: "Penetration Tester", image: "assets/team/Basil.jpeg", description: "Security auditor with 8+ years in pentesting." },
    { name: "Faisal Jalal", role: "Graphic Designer", image: "assets/team/Faisal.jpeg", description: "Creative designer for branding & UI visuals." },
    { name: "Ghofran El-bashir", role: "Marketing Manager", image: "assets/team/Ghofran.jpeg", description: "Digital marketing & brand growth specialist." }
  ];

  const wrapper = document.getElementById("team-wrapper");
  if (!wrapper) return;

  wrapper.innerHTML = teamMembers.map(m => `
    <div class="swiper-slide">
      <div class="team-card">
        <div class="team-img-container">
          <img src="${m.image}" alt="${m.name}">
        </div>
        <h3 class="team-name">${m.name}</h3>
        <div class="team-role">${m.role}</div>
        <p class="team-desc">${m.description}</p>
      </div>
    </div>
  `).join("");

  const currentEl = document.querySelector(".current-slide");
  const totalEl = document.querySelector(".total-slides");

  totalEl.textContent = teamMembers.length;

  const swiper = new Swiper(".team-swiper", {
    loop: true,
    centeredSlides: true,
    spaceBetween: 30,
    navigation: {
      nextEl: ".team-next",
      prevEl: ".team-prev"
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    },
    on: {
      slideChange: function () {
        const realIndex = this.realIndex + 1;
        currentEl.textContent = realIndex;
      }
    }
  });
}

document.addEventListener("DOMContentLoaded", setupTeamSlider);

