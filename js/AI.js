// ── HAMBURGER MENU ──
const hamburger = document.getElementById('navHamburger');
const navLinksWrap = document.getElementById('navLinks');

hamburger.addEventListener('click', () => {
  const isOpen = navLinksWrap.classList.toggle('open');
  hamburger.classList.toggle('open', isOpen);
  hamburger.setAttribute('aria-expanded', isOpen);
});

// Zavři menu po kliknutí na odkaz
document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', () => {
    navLinksWrap.classList.remove('open');
    hamburger.classList.remove('open');
    hamburger.setAttribute('aria-expanded', 'false');
  });
});

// Zavři menu při kliknutí mimo
document.addEventListener('click', (e) => {
  if (!e.target.closest('.nav-inner')) {
    navLinksWrap.classList.remove('open');
    hamburger.classList.remove('open');
    hamburger.setAttribute('aria-expanded', 'false');
  }
});


// ── NAVBAR ACTIVE STATE ──
const navLinks = document.querySelectorAll('.nav-link[data-section]');
const sections = ['technologie','projekty','zkusenosti','certifikace','kontakt'];

function updateNav() {
  let current = 'top';
  sections.forEach(id => {
    const el = document.getElementById(id);
    if (el && window.scrollY >= el.offsetTop - 120) current = id;
  });
  navLinks.forEach(a => {
    a.classList.toggle('active', a.dataset.section === current);
  });
}
window.addEventListener('scroll', updateNav, { passive: true });

// ── AI CHAT ──
let aiOpen = false;
const SYSTEM = `Jsi AI asistent na osobním portfoliu Zdeňka Komárka, backend vývojáře z Bedhošti (CZ).
Odpovídej stručně, přátelsky, česky.

Fakta o Zdeňkovi:
- Jméno: Zdeněk Komárek
- Role: Backend Developer
- Dovednosti: Python, PHP, SQL/MySQL, Java, JavaScript, HTML/CSS, REST API, Git, Mervis SCADA, PLC UNIPI, Bootstrap
- Projekty: API ICO Search (Python/ARES API), Student Management System (PHP/MySQL), Hra Pavouci (Python/Pygame), SQL Tahák (open-source)
- Certifikace: §7 elektrotechnik, Java OOP, Python OOP, JavaScript, Bootstrap, Mervis SCADA/PLC UNIPI
- LinkedIn: https://www.linkedin.com/in/zdenek-komarek/
- GitHub: https://github.com/zkom01
- Hledá nové příležitosti v backend vývoji
- Pokud se někdo ptá na kontakt, odkaz na LinkedIn profil

Když je dotaz mimo portfolio, přesměruj zpět na Zdeňkovy dovednosti nebo projekty.`;

