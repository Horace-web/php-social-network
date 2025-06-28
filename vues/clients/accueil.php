<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Fil d'actualité Facebook</title>
    <link rel="stylesheet" href="/php-social-network/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <div class="topbar">
        <div class="left">
            <div class="fb-logo-circle">
                <i class="fa-brands fa-facebook-f"></i>
            </div>
            <input type="text" placeholder="Rechercher sur Facebook">
        </div>
        <div class="center">
            <i class="fa-solid fa-house active"></i>
            <i class="fa-solid fa-tv"></i>
            <i class="fa-solid fa-store"></i>
            <i class="fa-solid fa-users"></i>
            <i class="fa-solid fa-gamepad"></i>
        </div>
        <div class="right">
            <div class="menu-icon">
                <i class="fa-solid fa-th"></i>
            </div>
            <div class="menu-icon">
                <i class="fa-brands fa-facebook-messenger"></i>
            </div>
            <div class="menu-icon">
                <i class="fa-solid fa-bell"></i>
            </div>
            <img src="https://via.placeholder.com/30" alt="avatar" class="user-avatar">
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="container">

        <!-- Menu gauche -->
        <div class="sidebar">
            <p><i class="fa-solid fa-user icon blue"></i> Léger Lerger</p>
            <p><i class="fa-solid fa-robot icon violet"></i> Meta AI</p>
            <p><i class="fa-solid fa-user-group icon cyan"></i> Ami(e)s</p>
            <p><i class="fa-solid fa-chart-line icon pink"></i> Tableau de bord professionnel</p>
            <p><i class="fa-solid fa-newspaper icon blue"></i> Fils</p>
            <p><i class="fa-solid fa-people-group icon cyan"></i> Groupes</p>
            <p><i class="fa-solid fa-store blue"></i> Marketplace</p>

            <!-- Le bouton déplacé à la fin quand visible -->
            <!-- Bouton VOIR PLUS (affiché au début) -->
            <p id="btn-voir-plus" class="voir-plus-btn" onclick="toggleVoirPlus(true)">
                <i class="fa-solid fa-chevron-down icon grey"></i> Voir plus
            </p>

            <div id="voir-plus" style="display: none;">
                <p><i class="fa-solid fa-bullhorn icon blue"></i> Activité publicitaire récente</p>
                <p><i class="fa-solid fa-gift icon red"></i> Anniversaires</p>
                <p><i class="fa-solid fa-earth-africa icon green"></i> Centre de climatologie</p>
                <p><i class="fa-solid fa-hand-holding-dollar icon yellow"></i> Collecte de dons</p>
                <p><i class="fa-solid fa-box icon cyan"></i> Commandes et paiements</p>
                <p><i class="fa-solid fa-bookmark icon violet"></i> Enregistrements</p>
                <p><i class="fa-solid fa-bullhorn icon pink"></i> Espace Pubs</p>
                <p><i class="fa-solid fa-calendar icon red"></i> Évènements</p>
                <p><i class="fa-solid fa-chart-bar icon cyan"></i> Gestionnaire de publicités</p>
                <p><i class="fa-solid fa-gamepad icon purple"></i> Jouer à des jeux</p>
                <p><i class="fa-brands fa-facebook-messenger icon blue"></i> Messenger</p>
                <p><i class="fa-solid fa-child icon teal"></i> Messenger Kids</p>
                <p><i class="fa-solid fa-briefcase icon indigo"></i> Meta Business Suite</p>
                <p><i class="fa-solid fa-flag icon orange"></i> Pages</p>
                <p><i class="fa-solid fa-clapperboard icon red"></i> Reels</p>
                <p><i class="fa-solid fa-clock-rotate-left icon purple"></i> Souvenirs</p>
                <p><i class="fa-solid fa-video icon blue"></i> Vidéos de gaming</p>

                <!-- BOUTON VOIR MOINS (à la fin de la section) -->
                <p id="btn-voir-moins" class="voir-plus-btn" onclick="toggleVoirPlus(false)">
                    <i class="fa-solid fa-chevron-up icon grey"></i> Voir moins
                </p>
            </div>

            <div class="section-title">Vos raccourcis</div>
            <p><i class="fa-solid fa-bag-shopping icon orange"></i> Degouj × Leger STORE</p>
            <p><i class="fa-solid fa-puzzle-piece icon purple"></i> Sort Fun Puzzle</p>
            <p><i class="fa-solid fa-microphone icon red"></i> DADJU Officiel</p>

            <div class="section-title" style="font-size: 11px; margin-top: 30px;">
                Confidentialité · Conditions générales · Publicités · Cookies · Plus · Meta © 2025
            </div>
        </div>

        <!-- Fil d'actualité -->
        <div class="feed">
            <div class="create-post">
                <textarea placeholder="Quoi de neuf, Léger ?"></textarea>
            </div>

            <div class="post">
                <strong>Jean Dupont</strong>
                <p>C'est une belle journée aujourd'hui ☀️</p>
            </div>

            <div class="post">
                <strong>Claire Moreau</strong>
                <p>Mon nouveau chiot 🐶</p>
                <img src="https://via.placeholder.com/400x250" alt="Chien mignon">
            </div>
        </div>

        <!-- Suggestions -->
        <div class="rightbar">
            <p><i class="fa-solid fa-gift icon red"></i> Anniversaires</p>
            <p><i class="fa-solid fa-bullhorn icon blue"></i> Suggestions</p>
            <p><i class="fa-solid fa-circle icon green"></i> Amis connectés</p>
        </div>
    </div>

    <!-- Script -->
    <script>
    function toggleVoirPlus(show) {
        const voirPlusSection = document.getElementById("voir-plus"); // correspond à ton HTML
        const btnVoirPlus = document.getElementById("btn-voir-plus");

        if (show) {
            voirPlusSection.style.display = "block";
            btnVoirPlus.style.display = "none";
        } else {
            voirPlusSection.style.display = "none";
            btnVoirPlus.style.display = "block";
        }
    }
    </script>

</body>

</html>