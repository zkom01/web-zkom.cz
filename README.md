# 🤖 web-zkom.cz

> **Tento projekt byl vygenerován umělou inteligencí (Claude od Anthropic).**
> Kód, design i obsah vznikly prostřednictvím AI.

[![AI Generated](https://img.shields.io/badge/Generated%20by-Claude%20AI-blueviolet?style=flat-square&logo=anthropic)](https://www.anthropic.com)
[![PHP](https://img.shields.io/badge/PHP-7%2B-777BB4?style=flat-square&logo=php&logoColor=white)](https://www.php.net)
[![CSS](https://img.shields.io/badge/CSS-52%25-1572B6?style=flat-square&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES2020-F7DF1E?style=flat-square&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![Anthropic API](https://img.shields.io/badge/Anthropic-Claude%20API-blueviolet?style=flat-square&logo=anthropic)](https://www.anthropic.com)

---

## 🌐 O projektu

Osobní portfolio web **Zdeňka Komárka** — backend vývojáře se zaměřením na Python, PHP a SQL.
Web prezentuje technologie, projekty, pracovní zkušenosti a certifikace.

🔗 **Repozitář:** [github.com/zkom01/web-zkom.cz](https://github.com/zkom01/web-zkom.cz)

---

## 🤖 Jak byl projekt vytvořen?

Celý web — včetně HTML struktury, CSS stylů, PHP logiky a JavaScript funkcionality — byl vygenerován pomocí **Claude (Anthropic AI)** na základě textového popisu požadavků. Byly nutné drobné úpravy.

Tento projekt slouží jako ukázka toho, co lze dnes s AI nástroji dosáhnout při tvorbě webových prezentací — včetně integrace živého AI asistenta přímo do stránky.

---

## 🛠️ Technologie

| Jazyk / Nástroj | Použití |
|---|---|
| **PHP** | Šablonování, dynamické verzování CSS/JS, API proxy |
| **HTML5** | Struktura stránky |
| **CSS3** | Kompletní design, animace, responsivita, hamburger menu |
| **JavaScript (ES2020)** | Navigace, AI chat, Markdown parser |
| **Anthropic Claude API** | AI asistent v chatu |
| Google Fonts | Typografie (DM Mono, Syne) |

---

## 📁 Struktura projektu

```
web-zkom.cz/
├── index.php         # Hlavní stránka (PHP šablona)
├── style.css         # Veškeré styly včetně responsivity
├── ai-proxy.php      # PHP proxy pro Anthropic API (skrývá API klíč)
├── js/
│   └── AI.js         # Navigace, hamburger menu, AI chat + Markdown parser
└── img/
    ├── ico.png        # Favicon
    └── eda_foto_1.png # Profilová fotka
```

---

## 🗂️ Obsah webu

Web je členěn do čtyř sekcí:

1. **Technologie** — Python, PHP, SQL/MySQL, Java, JavaScript, REST API, Git a další
2. **Projekty** — výběr veřejných GitHub projektů (API ICO Search, Student Management System, Hra Pavouci, SQL Tahák)
3. **Zkušenosti** — backend vývoj a průmyslová automatizace (Mervis SCADA, PLC UNIPI)
4. **Certifikace** — Python, Java, JavaScript, Bootstrap, elektrotechnika §7

---

## ✨ Funkce

- 🎨 **Tmavý design** s noise overlay, CSS grid pozadím a animacemi
- 📱 **Responzivní hamburger menu** — pill navbar na desktopu, rozbalovací menu na mobilu
- 🤖 **AI asistent** — živý chat napojený na Claude API, odpovídá na otázky o Zdeňkovi
- 📝 **Markdown renderování** v AI chatu (tučné, kurzíva, seznamy, kód, odkazy)
- 🔒 **Bezpečný API proxy** — klíč zůstává na serveru, nikdy není viditelný v kódu stránky
- 🔗 **Aktivní navigace** — zvýraznění sekce při scrollování
- ⚡ **Cache busting** — automatické verzování CSS a JS přes PHP `filemtime()`

---

## 🚀 Spuštění lokálně

```bash
git clone https://github.com/zkom01/web-zkom.cz.git
cd web-zkom.cz
php -S localhost:8000
```

Otevřete prohlížeč na `http://localhost:8000`.

> **Poznámka:** Pro funkci AI asistenta je potřeba vlastní API klíč z [console.anthropic.com](https://console.anthropic.com/) — vložte ho do `ai-proxy.php`.

---

## 📬 Kontakt

- **LinkedIn:** [linkedin.com/in/zdenek-komarek](https://www.linkedin.com/in/zdenek-komarek/)
- **GitHub:** [github.com/zkom01](https://github.com/zkom01)

---

<p align="center">
  <sub>🤖 Vygenerováno AI · © 2025 Zdeněk Komárek · Bedihošť, CZ</sub>
</p>