// ── MARKDOWN PARSER ──
function parseMarkdown(text) {
  // 1. Escapuj HTML
  let html = text
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;');

  // 2. Nadpisy
  html = html
    .replace(/^### (.+)$/gm, '<h3>$1</h3>')
    .replace(/^## (.+)$/gm,  '<h2>$1</h2>')
    .replace(/^# (.+)$/gm,   '<h1>$1</h1>');

  // 3. Tučné + kurzíva
  html = html
    .replace(/\*\*\*(.+?)\*\*\*/g, '<strong><em>$1</em></strong>')
    .replace(/\*\*(.+?)\*\*/g,     '<strong>$1</strong>')
    .replace(/\*(.+?)\*/g,         '<em>$1</em>');

  // 4. Inline kód
  html = html.replace(/`([^`]+)`/g, '<code>$1</code>');

  // 5. Horizontální čára
  html = html.replace(/^---$/gm, '<hr>');

  // 6. Seznamy — seskup po sobě jdoucí položky do <ul>
  html = html.replace(/((?:^[ \t]*[-*] .+$\n?)+)/gm, (block) => {
    const items = block.trim().split('\n').map(line =>
      '<li>' + line.replace(/^[ \t]*[-*] /, '') + '</li>'
    ).join('');
    return '<ul>' + items + '</ul>';
  });

  // 7. Číslované seznamy
  html = html.replace(/((?:^\d+\. .+$\n?)+)/gm, (block) => {
    const items = block.trim().split('\n').map(line =>
      '<li>' + line.replace(/^\d+\. /, '') + '</li>'
    ).join('');
    return '<ol>' + items + '</ol>';
  });

  // 8. Odkazy [text](url)
  html = html.replace(/\[(.+?)\]\((https?:\/\/[^\)]+)\)/g,
    '<a href="$2" target="_blank" rel="noopener">$1</a>');

  // 9. Holé URL
  html = html.replace(/(^|\s)(https?:\/\/[^\s<]+)/g,
    '$1<a href="$2" target="_blank" rel="noopener">$2</a>');

  // 10. Odstavce — bloky oddělené prázdným řádkem
  html = html.split(/\n{2,}/).map(block => {
    block = block.trim();
    if (!block) return '';
    // Nebalíme bloky které už jsou HTML elementy
    if (/^<(h[1-3]|ul|ol|hr|li|p)/.test(block)) return block;
    // Jednořádkové zalomení uvnitř odstavce
    return '<p>' + block.replace(/\n/g, '<br>') + '</p>';
  }).join('\n');

  return html;
}

function toggleAI() {
  aiOpen = !aiOpen;
  document.getElementById('aiPanel').classList.toggle('open', aiOpen);
  if (aiOpen) document.getElementById('aiInput').focus();
}

function askSuggestion(btn) {
  document.getElementById('aiInput').value = btn.textContent;
  document.getElementById('aiSuggestions').style.display = 'none';
  sendAI();
}

async function sendAI() {
  const input = document.getElementById('aiInput');
  const q = input.value.trim();
  if (!q) return;
  input.value = '';

  const msgs = document.getElementById('aiMessages');

  // user bubble
  const userBubble = document.createElement('div');
  userBubble.className = 'ai-msg user';
  userBubble.textContent = q;
  msgs.appendChild(userBubble);

  // thinking
  const thinking = document.createElement('div');
  thinking.className = 'ai-msg thinking';
  thinking.textContent = '...';
  msgs.appendChild(thinking);
  msgs.scrollTop = msgs.scrollHeight;

  // build history — použij innerText aby se ignorovaly HTML tagy
  const history = [];
  msgs.querySelectorAll('.ai-msg.bot, .ai-msg.user').forEach(el => {
    if (el === thinking) return;
    history.push({
      role: el.classList.contains('user') ? 'user' : 'assistant',
      content: el.innerText || el.textContent
    });
  });

  try {
    const res = await fetch('ai-proxy.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ system: SYSTEM, messages: history })
    });

    let data;
    const rawText = await res.text();
    try {
      data = JSON.parse(rawText);
    } catch (_) {
      thinking.className = 'ai-msg bot';
      thinking.textContent = '⚠️ Neplatná odpověď: ' + rawText.slice(0, 150);
      msgs.scrollTop = msgs.scrollHeight;
      return;
    }

    if (!res.ok || data.error) {
      const errMsg = data?.error?.message || data?.error || `HTTP ${res.status}`;
      thinking.className = 'ai-msg bot';
      thinking.textContent = '⚠️ ' + errMsg;
      msgs.scrollTop = msgs.scrollHeight;
      return;
    }

    const rawMd = data.content?.map(b => b.text || '').join('') || 'Prázdná odpověď.';
    thinking.className = 'ai-msg bot';
    thinking.innerHTML = parseMarkdown(rawMd);  // ← innerHTML místo textContent

  } catch (e) {
    thinking.className = 'ai-msg bot';
    thinking.textContent = '⚠️ Síťová chyba: ' + e.message;
  }

  msgs.scrollTop = msgs.scrollHeight;
}
