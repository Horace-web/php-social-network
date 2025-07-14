<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Affichage</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f0f2f5;
      font-family: Arial, sans-serif;
      font-size: 16px;
      transition: background 0.3s, color 0.3s, font-size 0.3s;
    }

    body.dark-mode {
      background-color: #121212;
      color: white;
    }

    body.compact-mode {
      font-size: 13.5px;
    }

    .theme-sidebar {
      position: fixed;
      top: 60px;
      right: 20px;
      width: 320px;
      background-color: #fff;
      border-radius: 1rem;
      box-shadow: 0 4px 24px rgba(0, 0, 0, 0.13);
      border: 1px solid #e9ecef;
      z-index: 1000;
      padding: 20px;
    }

    .dark-mode .theme-sidebar {
      background-color: #1e1e1e;
      border-color: #333;
    }

    .theme-header {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 20px;
    }

    .theme-header i {
      font-size: 24px;
      cursor: pointer;
      color: #333;
    }

    .dark-mode .theme-header i {
      color: white;
    }

    .theme-header h5 {
      margin: 0;
      font-weight: bold;
    }

    .section-title {
      font-weight: bold;
      font-size: 18px;
      margin-bottom: 5px;
      margin-top: 25px;
    }

    .section-description {
      font-size: 14px;
      color: #777;
      margin-bottom: 15px;
    }

    .dark-mode .section-description {
      color: #ccc;
    }

    .option-group {
      padding: 12px 0;
      border-bottom: 1px solid #e0e0e0;
    }

    .option-group:last-child {
      border-bottom: none;
    }

    .option-group label {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 15px;
      cursor: pointer;
    }

    .option-group .desc {
      font-size: 13px;
      color: #888;
      margin-top: 4px;
      margin-left: 28px;
    }

    .dark-mode .option-group label {
      color: white;
    }

    .dark-mode .option-group .desc {
      color: #bbb;
    }

    .option-group input[type="radio"] {
      transform: scale(1.3);
      cursor: pointer;
    }
  </style>
</head>
<body>

  <!-- Menu latéral -->
  <div class="theme-sidebar">
    <!-- En-tête -->
    <div class="theme-header">
      <i class="bi bi-arrow-left-circle" onclick="window.history.back();"></i>
      <h5>Affichage</h5>
    </div>

    <!-- MODE SOMBRE -->
    <div class="section-title">Mode sombre</div>
    <div class="section-description">
      Réglez l’apparence de l’interface selon vos préférences ou automatiquement selon votre appareil.
    </div>

    <div class="option-group">
      <label for="theme-sombre">
        <span><i class="bi bi-moon-fill"></i> Activer</span>
        <input type="radio" name="theme" id="theme-sombre" value="sombre" />
      </label>
      <div class="desc">Utilise le thème sombre en permanence.</div>
    </div>

    <div class="option-group">
      <label for="theme-clair">
        <span><i class="bi bi-sun-fill"></i> Désactiver</span>
        <input type="radio" name="theme" id="theme-clair" value="clair" />
      </label>
      <div class="desc">Utilise le thème clair en permanence.</div>
    </div>

    <div class="option-group">
      <label for="theme-auto">
        <span><i class="bi bi-circle-half"></i> Automatique</span>
        <input type="radio" name="theme" id="theme-auto" value="auto" />
      </label>
      <div class="desc">Suit automatiquement le thème de votre appareil.</div>
    </div>

    <!-- MODE COMPACT -->
    <div class="section-title">Mode compact</div>
    <div class="section-description">
      Diminue la taille de la police pour afficher plus de contenu à l’écran.
    </div>

    <div class="option-group">
      <label for="compact-on">
        <span><i class="bi bi-arrows-angle-contract"></i> Activer</span>
        <input type="radio" name="compact" id="compact-on" value="on" />
      </label>
    </div>

    <div class="option-group">
      <label for="compact-off">
        <span><i class="bi bi-arrows-angle-expand"></i> Désactiver</span>
        <input type="radio" name="compact" id="compact-off" value="off" />
      </label>
    </div>
  </div>

  <!-- JS -->
  <script>
    // Thème sombre
    const themeRadios = document.querySelectorAll('input[name="theme"]');

    function appliquerTheme(theme) {
      document.body.classList.remove('dark-mode');
      if (theme === 'sombre') {
        document.body.classList.add('dark-mode');
      } else if (theme === 'auto') {
        appliquerThemeAuto();
      }
      localStorage.setItem('theme', theme);
    }

    function appliquerThemeAuto() {
      const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      document.body.classList.toggle('dark-mode', isDark);
    }

    themeRadios.forEach((radio) => {
      radio.addEventListener('change', () => {
        appliquerTheme(radio.value);
      });
    });

    const themeSauvegarde = localStorage.getItem('theme') || 'auto';
    document.querySelector(`input[name="theme"][value="${themeSauvegarde}"]`).checked = true;
    appliquerTheme(themeSauvegarde);

    if (themeSauvegarde === 'auto') {
      window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', appliquerThemeAuto);
    }

    // Mode compact
    const compactRadios = document.querySelectorAll('input[name="compact"]');

    function appliquerCompact(mode) {
      document.body.classList.toggle('compact-mode', mode === 'on');
      localStorage.setItem('compact', mode);
    }

    compactRadios.forEach((radio) => {
      radio.addEventListener('change', () => {
        appliquerCompact(radio.value);
      });
    });

    const compactSauvegarde = localStorage.getItem('compact') || 'off';
    document.querySelector(`input[name="compact"][value="${compactSauvegarde}"]`).checked = true;
    appliquerCompact(compactSauvegarde);
  </script>
</body>
</html>
