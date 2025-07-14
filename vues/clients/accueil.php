<?php

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Fil d'actualité Facebook</title>
    <link rel="stylesheet" href="/php-social-network/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                <a href="/php-social-network/profile.php?id=<?= htmlspecialchars($currentUserId) ?>"
                    class="topbar-profile-link">
                    <img src="<?= htmlspecialchars($currentUserAvatar) ?>"
                        alt="Profil de <?= htmlspecialchars($currentUserName) ?>" class="topbar-user-avatar">
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="sidebar">
            <a href="/php-social-network/profile.php?id=<?= htmlspecialchars($currentUserId) ?>"
                class="sidebar-user-profile">
                <img src="<?= htmlspecialchars($currentUserAvatar) ?>"
                    alt="Profil de <?= htmlspecialchars($currentUserName) ?>" class="user-profile-pic-small">
                <span class="user-profile-name-small"><?= htmlspecialchars($currentUserName) ?></span>
            </a>
            <p><i class="fa-solid fa-robot icon violet"></i> Meta AI</p>
            <p><i class="fa-solid fa-user-group icon cyan"></i> Ami(e)s</p>
            <p><i class="fa-solid fa-chart-line icon pink"></i> Tableau de bord professionnel</p>
            <p><i class="fa-solid fa-newspaper icon blue"></i> Fils</p>
            <p><i class="fa-solid fa-people-group icon cyan"></i> Groupes</p>
            <p><i class="fa-solid fa-store blue"></i> Marketplace</p>

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

        <div class="feed">
            <div class="create-post">
                <div class="post-input-container" id="openPostModal"> <img
                        src="/php-social-network/assets/images/avatar.jpeg" alt="Profil" class="post-avatar">
                    <div class="post-placeholder">Quoi de neuf, <span id="currentUserNamePlaceholder">Utilisateur</span>
                        ?</div>
                </div>
                <div class="post-actions-quick">
                    <button class="action-button"><i class="fas fa-video red"></i> Vidéo en direct</button>
                    <button class="action-button"><i class="fas fa-images green"></i> Photo/Vidéo</button>
                    <button class="action-button"><i class="fas fa-film blue-reel"></i> Reel</button>
                </div>
            </div>

            <div class="stories-wrapper">
                <div class="scroll-button left" id="stories-scroll-left">
                    <i class="fas fa-chevron-left"></i>
                </div>

                <div class="stories-container" id="stories-container">
                    <div class="story-card">
                        <video class="story-background-media" autoplay loop muted playsinline>
                            <source src="/php-social-network/assets/videos/reel1.mp4" type="video/mp4">
                            Votre navigateur ne supporte pas la balise vidéo.
                        </video>
                        <img src="/php-social-network/assets/images/reel1.jpg" alt="Profile Picture"
                            class="story-profile-pic">
                        <div class="story-user-name">Légerol Tchogbe</div>
                    </div>

                    <div class="story-card">
                        <video class="story-background-media" autoplay loop muted playsinline>
                            <source src="/php-social-network/assets/videos/reel2.mp4" type="video/mp4">
                            Votre navigateur ne supporte pas la balise vidéo.
                        </video>
                        <img src="/php-social-network/assets/images/reel2.jpg" alt="Profile Picture"
                            class="story-profile-pic">
                        <div class="story-user-name">Claire Moreau</div>
                    </div>

                    <div class="story-card">
                        <video class="story-background-media" autoplay loop muted playsinline>
                            <source src="/php-social-network/assets/videos/reel3.mp4" type="video/mp4">
                            Votre navigateur ne supporte pas la balise vidéo.
                        </video>
                        <img src="/php-social-network/assets/images/reel3.jpg" alt="Profile Picture"
                            class="story-profile-pic">
                        <div class="story-user-name">Ebeniser Kodjo</div>
                    </div>

                    <div class="story-card">
                        <video class="story-background-media" autoplay loop muted playsinline>
                            <source src="/php-social-network/assets/videos/reel4.mp4" type="video/mp4">
                            Votre navigateur ne supporte pas la balise vidéo.
                        </video>
                        <img src="/php-social-network/assets/images/reel4.jpg" alt="Profile Picture"
                            class="story-profile-pic">
                        <div class="story-user-name">Serge Ahouansou</div>
                    </div>

                    <div class="story-card">
                        <video class="story-background-media" autoplay loop muted playsinline>
                            <source src="/php-social-network/assets/videos/reel5.mp4" type="video/mp4">
                            Votre navigateur ne supporte pas la balise vidéo.
                        </video>
                        <img src="/php-social-network/assets/images/reel5.jpg" alt="Profile Picture"
                            class="story-profile-pic">
                        <div class="story-user-name">Mae Lyse Ask</div>
                    </div>

                    <div class="story-card">
                        <video class="story-background-media" autoplay loop muted playsinline>
                            <source src="/php-social-network/assets/videos/reel6.mp4" type="video/mp4">
                            Votre navigateur ne supporte pas la balise vidéo.
                        </video>
                        <img src="/php-social-network/assets/images/reel6.jpg" alt="Profile Picture"
                            class="story-profile-pic">
                        <div class="story-user-name">Piscide Azanim</div>
                    </div>
                </div>

                <div class="scroll-button right" id="stories-scroll-right">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <div class="post" data-post-id="1">
                <div class="post-header">
                    <div class="post-avatar-container">
                        <img src="/php-social-network/assets/images/reel1.jpg" alt="Avatar" class="post-avatar">
                        <div class="post-avatar-ring"></div>
                    </div>
                    <div class="post-author-info">
                        <div class="post-author">Légerol Tchogbe</div>
                        <div class="post-time">Il il y a 2 heures</div>
                    </div>
                </div>

                <div class="post-content">
                    Tu as eu ton BAC et tu est content 😇et tu penses que tu as tout fini mais laisse moi te dire qu'au
                    campus là bas, il y a la galère qui t'attend à bras ouverts. Mon frère il y de l'espoir pour toi.
                    Gari est la solution : il y de l'espoir pour toi 🤣🤣🤣
                </div>
                <div class="post-actions">
                    <div class="post-action reaction-options" data-post-id="1">
                        <div class="reaction-btn" onclick="handleReactionClick(1, event)"
                            onmouseenter="handleReactionHover(1)" onmouseleave="hideReactionTooltip(1)">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <span>J'aime</span>
                        </div>
                        <div class="reaction-tooltip">
                            <div class="reaction-icon reaction-like" onclick="setReaction(1, 'like', event)">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <div class="reaction-icon reaction-love" onclick="setReaction(1, 'love', event)">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                            <div class="reaction-icon reaction-haha" onclick="setReaction(1, 'haha', event)">
                                <i class="fa-solid fa-face-laugh-squint"></i>
                            </div>
                            <div class="reaction-icon reaction-wow" onclick="setReaction(1, 'wow', event)">
                                <i class="fa-solid fa-face-surprise"></i>
                            </div>
                            <div class="reaction-icon reaction-sad" onclick="setReaction(1, 'sad', event)">
                                <i class="fa-solid fa-face-sad-tear"></i>
                            </div>
                            <div class="reaction-icon reaction-angry" onclick="setReaction(1, 'angry', event)">
                                <i class="fa-solid fa-face-angry"></i>
                            </div>
                        </div>
                    </div>
                    <div class="post-action comment-toggle-button"> <i class="fa-solid fa-comment"></i>
                        <span>Commenter</span>
                    </div>
                    <div class="post-action">
                        <i class="fa-solid fa-share"></i>
                        <span>Partager</span>
                    </div>
                </div>

                <div class="post-comments" style="display: none;">
                    <div class="comment-stats">
                        <span class="comment-count">0 commentaires</span>
                    </div>
                    <div class="comment-input-area">
                        <img src="https://via.placeholder.com/30" alt="Votre avatar" class="comment-avatar">
                        <div class="comment-input-container">
                            <input type="text" class="comment-input" placeholder="Écrivez un commentaire...">
                            <div class="comment-input-options">
                                <i class="fa-solid fa-camera"></i> <i class="fa-solid fa-microphone"></i> <i
                                    class="fa-regular fa-face-smile"></i> <i class="fa-solid fa-gif"></i>
                            </div>
                        </div>
                    </div>
                    <div class="comments-list">
                    </div>
                </div>
            </div>


            <div class="post" data-post-id="2">
                <div class="post-header">
                    <div class="post-avatar-container">
                        <img src="/php-social-network/assets/images/reel2.jpg" alt="Avatar" class="post-avatar">
                        <div class="post-avatar-ring"></div>
                    </div>
                    <div class="post-author-info">
                        <div class="post-author">Claire Moreau</div>
                        <div class="post-time">il y a 4 minutes</div>
                    </div>
                </div>
                <div class="post-content">
                    Elle: << Tout ce temps qu'on à passé ensemble, t'est devenu comme un frère pour moi>>
                        J'ai toussé trois fois 🤧
                </div>
                <div class="post-actions">
                    <div class="post-action reaction-options" data-post-id="1">
                        <div class="reaction-btn" onclick="handleReactionClick(2, event)"
                            onmouseenter="handleReactionHover(2)" onmouseleave="hideReactionTooltip(2)">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <span>J'aime</span>
                        </div>
                        <div class="reaction-tooltip">
                            <div class="reaction-icon reaction-like" onclick="setReaction(2, 'like', event)">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <div class="reaction-icon reaction-love" onclick="setReaction(2, 'love', event)">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                            <div class="reaction-icon reaction-haha" onclick="setReaction(2, 'haha', event)">
                                <i class="fa-solid fa-face-laugh-squint"></i>
                            </div>
                            <div class="reaction-icon reaction-wow" onclick="setReaction(2, 'wow', event)">
                                <i class="fa-solid fa-face-surprise"></i>
                            </div>
                            <div class="reaction-icon reaction-sad" onclick="setReaction(2, 'sad', event)">
                                <i class="fa-solid fa-face-sad-tear"></i>
                            </div>
                            <div class="reaction-icon reaction-angry" onclick="setReaction(2, 'angry', event)">
                                <i class="fa-solid fa-face-angry"></i>
                            </div>
                        </div>
                    </div>
                    <div class="post-action comment-toggle-button"> <i class="fa-solid fa-comment"></i>
                        <span>Commenter</span>
                    </div>
                    <div class="post-action">
                        <i class="fa-solid fa-share"></i>
                        <span>Partager</span>
                    </div>
                </div>

                <div class="post-comments" style="display: none;">
                    <div class="comment-stats">
                        <span class="comment-count">0 commentaires</span>
                    </div>
                    <div class="comment-input-area">
                        <img src="https://via.placeholder.com/30" alt="Votre avatar" class="comment-avatar">
                        <div class="comment-input-container">
                            <input type="text" class="comment-input" placeholder="Écrivez un commentaire...">
                            <div class="comment-input-options">
                                <i class="fa-solid fa-camera"></i> <i class="fa-solid fa-microphone"></i> <i
                                    class="fa-regular fa-face-smile"></i> <i class="fa-solid fa-gif"></i>
                            </div>
                        </div>
                    </div>
                    <div class="comments-list">
                    </div>
                </div>
            </div>


            <div class="reels-section">
                <h3 class="section-title">Réels et vidéos courtes</h3>
                <div class="reels-wrapper">
                    <div class="scroll-button left" id="reels-scroll-left">
                        <i class="fas fa-chevron-left"></i>
                    </div>

                    <div class="reels-container" id="reels-container">
                        <div class="reel-card">
                            <video class="reel-video" autoplay loop muted playsinline
                                poster="/php-social-network/assets/videos/reel1.mp4">
                                <source src="/php-social-network/assets/videos/reel1.mp4" type="video/mp4">
                                Votre navigateur ne supporte pas la vidéo.
                            </video>
                            <div class="reel-overlay"></div>
                            <div class="reel-content">
                                <div class="reel-header">
                                    <img src="/php-social-network/assets/images/reel1.jpg" alt="Profile"
                                        class="reel-profile-pic">
                                    <div class="reel-user-info">
                                        <span class="reel-user-name">Ebeniser</span>
                                        <button class="reel-follow-btn">Suivre</button>
                                    </div>
                                </div>
                                <p class="reel-description">Adorons le seigneur! #beat #reel
                                    #video #fun</p>
                            </div>
                            <div class="reel-actions">
                                <div class="reel-action-item">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span>1K</span>
                                </div>
                                <div class="reel-action-item">
                                    <i class="fas fa-comment"></i>
                                    <span>30</span>
                                </div>
                                <div class="reel-action-item">
                                    <i class="fas fa-share"></i>
                                    <span>50</span>
                                </div>
                            </div>
                        </div>

                        <div class="reel-card">
                            <video class="reel-video" autoplay loop muted playsinline
                                poster="https://via.placeholder.com/200x350/ADD8E6/000000?text=Reel+2+Placeholder">
                                <source src="/php-social-network/assets/videos/reel2.mp4" type="video/mp4">
                                Votre navigateur ne supporte pas la vidéo.
                            </video>
                            <div class="reel-overlay"></div>
                            <div class="reel-content">
                                <div class="reel-header">
                                    <img src="/php-social-network/assets/images/reel2.jpg" alt="Profile"
                                        class="reel-profile-pic">
                                    <div class="reel-user-info">
                                        <span class="reel-user-name">Enock</span>
                                        <button class="reel-follow-btn">Suivre</button>
                                    </div>
                                </div>
                                <p class="reel-description">Nouveau challenge dance #dance_challenge #viral
                                </p>
                            </div>
                            <div class="reel-actions">
                                <div class="reel-action-item">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span>2K</span>
                                </div>
                                <div class="reel-action-item">
                                    <i class="fas fa-comment"></i>
                                    <span>69</span>
                                </div>
                                <div class="reel-action-item">
                                    <i class="fas fa-share"></i>
                                    <span>10</span>
                                </div>
                            </div>
                        </div>
                        <div class="reel-card">
                            <video class="reel-video" autoplay loop muted playsinline
                                poster="https://via.placeholder.com/200x350/ADD8E6/000000?text=Reel+2+Placeholder">
                                <source src="/php-social-network/assets/videos/reel3.mp4" type="video/mp4">
                                Votre navigateur ne supporte pas la vidéo.
                            </video>
                            <div class="reel-overlay"></div>
                            <div class="reel-content">
                                <div class="reel-header">
                                    <img src="/php-social-network/assets/images/reel3.jpg" alt="Profile"
                                        class="reel-profile-pic">
                                    <div class="reel-user-info">
                                        <span class="reel-user-name">Bob</span>
                                        <button class="reel-follow-btn">Suivre</button>
                                    </div>
                                </div>
                                <p class="reel-description">La rupture #challenge #viral
                                </p>
                            </div>
                            <div class="reel-actions">
                                <div class="reel-action-item">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span>14K</span>
                                </div>
                                <div class="reel-action-item">
                                    <i class="fas fa-comment"></i>
                                    <span>470</span>
                                </div>
                                <div class="reel-action-item">
                                    <i class="fas fa-share"></i>
                                    <span>200</span>
                                </div>
                            </div>
                        </div>
                        <div class="reel-card">
                            <video class="reel-video" autoplay loop muted playsinline
                                poster="https://via.placeholder.com/200x350/ADD8E6/000000?text=Reel+2+Placeholder">
                                <source src="/php-social-network/assets/videos/reel4.mp4" type="video/mp4">
                                Votre navigateur ne supporte pas la vidéo.
                            </video>
                            <div class="reel-overlay"></div>
                            <div class="reel-content">
                                <div class="reel-header">
                                    <img src="/php-social-network/assets/images/reel4.jpg" alt="Profile"
                                        class="reel-profile-pic">
                                    <div class="reel-user-info">
                                        <span class="reel-user-name">Mathieu</span>
                                        <button class="reel-follow-btn">Suivre</button>
                                    </div>
                                </div>
                                <p class="reel-description">drive with me #Motor #drive
                                </p>
                            </div>
                            <div class="reel-actions">
                                <div class="reel-action-item">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span>2.1K</span>
                                </div>
                                <div class="reel-action-item">
                                    <i class="fas fa-comment"></i>
                                    <span>400</span>
                                </div>
                                <div class="reel-action-item">
                                    <i class="fas fa-share"></i>
                                    <span>10</span>
                                </div>
                            </div>
                        </div>

                        <div class="reel-card">
                            <video class="reel-video" autoplay loop muted playsinline
                                poster="https://via.placeholder.com/200x350/ADD8E6/000000?text=Reel+3+Placeholder">
                                <source src="/php-social-network/assets/videos/reel5.mp4" type="video/mp4">
                                Votre navigateur ne supporte pas la vidéo.
                            </video>
                            <div class="reel-overlay"></div>
                            <div class="reel-content">
                                <div class="reel-header">
                                    <img src="/php-social-network/assets/images/reel5.jpg" alt="Profile"
                                        class="reel-profile-pic">
                                    <div class="reel-user-info">
                                        <span class="reel-user-name">Serge</span>
                                        <button class="reel-follow-btn">Suivre</button>
                                    </div>
                                </div>
                                <p class="reel-description">Essor de lè! #Ahooto/p>
                            </div>
                            <div class="reel-actions">
                                <div class="reel-action-item">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span>5.0K</span>
                                </div>
                                <div class="reel-action-item">
                                    <i class="fas fa-comment"></i>
                                    <span>800</span>
                                </div>
                                <div class="reel-action-item">
                                    <i class="fas fa-share"></i>
                                    <span>250</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="scroll-button right" id="reels-scroll-right">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>

            <div class="post" data-post-id="3">
                <div class="post-header">
                    <div class="post-avatar-container">
                        <img src="/php-social-network/assets/images/reel3.jpg" alt="Avatar" class="post-avatar">
                        <div class="post-avatar-ring"></div>
                    </div>
                    <div class="post-author-info">
                        <div class="post-author">Ebeniser Kodjo</div>
                        <div class="post-time">il y a 7 minutes</div>
                    </div>
                </div>

                <div class="post-content">
                    ✨ HISTOIRE DRÔLE ✨
                    En plein sommeil, Aïcha une fille de 24 ans fait un rêve.
                    Dans son rêve, elle s'est fiancée à un homme très riche, sauvagement riche.
                    Après le mariage elle tomba enceinte, et dans la salle d'accouchement
                    la sage femme lui demande de pousser, et elle donna naissance a un mignon bébé 😍mais la sage femme
                    lui dit qu il reste encore un autre
                    et elle poussa de nouveau et un second bébé est sorti 😍😍la sage femme lui dit qu'il en reste
                    encore, et pendant qu'elle essayait de pousser encore
                    c'est là que sa camarade entre et crie :
                    «Aicha réveille-toi, tu es en train de faire caca»🤗🤣🤣
                </div>
                <div class="post-actions">
                    <div class="post-action reaction-options" data-post-id="3">
                        <div class="reaction-btn" onclick="handleReactionClick(3, event)"
                            onmouseenter="handleReactionHover(3)" onmouseleave="hideReactionTooltip(3)">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <span>J'aime</span>
                        </div>
                        <div class="reaction-tooltip">
                            <div class="reaction-icon reaction-like" onclick="setReaction(3, 'like', event)">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <div class="reaction-icon reaction-love" onclick="setReaction(3, 'love', event)">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                            <div class="reaction-icon reaction-haha" onclick="setReaction(3, 'haha', event)">
                                <i class="fa-solid fa-face-laugh-squint"></i>
                            </div>
                            <div class="reaction-icon reaction-wow" onclick="setReaction(3, 'wow', event)">
                                <i class="fa-solid fa-face-surprise"></i>
                            </div>
                            <div class="reaction-icon reaction-sad" onclick="setReaction(3, 'sad', event)">
                                <i class="fa-solid fa-face-sad-tear"></i>
                            </div>
                            <div class="reaction-icon reaction-angry" onclick="setReaction(3, 'angry', event)">
                                <i class="fa-solid fa-face-angry"></i>
                            </div>
                        </div>
                    </div>
                    <div class="post-action comment-toggle-button"> <i class="fa-solid fa-comment"></i>
                        <span>Commenter</span>
                    </div>
                    <div class="post-action">
                        <i class="fa-solid fa-share"></i>
                        <span>Partager</span>
                    </div>
                </div>

                <div class="post-comments" style="display: none;">
                    <div class="comment-stats">
                        <span class="comment-count">0 commentaires</span>
                    </div>
                    <div class="comment-input-area">
                        <img src="https://via.placeholder.com/30" alt="Votre avatar" class="comment-avatar">
                        <div class="comment-input-container">
                            <input type="text" class="comment-input" placeholder="Écrivez un commentaire...">
                            <div class="comment-input-options">
                                <i class="fa-solid fa-camera"></i> <i class="fa-solid fa-microphone"></i> <i
                                    class="fa-regular fa-face-smile"></i> <i class="fa-solid fa-gif"></i>
                            </div>
                        </div>
                    </div>
                    <div class="comments-list">
                    </div>
                </div>
            </div>
            <!-- Ajoutons quelques posts supplémentaires pour avoir plus de contenu -->

            <div class="post" data-post-id="4">
                <div class="post-header">
                    <div class="post-avatar-container">
                        <img src="/php-social-network/assets/images/reel4.jpg" alt="Avatar" class="post-avatar">
                        <div class="post-avatar-ring"></div>
                    </div>
                    <div class="post-author-info">
                        <div class="post-author">Serge Ahouansou</div>
                        <div class="post-time">A l'instant</div>
                    </div>
                </div>
                <div class="post-content">
                    Faire le devoir
                    Seul=10 min 🤗
                    Faire avec maman=5h45 min🤦+76 gifles 😭+163 injures 😡,270 Feintes 😂+10 tentative de meurtre 😷
                </div>
                <div class="post-actions">
                    <div class="post-action reaction-options" data-post-id="1">
                        <div class="reaction-btn" onclick="handleReactionClick(4, event)"
                            onmouseenter="handleReactionHover(4)" onmouseleave="hideReactionTooltip(4)">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <span>J'aime</span>
                        </div>
                        <div class="reaction-tooltip">
                            <div class="reaction-icon reaction-like" onclick="setReaction(4, 'like', event)">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <div class="reaction-icon reaction-love" onclick="setReaction(4, 'love', event)">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                            <div class="reaction-icon reaction-haha" onclick="setReaction(4, 'haha', event)">
                                <i class="fa-solid fa-face-laugh-squint"></i>
                            </div>
                            <div class="reaction-icon reaction-wow" onclick="setReaction(4, 'wow', event)">
                                <i class="fa-solid fa-face-surprise"></i>
                            </div>
                            <div class="reaction-icon reaction-sad" onclick="setReaction(4, 'sad', event)">
                                <i class="fa-solid fa-face-sad-tear"></i>
                            </div>
                            <div class="reaction-icon reaction-angry" onclick="setReaction(4, 'angry', event)">
                                <i class="fa-solid fa-face-angry"></i>
                            </div>
                        </div>
                    </div>
                    <div class="post-action comment-toggle-button"> <i class="fa-solid fa-comment"></i>
                        <span>Commenter</span>
                    </div>
                    <div class="post-action">
                        <i class="fa-solid fa-share"></i>
                        <span>Partager</span>
                    </div>
                </div>

                <div class="post-comments" style="display: none;">
                    <div class="comment-stats">
                        <span class="comment-count">0 commentaires</span>
                    </div>
                    <div class="comment-input-area">
                        <img src="https://via.placeholder.com/30" alt="Votre avatar" class="comment-avatar">
                        <div class="comment-input-container">
                            <input type="text" class="comment-input" placeholder="Écrivez un commentaire...">
                            <div class="comment-input-options">
                                <i class="fa-solid fa-camera"></i> <i class="fa-solid fa-microphone"></i> <i
                                    class="fa-regular fa-face-smile"></i> <i class="fa-solid fa-gif"></i>
                            </div>
                        </div>
                    </div>
                    <div class="comments-list">
                    </div>
                </div>
            </div>


            <div class="post" data-post-id="5">
                <div class="post-header">
                    <div class="post-avatar-container">
                        <img src="/php-social-network/assets/images/reel5.jpg" alt="Avatar" class="post-avatar">
                        <div class="post-avatar-ring"></div>
                    </div>
                    <div class="post-author-info">
                        <div class="post-author">Mae Lyse Ask</div>
                        <div class="post-time">il y a 24 minutes</div>
                    </div>
                </div>
                <div class="post-content">
                    VENDEUSE : J'AI PAS LA MONNAIE😲
                    🇨🇵: t'inquiète pas garde la monnaie
                    🇧🇯: regarde bien mon visage à mon retou je vais prendre😒
                </div>
                <div class="post-actions">
                    <div class="post-action reaction-options" data-post-id="5">
                        <div class="reaction-btn" onclick="handleReactionClick(5, event)"
                            onmouseenter="handleReactionHover(5)" onmouseleave="hideReactionTooltip(5)">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <span>J'aime</span>
                        </div>
                        <div class="reaction-tooltip">
                            <div class="reaction-icon reaction-like" onclick="setReaction(5, 'like', event)">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <div class="reaction-icon reaction-love" onclick="setReaction(5, 'love', event)">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                            <div class="reaction-icon reaction-haha" onclick="setReaction(5, 'haha', event)">
                                <i class="fa-solid fa-face-laugh-squint"></i>
                            </div>
                            <div class="reaction-icon reaction-wow" onclick="setReaction(5, 'wow', event)">
                                <i class="fa-solid fa-face-surprise"></i>
                            </div>
                            <div class="reaction-icon reaction-sad" onclick="setReaction(5, 'sad', event)">
                                <i class="fa-solid fa-face-sad-tear"></i>
                            </div>
                            <div class="reaction-icon reaction-angry" onclick="setReaction(5, 'angry', event)">
                                <i class="fa-solid fa-face-angry"></i>
                            </div>
                        </div>
                    </div>
                    <div class="post-action comment-toggle-button"> <i class="fa-solid fa-comment"></i>
                        <span>Commenter</span>
                    </div>
                    <div class="post-action">
                        <i class="fa-solid fa-share"></i>
                        <span>Partager</span>
                    </div>
                </div>

                <div class="post-comments" style="display: none;">
                    <div class="comment-stats">
                        <span class="comment-count">0 commentaires</span>
                    </div>
                    <div class="comment-input-area">
                        <img src="https://via.placeholder.com/30" alt="Votre avatar" class="comment-avatar">
                        <div class="comment-input-container">
                            <input type="text" class="comment-input" placeholder="Écrivez un commentaire...">
                            <div class="comment-input-options">
                                <i class="fa-solid fa-camera"></i> <i class="fa-solid fa-microphone"></i> <i
                                    class="fa-regular fa-face-smile"></i> <i class="fa-solid fa-gif"></i>
                            </div>
                        </div>
                    </div>
                    <div class="comments-list">
                    </div>
                </div>
            </div>
        </div>

        <div class="rightbar">
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

            <div class="right-section">
                <div class="section-header">
                    <h3>Anniversaires</h3>
                </div>
                <div class="birthday-content">
                    C'est l'anniversaire de Samson Le Brave Sevo et 8 autres personnes aujourd'hui.
                </div>
            </div>

            <div class="sponsored-card">
                <div class="sponsored-label">Sponsorisé</div>
                <div class="sponsored-content">
                    <div class="sponsored-title">Voir unlimited creative subscription</div>
                    <div class="sponsored-link">envato.com/unlimited-assets</div>
                </div>
            </div>

            <div class="right-section">
                <div class="section-header">
                    <h3>Contacts</h3>
                    <div class="contacts-icons">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                </div>

                <!-- Meta AI Contact -->
                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <div class="meta-ai-avatar">
                            <i class="fa-solid fa-robot"></i>
                        </div>
                        <div class="verified-badge">
                            <i class="fa-solid fa-check"></i>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Meta AI</div>
                    </div>
                    <div class="online-status online"></div>
                </div>

                <!-- Liste des autres contacts -->
                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Oluwa Funmi Layọ̀</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Rebecca BK</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Tâ Marie</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Herrlich Kdj</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Judith Hounsou</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Phoébé Savi</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Rosine Eudoscie Baloïtcha</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Eunice Richy</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status offline"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Déo-gratias Tchedji</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Dari Gomez</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Stéphanie Hounsouкponoп</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Christian Le Fraîcheur</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status offline"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Gisèle Giselas</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Kim Maxence Yngvár</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Jennie Dossou</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status online"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Sènanoudé Mékis</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Profil" class="contact-avatar">
                        <div class="online-status recent"></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Mae Lyse Ask</div>
                        <div class="last-seen">4 min</div>
                    </div>
                </div>

                <!-- Sections supplémentaires -->
                <div class="section-title">Discussions de communauté</div>

                <div class="contact-item messenger-contact group-chat">
                    <div class="contact-avatar-wrapper">
                        <div class="group-avatar">
                            <i class="fa-solid fa-comments"></i>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">COD GLOBAL BNS</div>
                        <div class="group-description">CODM Account BUY&SELL GLOBAL</div>
                    </div>
                </div>

                <div class="section-title">Discussions de groupe</div>

                <div class="contact-item messenger-contact group-chat">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Groupe" class="contact-avatar">
                        <div class="group-badge">52 sem.</div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Les étudiants FAST-MIA</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact group-chat">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Groupe" class="contact-avatar">
                        <div class="group-badge">1 an</div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">PCT Tle D MAGr Groupe Promotion 2021~2022</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact group-chat">
                    <div class="contact-avatar-wrapper">
                        <img src="https://via.placeholder.com/36" alt="Groupe" class="contact-avatar">
                        <div class="group-badge">1 an</div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">CHRIST GOSPEL TALENT 🔥</div>
                    </div>
                </div>

                <div class="contact-item messenger-contact create-group">
                    <div class="contact-avatar-wrapper">
                        <div class="create-group-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Créer une discussion de groupe</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="postModal" class="modal">
        <div class="modal-content">
            <span class="close-button" id="closePostModal">&times;</span>
            <h2>Créer une publication</h2>
            <div class="modal-divider"></div>

            <div class="modal-header-user">
                <img src="/php-social-network/assets/img/avatar.jpeg" alt="Profil" class="post-avatar">
                <span class="modal-username" id="modalUserNamePlaceholder">Nom de l'utilisateur</span>

                <textarea id="postContent" placeholder="Quoi de neuf, <span id="
                    textareaPlaceholderName">Utilisateur</span> ?" class="modal-textarea"></textarea>
            </div>
            <div class="modal-media-upload">
                <input type="file" id="mediaUpload" accept="image/*,video/*" style="display: none;">
                <label for="mediaUpload" class="upload-button">
                    <i class="fas fa-images"></i> Ajouter Photo/Vidéo
                </label>
                <div id="mediaPreview" class="media-preview"></div>
            </div>

            <button id="publishButton" class="publish-button">Publier</button>
        </div>
    </div>
    <script src="/php-social-network/assets/js/accueil.js"></script>

</body>

</html>
