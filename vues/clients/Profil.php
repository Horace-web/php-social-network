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
        header("Location: profil.php"); // Rafraîchir pour afficher les nouvelles images
        exit;
    }
}

$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>
 <link rel="stylesheet" href="./asset/style/bootstrap.css">
    <link rel="stylesheet" href="./asset/style/bootstrap.js"> <style>
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
  </style>
</head>
<body>
<div class="cover-container mb-4">
  <!-- Photo de couverture -->
  <img id="coverPhoto" src="/php-social-network/assets/images/Photo1.png" />
  <!-- Bouton changer couverture -->
  <label for="uploadCover" class="btn btn-light change-cover-btn shadow-sm">
    <i class="bi bi-camera"></i> Changer la photo de couverture
  </label>
  <input type="file" id="uploadCover" class="d-none" accept="image/*" />
  <!-- Photo de profil -->
  <img id="profilePhoto" src="/php-social-network/assets/images/Photo2.png" alt="Photo de profil" class="profile-photo" />
  <!-- Bouton changer profil -->
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
  <ul class="nav nav-profile nav-tabs mt-3" id="profileTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="publications-tab" data-bs-toggle="tab" data-bs-target="#publications" type="button" role="tab">Publications</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="amis-tab" data-bs-toggle="tab" data-bs-target="#amis" type="button" role="tab">Ami(e)s</button>
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

<div class="tab-content mt-3">
  <div class="tab-pane fade show active" id="publications" role="tabpanel">
    <!-- Mets ici le contenu des publications -->
      <div class="container">
  <div class="row justify-content-center" >


  <div class="tab-pane fade show active" id="" role="tabpanel">
    <!-- Mets ici le contenu des publications -->
      <div class="container">
  <div class="row justify-content-center" >


    <!-- Colonne gauche -->
    <div class="col-md-5 bg-light p-2 w-45  ms-2 mt-4 border rounded " style="height : 1000px;" >

      <!-- Case 1 -->
      <div class="bg-white border rounded mb-4 " style="height: 240px;">
        <h4><strong> Intro </strong><br> </h4>
        <div class="bg-secondary border rounded mb-4 text-center" style="height: 40px;"><h5 class="mt-2"><a class="nav-link active" href="#">Ajouter une bio</a></h5></div>
          <div class="bg-secondary border rounded mb-4 text-center " style="height: 40px;"><h5 class="mt-2"><a class="nav-link active" href="#">Modifier les infos</a></h5> </div>
            <div class="bg-secondary border rounded mb-4 text-center " style="height: 40px;"><h5 class="mt-2"><a class="nav-link active" href="#">Ajouter du contenu à la une</a> </h5></div>
      </div>

      <!-- Case 2 -->
      <div class="bg-white mb-4" style="height: 30px;">
        <div class="list-group">
          <div class="bg-white mb-4 list-group-item d-flex justify-content-between align-items-center">
             <a class="nav-link active" href="#"><strong>Photos</strong></a>
              <a href="#" class="text-primary">Toutes les photos</a>
          </div>
        </div>
      </div>

      <!-- Case 3 -->
      <div class="bg-white border rounded p-3" style="height: 650px; overflow-y: auto;">
  <div class="list-group">
    <div class="bg-white list-group-item d-flex justify-content-between align-items-center">
      <a class="nav-link active" href="#"><strong>Ami(e)s</strong></a>
      <a href="#" class="text-primary">Tou(te)s les ami(e)s</a>
    </div>
  </div>

  <div class="container mt-3">
    <div class="row text-center">
      <div class="col-4 mb-3">
        <img src="/php-social-network/assets/images/Photo3.png" class="img-fluid rounded" alt="Ami 1">
        <div>Anna Dupont</div>
      </div>
      <div class="col-4 mb-3">
        <img src="/php-social-network/assets/images/Photo4.png" class="img-fluid rounded" alt="Ami 2">
        <div>Marc Kossi</div>
      </div>
      <div class="col-4 mb-3">
        <img src="/php-social-network/assets/images/Photo5.png" class="img-fluid rounded" alt="Ami 3">
        <div>Fatou Diallo</div>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-4 mb-3">
        <img src="/php-social-network/assets/images/Photo6.png" class="img-fluid rounded" alt="Ami 4">
        <div>Jean Noël</div>
      </div>
      <div class="col-4 mb-3">
        <img src="/php-social-network/assets/images/Photo7.png" class="img-fluid rounded" alt="Ami 5">
        <div>Sophie Ayité</div>
      </div>
      <div class="col-4 mb-3">
        <img src="/php-social-network/assets/images/Photo8.png" class="img-fluid rounded" alt="Ami 6">
        <div>Ali Bamba</div>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-4 mb-3">
        <img src="/php-social-network/assets/images/Photo9.png" class="img-fluid rounded" alt="Ami 7">
        <div>Linda Tchibozo</div>
      </div>
      <div class="col-4 mb-3">
        <img src="/php-social-network/assets/images/Photo10.png" class="img-fluid rounded" alt="Ami 8">
        <div>Thierry N'Da</div>
      </div>
      <div class="col-4 mb-3">
        <img src="/php-social-network/assets/images/Photo11.png" class="img-fluid rounded" alt="Ami 9">
        <div>Carine Obiang</div>
      </div>
    </div>
  </div>
