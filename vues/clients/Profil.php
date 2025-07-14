<?php  
// Connexion à la base de données avec mysqli
$host = "localhost";
$username = "root";
$password = "";
$db = "formulaire";

$mysqli = new mysqli($host, $username, $password, $db);

if ($mysqli->connect_error) {
    die("Échec de la connexion : " . $mysqli->connect_error);
}

// Crée un dossier uploads s'il n'existe pas 
if (!is_dir("uploads")) {
    mkdir("uploads", 0777, true);
}

$user_id = 1; // À adapter dynamiquement

// Récupération des images actuelles
$result = $mysqli->query("SELECT profile_photo, cover_photo FROM users WHERE id = $user_id");
$user = $result->fetch_assoc();

// Traitement du formulaire
if (isset($_POST['submit'])) {
    $profile_name = $cover_name = null;

    if (!empty($_FILES['profile_photo']['name'])) {
        $profile_photo = $_FILES['profile_photo'];
        $profile_name = uniqid() . "_" . basename($profile_photo['name']);
        $profile_target = "uploads/" . $profile_name;
        move_uploaded_file($profile_photo['tmp_name'], $profile_target);
    }

    if (!empty($_FILES['cover_photo']['name'])) {
        $cover_photo = $_FILES['cover_photo'];
        $cover_name = uniqid() . "_" . basename($cover_photo['name']);
        $cover_target = "uploads/" . $cover_name;
        move_uploaded_file($cover_photo['tmp_name'], $cover_target);
    }

    $sql = "UPDATE users SET ";
    $params = [];
    $types = "";

    if ($profile_name) {
        $sql .= "profile_photo = ?, ";
        $params[] = $profile_name;
        $types .= "s";
    }

    if ($cover_name) {
        $sql .= "cover_photo = ?, ";
        $params[] = $cover_name;
        $types .= "s";
    }

    $sql = rtrim($sql, ", ");
    $sql .= " WHERE id = ?";
    $params[] = $user_id;
    $types .= "i";

    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        header("Location: profil.php");
        exit;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profil</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(90deg, #e9f0fa 0%, #e9f0fa 40%, #fff 100%);
    }
    .cover-container {
      position: relative;
      width: 100%;
      max-width: 900px;
      margin: 0 auto;
      border-radius: 1rem 1rem 0 0;
      background: #fff;
    }
    #coverPhoto {
      width: 100%;
      height: 520px;
      object-fit: cover;
      border-radius: 1rem 1rem 0 0;
      background-color: #ddd;
      display: block;
      cursor: pointer;
    }
    .change-cover-btn {
      position: absolute;
      bottom: 24px;
      right: 24px;
      z-index: 2;
      opacity: 0.95;
    }
    .profile-photo {
      position: absolute;
      left: 32px;
      bottom: -64px;
      width: 160px;
      height: 160px;
      object-fit: cover;
      border-radius: 50%;
      border: 6px solid #fff;
      box-shadow: 0 4px 16px rgba(0,0,0,0.18);
      background: #fff;
      z-index: 3;
    }
    .profile-info {
      margin-left: 210px;
      margin-top: 32px;
    }
    @media (max-width: 600px) {
      .profile-photo {
        left: 50%;
        transform: translateX(-50%);
        bottom: -80px;
        width: 120px;
        height: 120px;
      }
      .profile-info {
        margin-left: 0;
        margin-top: 90px;
        text-align: center;
      }
    }
    .nav-profile {
      border-bottom: 1px solid #e0e0e0;
      margin-top: 16px;
      background: #fff;
    }
    .nav-profile .nav-link.active {
      border-bottom: 2px solid #0866ff;
      color: #0866ff !important;
      font-weight: 500;
    }
     .sticky-col {
    position: sticky;
    top: 20px;
    align-self: start;
    height: fit-content;
  }
  </style>
</head>
<body>

