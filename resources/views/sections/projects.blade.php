<section id="projects" class="section">

    <h2>Our Projects</h2>
    <p class="section-intro">A selection of projects built with purpose and precision</p>


  <!-- Tabs -->
  <div class="projects-tabs">
    <button class="tab-btn active" data-tab="web">Web Development</button>
    <button class="tab-btn" data-tab="system">System Development</button>
  </div>

  <!-- ================= WEB PROJECTS ================= -->
  <div class="project-content active" id="web">
    <div class="swiper projects-swiper web-projects">
      <div class="swiper-wrapper">

        <!-- Digitalize -->
        <div class="swiper-slide">
          <a href="{{ route('portfolio.show', 'digitalize') }}" class="project-card">
            <div class="project-image">
              <img src="{{ asset('assets/projects/Digitalize.jpg') }}" alt="Digitalize IT">
            </div>
            <div class="project-content-text">
              <h3>Digitalize IT</h3>
              <p>Modern IT portfolio and service showcase platform.</p>
              <span class="project-tag">Technology</span>
            </div>
          </a>
        </div>

        <!-- Amin Care -->
        <div class="swiper-slide">
          <a href="{{ route('portfolio.show', 'amin-care') }}" class="project-card">
            <div class="project-image">
              <img src="{{ asset('assets/projects/Amin.jpeg') }}" alt="Amin Care">
            </div>
            <div class="project-content-text">
              <h3>Amin Care</h3>
              <p>Professional disability support platform for Australia.</p>
              <span class="project-tag">Healthcare</span>
            </div>
          </a>
        </div>

        <!-- Vision -->
        <div class="swiper-slide">
          <a href="{{ route('portfolio.show', 'vision') }}" class="project-card">
            <div class="project-image">
              <img src="{{ asset('assets/projects/vision.png') }}" alt="Vision">
            </div>
            <div class="project-content-text">
              <h3>Vision | School of Life</h3>
              <p>Learning and life-skills development platform.</p>
              <span class="project-tag">Web Application</span>
            </div>
          </a>
        </div>

        <!-- Tawasul -->
        <div class="swiper-slide">
          <a href="{{ route('portfolio.show', 'tawasul') }}" class="project-card">
            <div class="project-image">
              <img src="{{ asset('assets/projects/Tawasul.jpg') }}" alt="Tawasul">
            </div>
            <div class="project-content-text">
              <h3>Tawasul</h3>
              <p>Unified educational management system.</p>
              <span class="project-tag">Education</span>
            </div>
          </a>
        </div>

      </div>

      <div class="project-prev">❮</div>
      <div class="project-next">❯</div>
    </div>
  </div>


  <!-- ================= SYSTEM PROJECTS ================= -->
  <div class="project-content" id="system">
    <div class="swiper projects-swiper system-projects">
      <div class="swiper-wrapper">

        <!-- Madrasty ERP -->
        <div class="swiper-slide">
          <a href="{{ route('portfolio.show', 'madrasty') }}" class="project-card">
            <div class="project-image">
              <img src="{{ asset('assets/projects/ERP.jpeg') }}" alt="Madrasty">
            </div>
            <div class="project-content-text">
              <h3>Madrasty</h3>
              <p>Comprehensive school ERP for academics & finance.</p>
              <span class="project-tag">School ERP</span>
            </div>
          </a>
        </div>

        <!-- CRM -->
        <div class="swiper-slide">
          <a href="{{ route('portfolio.show', 'crm-system') }}" class="project-card">
            <div class="project-image">
              <img src="{{ asset('assets/projects/CRM.png') }}" alt="CRM System">
            </div>
            <div class="project-content-text">
              <h3>CRM System</h3>
              <p>Customer relationship management system for sales, leads, and clients.</p>
              <span class="project-tag">CRM Project</span>
            </div>
          </a>
        </div>

      </div>

      <div class="project-prev">❮</div>
      <div class="project-next">❯</div>
    </div>
  </div>
  
<div class="projects-cta">
    <a href="{{ route('portfolio.index') }}" class="btn btn-outline">
        See All Projects
    </a>
</div>


</section>