</div>


    </div>

    <!-- Colonne droite -->
    <div class="col-md-5 bg-light p-4 w-45 mt-3 me-4" style="height: 2550px;">
  <!-- Zone de publication -->
  <div class="card mb-3"> 
  <div class="card-body">

    <!-- Ligne avec image + champ texte -->
    <div class="d-flex align-items-center mb-2">
    <img src="/php-social-network/assets/images/Photo2.png" alt="Photo profil" width="40" height="40" class="rounded-circle" />
      <input type="text" class="form-control" placeholder="Que voulez-vous dire ?" />
    </div>

    <!-- Boutons d'action -->
    <div class="d-flex justify-content-between mt-2">
      <button class="btn btn-light btn-sm">🎥 Vidéo en direct</button>
      <button class="btn btn-light btn-sm">📷 Photo/Vidéo</button>
      <button class="btn btn-light btn-sm">📌 Évènement marquant</button>
    </div>

  </div>
</div>


  <!-- Liste des publications -->
  <div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span><strong>Publications</strong></span>
      <div>
        <button class="btn btn-outline-secondary btn-sm">Vue Liste</button>
        <button class="btn btn-outline-secondary btn-sm">Gérer les publications</button>
      </div>
    </div>
  </div>

  <!-- Exemple de publication 1 -->
  <div class="card mb-3" style="height:  850px;">
    <div class="card-body">
      <p><strong>Régis Régis</strong> a changé sa photo de couverture<br><small class="text-muted">1 juillet, 01:43</small></p>
    </div>
    <img src="/php-social-network/assets/images/Photo1.png" class="card-img-bottom" alt="Photo de couverture">
    <div class="card-footer d-flex justify-content-between">
      <button class="btn btn-light btn-sm">👍 J’aime</button>
      <button class="btn btn-light btn-sm">💬 Commenter</button>
      <button class="btn btn-light btn-sm">↗ Partager</button
    </div>
  </div>

  <!-- Exemple de publication 2 -->
  <div class="card mb-3 mt-4">
    <div class="card-body">
      <p><strong>Régis Régis</strong> a changé sa photo de profil<br><small class="text-muted">7 avril 2024</small></p>
    </div>
    <img src="/php-social-network/assets/images/Photo2.png" class="card-img-bottom" alt="Photo de profil">
    <div class="card-footer d-flex justify-content-between">
      <button class="btn btn-light btn-sm">👍 J’aime</button>
      <button class="btn btn-light btn-sm">💬 Commenter</button>
      <button class="btn btn-light btn-sm">↗ Partager</button>
    </div>
  </div>
</div>

  
  </div>
</div>
        
    <!-- ...autres publications... -->
  </div>
  <div class="tab-pane fade" id="amis" role="tabpanel">
    <!-- Mets ici le contenu des amis -->
    <div class="container mt-3">
      <!-- ...contenu amis... -->
    </div>
  </div>
  <div class="tab-pane fade" id="photos" role="tabpanel">
    <!-- Mets ici le contenu des photos -->
    <div>Photos à venir...</div>
  </div>
  <div class="tab-pane fade" id="videos" role="tabpanel">
    <!-- Mets ici le contenu des vidéos -->
    <div>Vidéos à venir...</div>
  </div>
  <div class="tab-pane fade" id="lieux" role="tabpanel">
    <!-- Mets ici le contenu des lieux -->
    <div>Lieux à venir...</div>
  </div>
  <div class="tab-pane fade" id="plus" role="tabpanel">
    <!-- Mets ici le contenu du plus -->
    <div>Plus à venir...</div>
  </div>
</div>
</div>
<!-- Bootstrap JS -->
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

// Appliquer pour les deux uploads
handleUpload('uploadCover', 'coverPhoto', 'cover');
handleUpload('uploadProfile', 'profilePhoto', 'profile');
</script>




</body>
</html>