<!-- Conteneur photo de couverture et profil -->
<div class="cover-container mb-4">
  <img id="coverPhoto" src="<?= isset($user['cover_photo']) ? 'uploads/'.$user['cover_photo'] : '/php-social-network/assets/images/Photo1.png' ?>" alt="Photo de couverture" />
  <label for="uploadCover" class="btn btn-light change-cover-btn shadow-sm">
    <i class="bi bi-camera"></i> Changer la photo de couverture
  </label>
  <input type="file" id="uploadCover" class="d-none" accept="image/*" />

  <img id="profilePhoto" src="<?= isset($user['profile_photo']) ? 'uploads/'.$user['profile_photo'] : '/php-social-network/assets/images/Photo2.png' ?>" alt="Photo de profil" class="profile-photo" />
  <label for="uploadProfile" class="btn btn-light position-absolute" style="left: 150px; bottom: -10px; z-index:4; border-radius:50%; padding:6px 8px;">
    <i class="bi bi-camera-fill"></i>
  </label>
  <input type="file" id="uploadProfile" class="d-none" accept="image/*" />
</div>

<div class="container" style="max-width:900px;">
  <div class="d-flex flex-wrap align-items-end">
    <div class="profile-info">
      <h3 class="mb-2">Codjo du five</h3>
      <div class="text-muted mb-2">9 ami(e)s</div>
    </div>
    <div class="ms-auto d-flex gap-2 align-items-center mb-2">
      <button class="btn btn-primary"><i class="bi bi-plus"></i> Ajouter à la story</button>
      <button class="btn btn-light border"><i class="bi bi-pencil"></i> Modifier le profil</button>
    </div>
  </div>

  <!-- Onglets -->
  <ul class="nav nav-profile nav-tabs mt-3" id="profileTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="publications-tab" data-bs-toggle="tab" data-bs-target="#publications" type="button" role="tab">Publications</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id=" A Propos-tab" data-bs-toggle="tab" data-bs-target="#A propos" type="button" role="tab">A propos</button>
    </li>
   
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab">Photos</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab">Vidéos</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="lieux-tab" data-bs-toggle="tab" data-bs-target="#lieux" type="button" role="tab">Lieux</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="plus-tab" data-bs-toggle="tab" data-bs-target="#plus" type="button" role="tab">Plus</button>
    </li>
  </ul>

  <!-- Contenu des fenêtres -->
  <div class="tab-content mt-3" id="profileTabContent">
    <div class="tab-pane fade show active" id="publications" role="tabpanel">
      <div class="container mt-4">
  <div class="row justify-content-center">

    <!-- Colonne gauche -->
    <div class="col-md-5 sticky-col bg-light p-3 me-md-2 mb-4 border rounded"style="height: 800px;">
      <!-- Case 1 -->
      <div class="bg-white border rounded mb-4 p-2" style="height: 240px;">
        <h4><strong>Intro</strong></h4>
        <div class="bg-secondary border rounded mb-2 text-center" style="height: 40px;">
          <h5 class="mt-2"><a class="nav-link text-white" href="#">Ajouter une bio</a></h5>
        </div>
        <div class="bg-secondary border rounded mb-2 text-center" style="height: 40px;">
          <h5 class="mt-2"><a class="nav-link text-white" href="#">Modifier les infos</a></h5>
        </div>
        <div class="bg-secondary border rounded mb-2 text-center" style="height: 40px;">
          <h5 class="mt-2"><a class="nav-link text-white" href="#">Ajouter du contenu à la une</a></h5>
        </div>
      </div>

      <!-- Case 2 -->
      <div class="bg-white mb-4 list-group-item d-flex justify-content-between align-items-center p-2">
        <a class="nav-link active" href="#"><strong>Photos</strong></a>
        <a href="#" class="text-primary">Toutes les photos</a>
      </div>

      <!-- Case 3 : Liste des amis -->
      <div class="bg-white border rounded p-3" style="height: 450px; overflow-y: auto;">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <strong>Ami(e)s</strong>
          <a href="#" class="text-primary">Tou(te)s les ami(e)s</a>
        </div>
        <div class="container">
          <div class="row text-center">
            <div class="col-4 mb-3"><img src="/php-social-network/assets/images/Photo3.png" class="img-fluid rounded"><div>Anna</div></div>
            <div class="col-4 mb-3"><img src="/php-social-network/assets/images/Photo4.png" class="img-fluid rounded"><div>Marc</div></div>
            <div class="col-4 mb-3"><img src="/php-social-network/assets/images/Photo5.png" class="img-fluid rounded"><div>Fatou</div></div>
            <div class="col-4 mb-3"><img src="/php-social-network/assets/images/Photo6.png" class="img-fluid rounded"><div>Jean</div></div>
            <div class="col-4 mb-3"><img src="/php-social-network/assets/images/Photo7.png" class="img-fluid rounded"><div>Sophie</div></div>
            <div class="col-4 mb-3"><img src="/php-social-network/assets/images/Photo8.png" class="img-fluid rounded"><div>Ali</div></div>
          </div>
        </div>
        <div class="px-3 pt-2" style="font-size:0.85em; color:#888;">
          Confidentialité · Conditions générales · Publicités · Cookies · Plus · Meta © 2025
       </div>
      </div>
    </div>

    <!-- Colonne droite -->
    <div class="col-md-6 bg-light p-3 ms-md-2 mb-4 border rounded" style="min-height: 1000px;">
      <!-- Zone de publication -->
      <div class="card mb-3"> 
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <img src="/php-social-network/assets/images/Photo2.png" alt="Photo profil" width="40" height="40" class="rounded-circle me-2">
            <input type="text" class="form-control" placeholder="Que voulez-vous dire ?" />
          </div>
          <div class="d-flex justify-content-between mt-2">
            <button class="btn btn-light btn-sm">🎥 Vidéo en direct</button>
            <button class="btn btn-light btn-sm">📷 Photo/Vidéo</button>
            <button class="btn btn-light btn-sm">📌 Évènement marquant</button>
          </div>
        </div>
      </div>

      <!-- Section publications -->
      <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span><strong>Publications</strong></span>
          <div>
            <button class="btn btn-outline-secondary btn-sm">Vue Liste</button>
            <button class="btn btn-outline-secondary btn-sm">Gérer les publications</button>
          </div>
        </div>
      </div>

      <!-- Exemple de publication -->
      <div class="card mb-3" style="height: 400px;" >
        <div class="card-body " style="height: 200px;">
          <p><strong>Régis Régis</strong> a changé sa photo de couverture<br><small class="text-muted">1 juillet, 01:43</small></p>
        </div>
        <img src="/php-social-network/assets/images/Photo1.png" class="card-img-bottom">
        <div class="card-footer d-flex justify-content-between">
          <button class="btn btn-light btn-sm">👍 J’aime</button>
          <button class="btn btn-light btn-sm">💬 Commenter</button>
          <button class="btn btn-light btn-sm">↗ Partager</button>
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-body">
          <p><strong>Régis Régis</strong> a changé sa photo de profil<br><small class="text-muted">7 avril 2024</small></p>
        </div>
        <img src="/php-social-network/assets/images/Photo2.png" class="card-img-bottom">
        <div class="card-footer d-flex justify-content-between">
          <button class="btn btn-light btn-sm">👍 J’aime</button>
          <button class="btn btn-light btn-sm">💬 Commenter</button>
          <button class="btn btn-light btn-sm">↗ Partager</button>
        </div>
      <div class="card mb-3">
        <div class="card-body">
          <p>
            <strong>Régis Régis</strong><br>
            <small class="text-muted">7 juin 2004</small>
          </p>
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-baby-carriage text-primary me-2" style="font-size:1.5em;"></i>
            <span class="fw-bold">Naissance : 7 juin 2004</span>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
          <button class="btn btn-light btn-sm">👍 J’aime</button>
          <button class="btn btn-light btn-sm">💬 Commenter</button>
          <button class="btn btn-light btn-sm">↗ Partager</button>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

    </div>



    <div class="tab-pane fade" id="A propos" role="tabpanel">
       <div class="card mb-3">
        <div class="card-header">
          <strong>Coordonnées</strong>
        </div>
        <div class="card-body">
          <div class="mb-3 d-flex align-items-center">
            <i class="bi bi-phone me-2 text-primary"></i>
            <span>Ajoutez un téléphone mobile</span>
          </div>
          <div class="mb-3 d-flex align-items-center">
            <i class="bi bi-envelope me-2 text-primary"></i>
            <span>audreyusaudrey@gmail.com<br><small class="text-muted">E-mail</small></span>
          </div>
          <div class="mb-3 d-flex align-items-center">
            <i class="bi bi-globe me-2 text-primary"></i>
            <span>Ajouter un site Web</span>
          </div>
          <div class="mb-3 d-flex align-items-center">
            <i class="bi bi-link-45deg me-2 text-primary"></i>
            <span>Ajouter un lien social</span>
          </div>
           <div class="card-header">
            <strong>Infos générales</strong>
          </div>
          <div class="mb-3 d-flex align-items-center">
            <i class="bi bi-translate me-2 text-primary"></i>
            <span>Ajouter une langue</span>
          </div>
           <div class="card-body">
          <div class="mb-2 d-flex align-items-center">
            <i class="bi bi-person me-2 text-secondary"></i>
            <span>Homme<br><small class="text-muted">Genre</small></span>
          </div>
          <div class="mb-2 d-flex align-items-center">
            <i class="bi bi-chat-left-text me-2 text-secondary"></i>
            <span>il/lui<br><small class="text-muted">Pronoms enregistrés dans le système</small></span>
          </div>
          <div class="mb-2 d-flex align-items-center">
            <i class="bi bi-calendar-event me-2 text-secondary"></i>
            <span>7 juin<br><small class="text-muted">Date de naissance</small></span>
          </div>
          <div class="mb-2 d-flex align-items-center">
            <i class="bi bi-calendar me-2 text-secondary"></i>
            <span>2004<br><small class="text-muted">Année de naissance</small></span>
          </div>
        </div>
        </div>
        </div>
      </div>
    </div>


    
    

    <div class="tab-pane fade" id="photos" role="tabpanel">
      <h4>Photos</h4>
      <p>Galerie de photos.</p>
    </div>



    <div class="tab-pane fade" id="videos" role="tabpanel">
      <h4>Vidéos</h4>
      <p>Galerie de vidéos.</p>
    </div>


    <div class="tab-pane fade" id="lieux" role="tabpanel">
      <h4>Lieux</h4>
      <p>Endroits visités par l'utilisateur.</p>
    </div>


    <div class="tab-pane fade" id="plus" role="tabpanel">
      <h4>Plus</h4>
      <p>Autres informations.</p>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle JS (avec Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
function handleUpload(inputId, imgId, type) {
  const input = document.getElementById(inputId);
  const img = document.getElementById(imgId);

  input.addEventListener('change', function () {
    const file = this.files[0];
    if (file && file.type.startsWith('image/')) {
      const formData = new FormData();
      formData.append('photo', file);
      formData.append('type', type);

      fetch('upload.php', {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (!response.ok) throw new Error("Erreur lors de l'envoi");
        return response.text();
      })
      .then(imagePath => {
        img.src = imagePath;
      })
      .catch(error => {
        alert("Erreur : " + error.message);
      });
    } else {
      alert('Veuillez sélectionner une image valide.');
    }
  });
}

handleUpload('uploadCover', 'coverPhoto', 'cover');
handleUpload('uploadProfile', 'profilePhoto', 'profile');
</script>

</body>
</html>
