<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="./img/ico.png" type="image/x-icon">

  <title>Zdeněk Komárek – Backend Developer</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,400&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style.css?v=<?php echo filemtime('./style.css');?>"> 

</head>
<body>

<div class="grid-bg"></div>

<div class="container">
  <header>
    <div class="top-bar fade-in">
      <span>ZK_PORTFOLIO_2025</span>
      <span class="status">
        <span class="status-dot"></span>
        Otevřený novým příležitostem
      </span>
      <a href="https://www.linkedin.com/in/zdenek-komarek/" target="_blank">LinkedIn ↗</a>
    </div>

    <div class="hero fade-in">
      <div class="hero-inner">
        <div style="flex:1">
          <div class="hero-label">Backend Developer</div>
          <h1>
            Zdeněk<br>
            <span class="line2">Komárek</span>
          </h1>
          <p class="hero-desc">
            Backend vývojář se zaměřením na Python, PHP a SQL.<br>
            Tvořím systémy pro zpracování dat, automatizaci procesů<br>
            a API integrace — s důrazem na čistý kód a dlouhodobou udržitelnost.
          </p>
          <div class="hero-links">
            <a href="https://www.linkedin.com/in/zdenek-komarek/" target="_blank" class="btn btn-primary">
              LinkedIn profil  →
            </a>
            <a href="https://github.com/zkom01" target="_blank" class="btn btn-ghost">
              GitHub →
            </a>
          </div>
        </div>
        <!-- <img class="hero-photo" src="./img/eda_foto_1.png" alt="Zdeněk Komárek"> -->
      </div>
    </div>
  </header>

  <!-- SKILLS -->
  <section>
    <div class="section-header">
      <span class="section-num">01</span>
      <h2 class="section-title">Technologie</h2>
    </div>

    <div class="skills-grid">
      <div class="skill-item"><span class="skill-dot"></span>Python</div>
      <div class="skill-item"><span class="skill-dot"></span>PHP</div>
      <div class="skill-item"><span class="skill-dot"></span>SQL / MySQL</div>
      <div class="skill-item"><span class="skill-dot"></span>Java</div>
      <div class="skill-item"><span class="skill-dot secondary"></span>JavaScript</div>
      <div class="skill-item"><span class="skill-dot secondary"></span>HTML / CSS</div>
      <div class="skill-item"><span class="skill-dot secondary"></span>REST API</div>
      <div class="skill-item"><span class="skill-dot secondary"></span>Git / GitHub</div>
      <div class="skill-item"><span class="skill-dot neutral"></span>Mervis SCADA</div>
      <div class="skill-item"><span class="skill-dot neutral"></span>PLC UNIPI</div>
      <div class="skill-item"><span class="skill-dot neutral"></span>Bootstrap</div>
      <div class="skill-item"><span class="skill-dot neutral"></span>Automatizace</div>
    </div>
  </section>

  <!-- PROJECTS -->
  <section>
    <div class="section-header">
      <span class="section-num">02</span>
      <h2 class="section-title">Projekty</h2>
    </div>

    <div class="projects-list">
      <a href="https://github.com/zkom01/API_ICO_SEARCH" target="_blank" class="project-card">
        <div>
          <div class="project-lang">
            <span class="lang-dot" style="background:#3572A5"></span>Python
          </div>
          <div class="project-name">API ICO Search</div>
          <div class="project-desc">
            Napojení na API ARES — vyhledávání informací o firmách a OSVČ podle IČO.
            Praktický nástroj pro práci s veřejnými datovými zdroji.
          </div>
        </div>
        <div class="project-arrow">↗</div>
      </a>

      <a href="https://github.com/zkom01/php-student-management-system" target="_blank" class="project-card">
        <div>
          <div class="project-lang">
            <span class="lang-dot" style="background:#4F5D95"></span>PHP
          </div>
          <div class="project-name">Student Management System</div>
          <div class="project-desc">
            Webová aplikace pro správu obsahu vysoké školy — studenti, kurzy, uživatelé.
            Plný CRUD backend s MySQL databází.
          </div>
        </div>
        <div class="project-arrow">↗</div>
      </a>

      <a href="https://github.com/zkom01/HRA_PAVOUCI" target="_blank" class="project-card">
        <div>
          <div class="project-lang">
            <span class="lang-dot" style="background:#3572A5"></span>Python · Pygame
          </div>
          <div class="project-name">Hra Pavouci</div>
          <div class="project-desc">
            Herní projekt v Pythonu s využitím knihovny Pygame.
            Demonstrace OOP principů a herní logiky.
          </div>
        </div>
        <div class="project-arrow">↗</div>
      </a>

      <a href="https://github.com/zkom01/SQL_TAHAK" target="_blank" class="project-card">
        <div>
          <div class="project-lang">
            <span class="lang-dot" style="background:#c8f04b"></span>SQL
          </div>
          <div class="project-name">SQL Tahák</div>
          <div class="project-desc">
            Komplexní studijní materiál pro MySQL/MariaDB — dotazy, optimalizace, struktury.
            Sdíleno jako open-source zdroj.
          </div>
        </div>
        <div class="project-arrow">↗</div>
      </a>
    </div>
  </section>

  <!-- EXPERIENCE -->
  <section>
    <div class="section-header">
      <span class="section-num">03</span>
      <h2 class="section-title">Zkušenosti</h2>
    </div>

    <div class="exp-list">
      <div class="exp-item">
        <div class="exp-year">BACKEND<br>VÝVOJ</div>
        <div>
          <div class="exp-title">Backend Developer</div>
          <div class="exp-company">Python · PHP · SQL · API</div>
          <div class="exp-desc">
            Návrh a implementace backendových systémů. Práce s REST API (ARES, vlastní endpointy),
            návrh relačních databází, optimalizace SQL dotazů. Vývoj webových aplikací v PHP s MySQL backendem.
          </div>
        </div>
      </div>

      <div class="exp-item">
        <div class="exp-year">PRŮMYSL<br>& OT</div>
        <div>
          <div class="exp-title">Průmyslová automatizace</div>
          <div class="exp-company">Mervis SCADA · PLC UNIPI</div>
          <div class="exp-desc">
            Programování a konfigurace PLC systémů UNIPI. Práce s SCADA systémem Mervis
            pro monitoring a řízení průmyslových procesů. Propojení SW světa s reálnými technologiemi.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CERTS -->
  <section>
    <div class="section-header">
      <span class="section-num">04</span>
      <h2 class="section-title">Certifikace</h2>
    </div>

    <div class="cert-grid">
      <div class="cert-card">
        <div class="cert-icon">⚡</div>
        <div class="cert-name">§7 NV č. 194/2022 Sb.<br>Vedoucí elektrotechnik</div>
      </div>
      <div class="cert-card">
        <div class="cert-icon">☕</div>
        <div class="cert-name">Java – základní konstrukce & OOP</div>
      </div>
      <div class="cert-card">
        <div class="cert-icon">🐍</div>
        <div class="cert-name">Python – základní konstrukce & OOP</div>
      </div>
      <div class="cert-card">
        <div class="cert-icon">🌐</div>
        <div class="cert-name">JavaScript – základní konstrukce</div>
      </div>
      <div class="cert-card">
        <div class="cert-icon">🎨</div>
        <div class="cert-name">Bootstrap framework</div>
      </div>
      <div class="cert-card">
        <div class="cert-icon">🏭</div>
        <div class="cert-name">Mervis SCADA & PLC UNIPI školení</div>
      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section style="border-bottom: none;">
    <div class="contact-block">
      <div>
        <div class="contact-title">Pojďme se spojit.</div>
        <div class="contact-sub">Hledám nové příležitosti v oblasti backend vývoje.</div>
      </div>
      <div style="display:flex; flex-direction:column; gap:0.75rem;">
        <a href="https://www.linkedin.com/in/zdenek-komarek/" target="_blank" class="btn btn-primary">
          Napište mi na LinkedIn →
        </a>
        <a href="https://github.com/zkom01" target="_blank" class="btn btn-ghost">
          Prohlédnout GitHub
        </a>
      </div>
    </div>
  </section>

  <footer>
    <span>© 2025 Zdeněk Komárek</span>
    <span>Bedihošť, CZ</span>
  </footer>
</div>

</body>
</html>
