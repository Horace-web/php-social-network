

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Menu Profil</title>
  <link rel="stylesheet" href="./asset/style/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    #menuProfil {
      display: none;
      position: absolute;
      right: 0;
      top: 60px;
      width: 320px;
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 4px 24px rgba(0,0,0,0.13);
      border: 1px solid #e9ecef;
      z-index: 1000;
      padding-bottom: 8px;
    }
    .profil-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 16px 20px 12px 20px;
      border-bottom: 1px solid #e9ecef;
      font-weight: 500;
      color: #111;
      text-decoration: none;
    }
    .profil-item img {
      border-radius: 50%;
      width: 48px;
      height: 48px;
      object-fit: cover;
    }
    .profil-item:hover {
      background: #f5f6f7;
      text-decoration: none;
    }
    .menu-link {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 12px 20px;
      color: #222;
      text-decoration: none;
      font-size: 1rem;
      border-radius: 0.5rem;
      transition: background 0.2s;
    }
    .menu-link:hover {
      background: #f0f2f5;
      text-decoration: none;
    }
    .menu-link i {
      font-size: 1.3rem;
      color: #65676b;
      width: 28px;
      text-align: center;
    }
    .menu-link.text-danger i {
      color: #e41e3f;
    }
    .menu-separator {
      border-top: 1px solid #e9ecef; 
      margin: 8px 0;
    }
  </style>
</head>
<body>
<div class="p-3 text-end position-relative" style="max-width:100vw;">
  <!-- Bouton profil -->
  <button id="profilBtn" type="button" class="btn p-0 border-0 rounded-circle" style="width:48px; height:48px; overflow:hidden;">
    <img src="php-social-network/assets/images/Photo2.png" alt="Photo profil" width="48" height="48" class="rounded-circle" />
  </button>

  <!-- Menu déroulant -->
  <div id="menuProfil">
    <!-- Profil -->
    <a href="Profil.php" class="profil-item">
      <img src="php-social-network/assets/images/Photo2.png" alt="Profil">
      <span>Régīs Régīs</span>
    </a>
    <div class="menu-separator"></div>
    <a href="tous-profils.php" class="menu-link">
      <i class="bi bi-people-fill"></i>
      <span>Voir tous les profils</span>
    </a>
    <div class="menu-separator"></div>
    <a href="parametres.php" class="menu-link">
      <i class="bi bi-gear-fill"></i>
      <span>Paramètres et confidentialité</span>
      <i class="bi bi-chevron-right ms-auto"></i>
    </a>
    <a href="aide.php" class="menu-link">
      <i class="bi bi-question-circle-fill"></i>
      <span>Aide et assistance</span>
      <i class="bi bi-chevron-right ms-auto"></i>
    </a>
    <a href="accessibilite.php" class="menu-link">
      <i class="bi bi-eye-fill"></i>
      <span>Affichage et accessibilité</span>
      <i class="bi bi-chevron-right ms-auto"></i>
    </a>
    <a href="avis.php" class="menu-link">
      <i class="bi bi-chat-dots-fill"></i>
      <span>Donner votre avis</span>
      <span class="ms-auto text-muted" style="font-size:0.9em;">CTRL B</span>
    </a>
    <a href="deconnexion.php" class="menu-link text-danger">
      <i class="bi bi-box-arrow-right"></i>
      <span>Se déconnecter</span>
    </a>
    <div class="px-3 pt-2" style="font-size:0.85em; color:#888;">
      Confidentialité · Conditions générales · Publicités · Cookies · Plus · Meta © 2025
    </div>
  </div>
</div>

<script>
  const profilBtn = document.getElementById('profilBtn');
  const menuProfil = document.getElementById('menuProfil');

  profilBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    menuProfil.style.display = (menuProfil.style.display === 'block') ? 'none' : 'block';
    // Positionnement sous le bouton
    const rect = profilBtn.getBoundingClientRect();
    menuProfil.style.top = (profilBtn.offsetTop + profilBtn.offsetHeight + 8) + "px";
    menuProfil.style.right = (window.innerWidth - (profilBtn.offsetLeft + profilBtn.offsetWidth)) + "px";
  });

  document.addEventListener('click', (event) => {
    if (!profilBtn.contains(event.target) && !menuProfil.contains(event.target)) {
      menuProfil.style.display = 'none';
    }
  });

  // Ferme le menu au redimensionnement
  window.addEventListener('resize', () => {
    menuProfil.style.display = 'none';
  });
</script>
</body>
</html>