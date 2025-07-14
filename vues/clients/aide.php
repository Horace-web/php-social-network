<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Paramètres et confidentialité</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f0f2f5;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .sidebar-menu {
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

    .sidebar-header {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 20px;
    }

    .sidebar-header i {
      font-size: 24px;
      cursor: pointer;
      color: #333;
    }

    .sidebar-header h5 {
      margin: 0;
      font-weight: bold;
    }

    .menu-item {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 12px 0;
      text-decoration: none;
      color: #222;
      border-bottom: 1px solid #e9ecef;
      transition: background 0.2s;
    }

    .menu-item:last-child {
      border-bottom: none;
    }

    .menu-item i {
      font-size: 1.3rem;
      color: #65676b;
      width: 28px;
      text-align: center;
    }

    .menu-item:hover {
      background-color: #f0f2f5;
      border-radius: 0.5rem;
      text-decoration: none;
    }

    .menu-item span {
      flex-grow: 1;
    }
  </style>
</head>
<body>
  
  <!-- Menu latéral droit -->
  <div class="sidebar-menu">
    <!-- En-tête avec flèche -->
    <div class="sidebar-header">
      <i class="bi bi-arrow-left-circle" onclick="window.history.back();"></i>
      <h5>Aide et assistance</h5>
    </div>

    <!-- Liste des options -->
    <a href="Page.html" class="menu-item">
        <i class="bi bi-question-square"></i>
      <span>Page d'aide </span>
    </a>

    <a href="statut.html" class="menu-item">
        <i class="bi bi-person-check-fill"></i>
      <span>Statut du compte</span>
    </a>

    <a href="assistance.html" class="menu-item">
        <i class="bi bi-life-preserver"></i>   
      <span>Espace Assistance</span>
    </a>

    <a href="problème.html" class="menu-item">
        <i class="bi bi-exclamation-triangle-fill text-danger"></i>
      <span>Signaler un problème</span>
    </a>

  </div>
</body>
</html>
