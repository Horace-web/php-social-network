<?php
?>
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

        <!-- Fil d'actualité central -->
        <div class="feed">
            <!-- Section "Quoi de neuf" -->
            <div class="create-post">
                <div class="post-header">
                    <img src="https://via.placeholder.com/40" alt="Profil" class="post-avatar">
                    <input type="text" placeholder="Quoi de neuf, Léger ?" class="status-input">
                </div>
                <div class="post-options">
                    <div class="post-option">
                        <i class="fa-solid fa-video red"></i>
                        <span>Vidéo en direct</span>
                    </div>
                    <div class="post-option">
                        <i class="fa-solid fa-images green"></i>
                        <span>Photo/vidéo</span>
                    </div>
                    <div class="post-option">
                        <i class="fa-solid fa-smile yellow"></i>
                        <span>Humeur/activité</span>
                    </div>
                </div>
            </div>

            <!-- Stories -->
            <div class="stories-container">
                <div class="story">
                    <img src="https://via.placeholder.com/110x200" alt="Story">
                    <div class="story-author">Sange Dani</div>
                </div>
                <div class="story">
                    <img src="https://via.placeholder.com/110x200" alt="Story">
                    <div class="story-author">L'assurance</div>
                </div>
                <div class="story">
                    <img src="https://via.placeholder.com/110x200" alt="Story">
                    <div class="story-author">Unité</div>
                </div>
                <div class="story">
                    <img src="https://via.placeholder.com/110x200" alt="Story">
                    <div class="story-author">Génage</div>
                </div>
                <div class="story">
                    <img src="https://via.placeholder.com/110x200" alt="Story">
                    <div class="story-author">L'assurance</div>
                </div>
                <div class="story">
                    <img src="https://via.placeholder.com/110x200" alt="Story">
                    <div class="story-author">Unité</div>
                </div>
                <div class="story">
                    <img src="https://via.placeholder.com/110x200" alt="Story">
                    <div class="story-author">Sange Dani</div>
                </div>
            </div>

            <!-- Post normal (non sponsorisé) -->
            <!-- Post 1 -->
            <div class="post" data-post-id="1">
                <div class="post-header">
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="post-avatar">
                    <div>
                        <div class="post-author">Piscide Azanfin</div>
                        <div class="post-time">Il y a 1 min · <i class="fa-solid fa-earth-americas"></i></div>
                    </div>
                </div>
                <div class="post-content">
                    Il y a un premier coteur au dit : "Bon sang !" puis deux chevques sont élevées. "Il faut
                    toujours
                    savoir là où tu me les mains car le vie m'a pas de bonheur." En voir plus.
                </div>
                <div class="post-action reaction-options">
                    <div class="reaction-btn" onclick="toggleReaction(this, 1)">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span>J'aime</span>
                    </div>
                    <div class="reaction-tooltip">
                        <div class="reaction-icon reaction-like" onclick="setReaction(1, 'like')">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div class="reaction-icon reaction-love" onclick="setReaction(1, 'love')">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="reaction-icon reaction-haha" onclick="setReaction(1, 'haha')">
                            <i class="fa-solid fa-face-laugh-squint"></i>
                        </div>
                        <div class="reaction-icon reaction-wow" onclick="setReaction(1, 'wow')">
                            <i class="fa-solid fa-face-surprise"></i>
                        </div>
                        <div class="reaction-icon reaction-sad" onclick="setReaction(1, 'sad')">
                            <i class="fa-solid fa-face-sad-tear"></i>
                        </div>
                        <div class="reaction-icon reaction-angry" onclick="setReaction(1, 'angry')">
                            <i class="fa-solid fa-face-angry"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post" data-post-id="2">
                <div class="post-header">
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="post-avatar">
                    <div>
                        <div class="post-author">Piscide Azanfin</div>
                        <div class="post-time">Il y a 1 min · <i class="fa-solid fa-earth-americas"></i></div>
                    </div>
                </div>
                <div class="post-content">
                    Il y a un premier coteur au dit : "Bon sang !" puis deux chevques sont élevées. "Il faut
                    toujours
                    savoir là où tu me les mains car le vie m'a pas de bonheur." En voir plus.
                </div>
                <div class="post-action reaction-options">
                    <div class="reaction-btn" onclick="toggleReaction(this, 2   )">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span>J'aime</span>
                    </div>
                    <div class="reaction-tooltip">
                        <div class="reaction-icon reaction-like" onclick="setReaction(2, 'like')">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div class="reaction-icon reaction-love" onclick="setReaction(2, 'love')">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="reaction-icon reaction-haha" onclick="setReaction(2, 'haha')">
                            <i class="fa-solid fa-face-laugh-squint"></i>
                        </div>
                        <div class="reaction-icon reaction-wow" onclick="setReaction(2, 'wow')">
                            <i class="fa-solid fa-face-surprise"></i>
                        </div>
                        <div class="reaction-icon reaction-sad" onclick="setReaction(2, 'sad')">
                            <i class="fa-solid fa-face-sad-tear"></i>
                        </div>
                        <div class="reaction-icon reaction-angry" onclick="setReaction(2, 'angry')">
                            <i class="fa-solid fa-face-angry"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post" data-post-id="3">
                <div class="post-header">
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="post-avatar">
                    <div>
                        <div class="post-author">Piscide Azanfin</div>
                        <div class="post-time">Il y a 1 min · <i class="fa-solid fa-earth-americas"></i></div>
                    </div>
                </div>
                <div class="post-content">
                    Il y a un premier coteur au dit : "Bon sang !" puis deux chevques sont élevées. "Il faut
                    toujours
                    savoir là où tu me les mains car le vie m'a pas de bonheur." En voir plus.
                </div>
                <div class="post-action reaction-options">
                    <div class="reaction-btn" onclick="toggleReaction(this, 3)">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span>J'aime</span>
                    </div>
                    <div class="reaction-tooltip">
                        <div class="reaction-icon reaction-like" onclick="setReaction(3, 'like')">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div class="reaction-icon reaction-love" onclick="setReaction(3, 'love')">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="reaction-icon reaction-haha" onclick="setReaction(3, 'haha')">
                            <i class="fa-solid fa-face-laugh-squint"></i>
                        </div>
                        <div class="reaction-icon reaction-wow" onclick="setReaction(3, 'wow')">
                            <i class="fa-solid fa-face-surprise"></i>
                        </div>
                        <div class="reaction-icon reaction-sad" onclick="setReaction(3, 'sad')">
                            <i class="fa-solid fa-face-sad-tear"></i>
                        </div>
                        <div class="reaction-icon reaction-angry" onclick="setReaction(3, 'angry')">
                            <i class="fa-solid fa-face-angry"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post" data-post-id="4">
                <div class="post-header">
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="post-avatar">
                    <div>
                        <div class="post-author">Piscide Azanfin</div>
                        <div class="post-time">Il y a 1 min · <i class="fa-solid fa-earth-americas"></i></div>
                    </div>
                </div>
                <div class="post-content">
                    Il y a un premier coteur au dit : "Bon sang !" puis deux chevques sont élevées. "Il faut
                    toujours
                    savoir là où tu me les mains car le vie m'a pas de bonheur." En voir plus.
                </div>
                <div class="post-action reaction-options">
                    <div class="reaction-btn" onclick="toggleReaction(this, 4)">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span>J'aime</span>
                    </div>
                    <div class="reaction-tooltip">
                        <div class="reaction-icon reaction-like" onclick="setReaction(4, 'like')">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div class="reaction-icon reaction-love" onclick="setReaction(4, 'love')">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="reaction-icon reaction-haha" onclick="setReaction(4, 'haha')">
                            <i class="fa-solid fa-face-laugh-squint"></i>
                        </div>
                        <div class="reaction-icon reaction-wow" onclick="setReaction(4, 'wow')">
                            <i class="fa-solid fa-face-surprise"></i>
                        </div>
                        <div class="reaction-icon reaction-sad" onclick="setReaction(4, 'sad')">
                            <i class="fa-solid fa-face-sad-tear"></i>
                        </div>
                        <div class="reaction-icon reaction-angry" onclick="setReaction(4, 'angry')">
                            <i class="fa-solid fa-face-angry"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post" data-post-id="5">
                <div class="post-header">
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="post-avatar">
                    <div>
                        <div class="post-author">Piscide Azanfin</div>
                        <div class="post-time">Il y a 1 min · <i class="fa-solid fa-earth-americas"></i></div>
                    </div>
                </div>
                <div class="post-content">
                    Il y a un premier coteur au dit : "Bon sang !" puis deux chevques sont élevées. "Il faut
                    toujours
                    savoir là où tu me les mains car le vie m'a pas de bonheur." En voir plus.
                </div>
                <div class="post-action reaction-options">
                    <div class="reaction-btn" onclick="toggleReaction(this, 5)">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span>J'aime</span>
                    </div>
                    <div class="reaction-tooltip">
                        <div class="reaction-icon reaction-like" onclick="setReaction(5, 'like')">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div class="reaction-icon reaction-love" onclick="setReaction(5, 'love')">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="reaction-icon reaction-haha" onclick="setReaction(5, 'haha')">
                            <i class="fa-solid fa-face-laugh-squint"></i>
                        </div>
                        <div class="reaction-icon reaction-wow" onclick="setReaction(5, 'wow')">
                            <i class="fa-solid fa-face-surprise"></i>
                        </div>
                        <div class="reaction-icon reaction-sad" onclick="setReaction(5, 'sad')">
                            <i class="fa-solid fa-face-sad-tear"></i>
                        </div>
                        <div class="reaction-icon reaction-angry" onclick="setReaction(5, 'angry')">
                            <i class="fa-solid fa-face-angry"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post" data-post-id="6">
                <div class="post-header">
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="post-avatar">
                    <div>
                        <div class="post-author">Piscide Azanfin</div>
                        <div class="post-time">Il y a 1 min · <i class="fa-solid fa-earth-americas"></i></div>
                    </div>
                </div>
                <div class="post-content">
                    Il y a un premier coteur au dit : "Bon sang !" puis deux chevques sont élevées. "Il faut
                    toujours
                    savoir là où tu me les mains car le vie m'a pas de bonheur." En voir plus.
                </div>
                <div class="post-action reaction-options">
                    <div class="reaction-btn" onclick="toggleReaction(this, 6)">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span>J'aime</span>
                    </div>
                    <div class="reaction-tooltip">
                        <div class="reaction-icon reaction-like" onclick="setReaction(6, 'like')">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div class="reaction-icon reaction-love" onclick="setReaction(6, 'love')">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="reaction-icon reaction-haha" onclick="setReaction(6, 'haha')">
                            <i class="fa-solid fa-face-laugh-squint"></i>
                        </div>
                        <div class="reaction-icon reaction-wow" onclick="setReaction(6, 'wow')">
                            <i class="fa-solid fa-face-surprise"></i>
                        </div>
                        <div class="reaction-icon reaction-sad" onclick="setReaction(6, 'sad')">
                            <i class="fa-solid fa-face-sad-tear"></i>
                        </div>
                        <div class="reaction-icon reaction-angry" onclick="setReaction(6, 'angry')">
                            <i class="fa-solid fa-face-angry"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Autres posts normaux... -->
        </div>

        <!-- Colonne de droite avec contenus sponsorisés -->
        <div class="rightbar">
            <!-- Contenu sponsorisé 1 -->
            <div class="sponsored-card">
                <div class="sponsored-label">Sponsorisé</div>
                <div class="sponsored-content">
                    <div class="sponsored-title">Ailhaba.com</div>
                    <div class="sponsored-link">ailhaba.com</div>
                    <div class="post-content">
                        <strong>B1. Aux autres écrivats</strong><br>
                        VALIMITED DONNLOADS<br>
                        un invitant valide.
                    </div>
                </div>
            </div>

            <!-- Invitations -->
            <div class="right-section">
                <div class="section-header">
                    <h3>Invitations</h3>
                    <a href="#" class="see-all">Voir tout</a>
                </div>
                <div class="contact-item">
                    <img src="https://via.placeholder.com/40" alt="Profil" class="contact-avatar">
                    <div class="contact-info">
                        <div class="contact-name">Abelard Adf</div>
                        <div class="mutual-friends">98 ami(e)s en commun</div>
                    </div>
                    <div class="contact-actions">
                        <button class="confirm-btn">Confirmer</button>
                        <button class="delete-btn">Supprimer</button>
                    </div>
                </div>
            </div>

            <!-- Anniversaires -->
            <div class="right-section">
                <div class="section-header">
                    <h3>Anniversaires</h3>
                </div>
                <div class="birthday-content">
                    C'est l'anniversaire de Samson Le Brave Sevo et 8 autres personnes aujourd'hui.
                </div>
            </div>

            <!-- Contenu sponsorisé 2 -->
            <div class="sponsored-card">
                <div class="sponsored-label">Sponsorisé</div>
                <div class="sponsored-content">
                    <div class="sponsored-title">Voir unlimited creative subscription</div>
                    <div class="sponsored-link">envato.com/unlimited-assets</div>
                </div>
            </div>

            <!-- Contacts -->
            <div class="right-section">
                <div class="section-header">
                    <h3>Contacts</h3>
                </div>
                <div class="contact-item">
                    <i class="fa-solid fa-circle icon green"></i>
                    <div class="contact-info">
                        <div class="contact-name">Meta AI</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
    function toggleVoirPlus(show) {
        const voirPlusSection = document.getElementById("voir-plus");
        const btnVoirPlus = document.getElementById("btn-voir-plus");

        if (show) {
            voirPlusSection.style.display = "block";
            btnVoirPlus.style.display = "none";
        } else {
            voirPlusSection.style.display = "none";
            btnVoirPlus.style.display = "block";
        }
    }

    // Gestion des réactions
    let currentReactions = {};

    function toggleReaction(element, postId) {
        const tooltip = element.parentElement.querySelector('.reaction-tooltip');
        tooltip.style.display = tooltip.style.display === 'flex' ? 'none' : 'flex';
    }

    function setReaction(postId, reactionType) {
        const reactionBtn = document.querySelector(`.post[data-post-id="${postId}"] .reaction-btn`);
        const iconMap = {
            like: 'fa-thumbs-up',
            love: 'fa-heart',
            haha: 'fa-face-laugh-squint',
            wow: 'fa-face-surprise',
            sad: 'fa-face-sad-tear',
            angry: 'fa-face-angry'
        };

        const colorMap = {
            like: '#1877f2',
            love: '#f3425f',
            haha: '#f7b928',
            wow: '#f7b928',
            sad: '#f7b928',
            angry: '#e9710f'
        };

        // Enregistre la réaction
        currentReactions[postId] = reactionType;
        localStorage.setItem(`post_${postId}_reaction`, reactionType);

        // Met à jour l'affichage
        reactionBtn.innerHTML = `<i class="fa-solid ${iconMap[reactionType]}" style="color: ${colorMap[reactionType]}"></i>
                            <span>${getReactionText(reactionType)}</span>`;

        // Cache le tooltip
        reactionBtn.parentElement.querySelector('.reaction-tooltip').style.display = 'none';
    }

    function getReactionText(reactionType) {
        const texts = {
            like: "J'aime",
            love: "J'adore",
            haha: "Haha",
            wow: "Wow",
            sad: "Triste",
            angry: "Grrr"
        };
        return texts[reactionType] || "J'aime";
    }

    // Au chargement de la page, restaure les réactions
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.post').forEach(post => {
            const postId = post.dataset.postId;
            const savedReaction = localStorage.getItem(`post_${postId}_reaction`);

            if (savedReaction) {
                setReaction(postId, savedReaction);
            }
        });
    });

    // Affichage des commentaires
    function toggleComments(postId) {
        const commentsSection = document.getElementById(`comments-${postId}`);
        commentsSection.classList.toggle('hidden');
    }

    // Ajout de commentaires
    function addComment(postId) {
        const commentInput = document.querySelector(`#comments-${postId} .comment-input`);
        const commentText = commentInput.value.trim();

        if (commentText) {
            const commentsContainer = document.querySelector(`#comments-${postId}`);
            const newComment = document.createElement('div');
            newComment.className = 'comment';
            newComment.innerHTML = `
            <img src="https://via.placeholder.com/32" alt="Avatar" class="comment-avatar">
            <div class="comment-content">
                <div class="comment-author">Vous</div>
                <div class="comment-text">${commentText}</div>
            </div>
        `;

            // Insère avant le formulaire d'ajout
            const addCommentDiv = commentsContainer.querySelector('.add-comment');
            commentsContainer.insertBefore(newComment, addCommentDiv);

            // Réinitialise le champ
            commentInput.value = '';
        }
    }

    // Au chargement de la page, restaure les likes
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.post').forEach(post => {
            const postId = post.dataset.postId;
            const isLiked = localStorage.getItem(`post_${postId}_liked`) === 'true';

            if (isLiked) {
                const likeBtn = post.querySelector('.like-btn');
                likeBtn.classList.add('liked');
                likeBtn.innerHTML = '<i class="fa-solid fa-thumbs-up"></i><span>J\'aime</span>';
            }
        });
    });
    // (Vos fonctions existantes peuvent rester les mêmes)

    // Nouvelle fonction pour charger plus de contenu
    function loadMoreContent() {
        // Implémentez le chargement supplémentaire de posts ici
        console.log("Chargement de plus de contenu...");
    }

    // Écouteur pour le défilement infini
    window.addEventListener('scroll', function() {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 500) {
            loadMoreContent();
        }
    });
    // Gestion du clic sur les cartes sponsorisées
    document.querySelectorAll('.sponsored-card').forEach(card => {
        card.addEventListener('click', function(e) {
            if (!e.target.closest('.contact-actions')) {
                // Enregistrer l'impression/le clic
                console.log('Publicité cliquée:', this.querySelector('.sponsored-title')
                    .textContent);
                // Redirection ou ouverture en nouvelle fenêtre
                window.open(this.querySelector('.sponsored-link').textContent, '_blank');
            }
        });
    });
    // Gestion des boutons de contact
    document.querySelectorAll('.confirm-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const contactName = this.closest('.contact-item').querySelector('.contact-name')
                .textContent;
            console.log('Contact confirmé:', contactName);
            this.textContent = 'Confirmé';
            this.style.backgroundColor = '#2e89ff';
        });
    });
    </script>
</body>

</html>
