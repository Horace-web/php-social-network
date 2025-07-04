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

    <div class="container">
        <div class="sidebar">
            <p><i class="fa-solid fa-user icon blue"></i> Léger Lerger</p>
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

            <div class="stories-wrapper">
                <div class="scroll-button left" id="stories-scroll-left">
                    <i class="fas fa-chevron-left"></i>
                </div>

                <div class="stories-container" id="stories-container">
                    <div class="story-card">
                        <img src="https://via.placeholder.com/120x180/ADD8E6/000000?text=Story+1" alt="Story"
                            style="width:100%;height:100%;object-fit:cover;">
                        <div style="position:absolute; bottom:10px; left:10px; color:white; font-weight:bold;">
                            Utilisateur 1</div>
                    </div>
                    <div class="story-card">
                        <img src="https://via.placeholder.com/120x180/90EE90/000000?text=Story+2" alt="Story"
                            style="width:100%;height:100%;object-fit:cover;">
                        <div style="position:absolute; bottom:10px; left:10px; color:white; font-weight:bold;">
                            Utilisateur 2</div>
                    </div>
                    <div class="story-card">
                        <img src="https://via.placeholder.com/120x180/FFB6C1/000000?text=Story+3" alt="Story"
                            style="width:100%;height:100%;object-fit:cover;">
                        <div style="position:absolute; bottom:10px; left:10px; color:white; font-weight:bold;">
                            Utilisateur 3</div>
                    </div>
                    <div class="story-card">
                        <img src="https://via.placeholder.com/120x180/E6E6FA/000000?text=Story+4" alt="Story"
                            style="width:100%;height:100%;object-fit:cover;">
                        <div style="position:absolute; bottom:10px; left:10px; color:white; font-weight:bold;">
                            Utilisateur 4</div>
                    </div>
                    <div class="story-card">
                        <img src="https://via.placeholder.com/120x180/DDA0DD/000000?text=Story+5" alt="Story"
                            style="width:100%;height:100%;object-fit:cover;">
                        <div style="position:absolute; bottom:10px; left:10px; color:white; font-weight:bold;">
                            Utilisateur 5</div>
                    </div>
                    <div class="story-card">
                        <img src="https://via.placeholder.com/120x180/F08080/000000?text=Story+6" alt="Story"
                            style="width:100%;height:100%;object-fit:cover;">
                        <div style="position:absolute; bottom:10px; left:10px; color:white; font-weight:bold;">
                            Utilisateur 6</div>
                    </div>
                </div>

                <div class="scroll-button right" id="stories-scroll-right">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
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
                    toujours savoir là où tu me les mains car le vie m'a pas de bonheur." En voir plus.
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
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="post-avatar">
                    <div>
                        <div class="post-author">Piscide Azanfin</div>
                        <div class="post-time">Il y a 1 min · <i class="fa-solid fa-earth-americas"></i></div>
                    </div>
                </div>
                <div class="post-content">
                    Il y a un premier coteur au dit : "Bon sang !" puis deux chevques sont élevées. "Il faut
                    toujours savoir là où tu me les mains car le vie m'a pas de bonheur." En voir plus.
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
                    toujours savoir là où tu me les mains car le vie m'a pas de bonheur." En voir plus.
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
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="post-avatar">
                    <div>
                        <div class="post-author">Piscide Azanfin</div>
                        <div class="post-time">Il y a 1 min · <i class="fa-solid fa-earth-americas"></i></div>
                    </div>
                </div>
                <div class="post-content">
                    Il y a un premier coteur au dit : "Bon sang !" puis deux chevques sont élevées. "Il faut
                    toujours savoir là où tu me les mains car le vie m'a pas de bonheur." En voir plus.
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
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="post-avatar">
                    <div>
                        <div class="post-author">Piscide Azanfin</div>
                        <div class="post-time">Il y a 1 min · <i class="fa-solid fa-earth-americas"></i></div>
                    </div>
                </div>
                <div class="post-content">
                    Il y a un premier coteur au dit : "Bon sang !" puis deux chevques sont élevées. "Il faut
                    toujours savoir là où tu me les mains car le vie m'a pas de bonheur." En voir plus.
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

    <script>
    // Variables globales pour gérer les réactions des publications
    let currentReactions = {}; // Pour les réactions des publications
    let tooltipTimer = null; // Pour les tooltips des publications (publications)
    let commentHoverTimeout = null; // Pour les tooltips des commentaires

    // Variable pour stocker les réactions des commentaires
    // Structure: { postId: { commentId: 'reactionType' } }
    // Initialisation unique et vide, les propriétés seront ajoutées dynamiquement
    let allCommentReactions = {};

    // Configuration des réactions (utilisée pour les posts et les commentaires)
    // Cette configuration est définie une seule fois
    const reactionConfig = {
        like: {
            icon: 'fa-thumbs-up',
            text: "J'aime",
            color: '#1877f2', // Bleu Facebook
            class: 'liked' // Classe CSS spécifique pour le post
        },
        love: {
            icon: 'fa-heart',
            text: "J'adore",
            color: '#f3425f', // Rouge
            class: 'loved'
        },
        haha: {
            icon: 'fa-face-laugh-squint',
            text: "Haha",
            color: '#f7b928', // Jaune
            class: 'haha'
        },
        wow: {
            icon: 'fa-face-surprise',
            text: "Wow",
            color: '#f7b928', // Jaune
            class: 'wow'
        },
        sad: {
            icon: 'fa-face-sad-tear',
            text: "Triste",
            color: '#f7b928', // Jaune
            class: 'sad'
        },
        angry: {
            icon: 'fa-face-angry',
            text: "Grrr",
            color: '#e9710f', // Orange/Rouge
            class: 'angry'
        }
    };

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

    // Fonctions de gestion des réactions pour les PUBLICATIONS
    function handleReactionClick(postId, event) {
        event.stopPropagation();

        const current = currentReactions[postId];

        if (!current) {
            // Premier clic : like par défaut
            setReaction(postId, 'like', event);
        } else {
            // Si il y a déjà une réaction (peu importe laquelle), on la supprime
            removeReaction(postId);
        }
    }

    function handleReactionHover(postId) {
        // Cette fonction gère l'affichage du tooltip de réaction pour les publications
        clearTimeout(tooltipTimer);
        const tooltip = document.querySelector(`[data-post-id="${postId}"] .reaction-tooltip`);

        // Cacher tous les autres tooltips ouverts pour éviter les superpositions
        document.querySelectorAll('.reaction-tooltip').forEach(t => {
            if (t !== tooltip) {
                t.classList.remove('show');
            }
        });

        if (tooltip) {
            tooltipTimer = setTimeout(() => {
                tooltip.classList.add('show');
            }, 500); // Délai de 500ms
        }
    }

    function hideReactionTooltip(postId) {
        clearTimeout(tooltipTimer);
        setTimeout(() => {
            const tooltip = document.querySelector(`[data-post-id="${postId}"] .reaction-tooltip`);
            // Masquer le tooltip seulement si la souris n'est pas dessus
            if (tooltip && !tooltip.matches(':hover')) {
                tooltip.classList.remove('show');
            }
        }, 300); // Court délai pour permettre le déplacement vers les icônes de réaction
    }

    // showReactionTooltip n'est plus nécessaire car sa logique est intégrée dans handleReactionHover
    // et setReaction gère déjà la fermeture du tooltip.

    function setReaction(postId, reactionType, event) {
        event.stopPropagation();

        const reactionBtn = document.querySelector(`[data-post-id="${postId}"] .reaction-btn`);
        const reactionOptionsContainer = document.querySelector(
            `[data-post-id="${postId}"] .post-action.reaction-options`); // Le conteneur reaction-options du post

        const config = reactionConfig[reactionType];

        // Supprimer toutes les classes de réaction précédentes du conteneur
        Object.values(reactionConfig).forEach(r => {
            if (reactionOptionsContainer) { // S'assurer que le conteneur existe
                reactionOptionsContainer.classList.remove(r.class);
            }
        });

        if (reactionOptionsContainer && config) {
            reactionOptionsContainer.classList.add(config.class); // Ajouter la nouvelle classe au conteneur principal
        }

        if (reactionBtn && config) {
            reactionBtn.innerHTML = `
                <i class="fa-solid ${config.icon}" style="color: ${config.color}"></i>
                <span style="color: ${config.color}">${config.text}</span>
            `;
        }

        currentReactions[postId] = reactionType;

        const tooltip = document.querySelector(`[data-post-id="${postId}"] .reaction-tooltip`);
        if (tooltip) {
            tooltip.classList.remove('show'); // Cacher le tooltip après la sélection
        }
    }

    function removeReaction(postId) {
        const reactionBtn = document.querySelector(`[data-post-id="${postId}"] .reaction-btn`);
        const reactionOptionsContainer = document.querySelector(
            `[data-post-id="${postId}"] .post-action.reaction-options`);

        // Supprimer toutes les classes de réaction du conteneur
        Object.values(reactionConfig).forEach(r => {
            if (reactionOptionsContainer) {
                reactionOptionsContainer.classList.remove(r.class);
            }
        });

        if (reactionBtn) {
            reactionBtn.innerHTML = `
                <i class="fa-solid fa-thumbs-up"></i>
                <span>J'aime</span>
            `;
            reactionBtn.style.color = '#b0b3b8'; // Remettre la couleur par défaut
        }

        delete currentReactions[postId];
    }

    // Fonctions de gestion des réactions pour les COMMENTAIRES
    let commentTooltipTimer = null; // Timer spécifique aux tooltips des commentaires

    function handleCommentReactionHover(postId, commentId) {
        clearTimeout(commentTooltipTimer);
        const commentReactionOptions = document.querySelector(
            `.comment-reaction-options[data-post-id="${postId}"][data-comment-id="${commentId}"]`);
        const reactionTooltip = commentReactionOptions ? commentReactionOptions.querySelector('.reaction-tooltip') :
            null;

        if (reactionTooltip) {
            commentTooltipTimer = setTimeout(() => {
                reactionTooltip.classList.add('show'); // Utilise la classe 'show' pour la visibilité
            }, 300); // Délai de 300ms avant d'afficher
        }
    }

    function hideCommentReactionTooltip(postId, commentId) {
        clearTimeout(commentTooltipTimer);
        const commentReactionOptions = document.querySelector(
            `.comment-reaction-options[data-post-id="${postId}"][data-comment-id="${commentId}"]`);
        const reactionTooltip = commentReactionOptions ? commentReactionOptions.querySelector('.reaction-tooltip') :
            null;
        if (reactionTooltip) {
            reactionTooltip.classList.remove('show'); // Retire la classe 'show' pour masquer
        }
    }

    function setCommentReaction(postId, commentId, reactionType, event) {
        if (event) {
            event.preventDefault();
            event.stopPropagation(); // Empêche la propagation de l'événement
        }

        if (!allCommentReactions[postId]) {
            allCommentReactions[postId] = {};
        }

        const currentCommentReaction = allCommentReactions[postId][commentId];

        // Si l'utilisateur clique sur la même réaction, la retirer
        if (currentCommentReaction === reactionType) {
            delete allCommentReactions[postId][commentId]; // Supprime la réaction
        } else {
            // Sinon, on applique la nouvelle réaction
            allCommentReactions[postId][commentId] = reactionType;
        }

        // Re-rendre les commentaires pour mettre à jour l'affichage
        renderComments(postId);

        // Cacher le tooltip après la sélection
        hideCommentReactionTooltip(postId, commentId);

        // Sauvegarder les réactions des commentaires (optionnel, si vous utilisez localStorage)
        // localStorage.setItem('commentReactions', JSON.stringify(allCommentReactions));
    }

    // Fonctionnalité de commentaire (variables et fonctions déjà fournies)
    let allComments = {
        1: [],
        2: [],
        3: [],
        4: [],
        5: []
    };

    function addComment(postId, author, text, avatarUrl = 'https://via.placeholder.com/30') {
        if (!allComments[postId]) {
            allComments[postId] = [];
        }

        const newComment = {
            id: Date.now(),
            author: author,
            text: text,
            avatar: avatarUrl,
            time: "À l'instant"
        };
        allComments[postId].push(newComment);
        renderComments(postId);
    }

    function renderComments(postId) {
        const commentsList = document.querySelector(`[data-post-id="${postId}"] .comments-list`);
        const commentCountSpan = document.querySelector(`[data-post-id="${postId}"] .comment-count`);

        if (!commentsList) return;

        commentsList.innerHTML = '';

        const comments = allComments[postId] || [];
        comments.forEach(comment => {
            const currentReaction = allCommentReactions[postId] && allCommentReactions[postId][comment.id] ?
                allCommentReactions[postId][comment.id] : 'default';

            let initialIconClass = 'fa-regular fa-thumbs-up';
            let initialText = "J'aime";
            let initialBtnColor = '#b0b3b8'; // Couleur par défaut

            if (currentReaction !== 'default' && reactionConfig[currentReaction]) {
                const config = reactionConfig[currentReaction];
                initialIconClass = `fa-solid ${config.icon}`;
                initialText = config.text;
                initialBtnColor = config.color;
            }

            const commentItem = document.createElement('div');
            commentItem.classList.add('comment-item');
            commentItem.setAttribute('data-comment-id', comment.id);

            commentItem.innerHTML = `
                <img src="${comment.avatar}" alt="Avatar" class="comment-avatar">
                <div class="comment-content-and-actions">
                    <div class="comment-content-wrapper">
                        <div class="comment-author">${comment.author}</div>
                        <div class="comment-text">${comment.text}</div>
                    </div>
                    <div class="comment-actions-row">
                        <div class="comment-reaction-options" data-post-id="${postId}" data-comment-id="${comment.id}">
                            <div class="comment-reaction-btn reaction-${currentReaction}"
                                 onclick="setCommentReaction(${postId}, ${comment.id}, 'like', event)"
                                 onmouseenter="handleCommentReactionHover(${postId}, ${comment.id})"
                                 onmouseleave="hideCommentReactionTooltip(${postId}, ${comment.id})"
                                 style="color: ${initialBtnColor};">
                                <i class="${initialIconClass}"></i>
                                <span>${initialText}</span>
                            </div>
                            <div class="reaction-tooltip">
                                <div class="reaction-icon reaction-like" onclick="setCommentReaction(${postId}, ${comment.id}, 'like', event)">
                                    <i class="fa-solid fa-thumbs-up"></i>
                                </div>
                                <div class="reaction-icon reaction-love" onclick="setCommentReaction(${postId}, ${comment.id}, 'love', event)">
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                                <div class="reaction-icon reaction-haha" onclick="setCommentReaction(${postId}, ${comment.id}, 'haha', event)">
                                    <i class="fa-solid fa-face-laugh-squint"></i>
                                </div>
                                <div class="reaction-icon reaction-wow" onclick="setCommentReaction(${postId}, ${comment.id}, 'wow', event)">
                                    <i class="fa-solid fa-face-surprise"></i>
                                </div>
                                <div class="reaction-icon reaction-sad" onclick="setCommentReaction(${postId}, ${comment.id}, 'sad', event)">
                                    <i class="fa-solid fa-face-sad-tear"></i>
                                </div>
                                <div class="reaction-icon reaction-angry" onclick="setCommentReaction(${postId}, ${comment.id}, 'angry', event)">
                                    <i class="fa-solid fa-face-angry"></i>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="comment-action-link">Répondre</a>
                        <span class="comment-time">${comment.time}</span>
                    </div>
                </div>
            `;
            commentsList.appendChild(commentItem);
        });

        commentCountSpan.textContent = `${comments.length} commentaire${comments.length !== 1 ? 's' : ''}`;
    }

    // Bloc unique DOMContentLoaded
    document.addEventListener('DOMContentLoaded', function() {
        // Écouteur d'événements pour les champs de saisie de commentaire
        document.querySelectorAll('.comment-input').forEach(input => {
            input.addEventListener('keypress', function(event) {
                if (event.key === 'Enter' && this.value.trim() !== '') {
                    event.preventDefault();
                    const postId = this.closest('.post').dataset.postId;
                    addComment(postId, 'Votre Nom', this.value.trim(),
                        'https://via.placeholder.com/30');
                    this.value = '';
                }
            });
        });

        // Rendre les commentaires pour toutes les publications initialement
        document.querySelectorAll('.post').forEach(postElement => {
            const postId = postElement.dataset.postId;
            renderComments(postId); // Rendre les commentaires pour chaque publication
        });

        // Chargement des réactions sauvegardées au démarrage (posts et commentaires)
        // if (localStorage.getItem('postReactions')) {
        //     currentReactions = JSON.parse(localStorage.getItem('postReactions'));
        // }
        // if (localStorage.getItem('commentReactions')) {
        //     allCommentReactions = JSON.parse(localStorage.getItem('commentReactions'));
        // }

        // Mettre à jour l'affichage des réactions des posts existants au chargement
        document.querySelectorAll('.post-action.reaction-options').forEach(reactionOptions => {
            const postId = reactionOptions.dataset.postId;
            const reactionType = currentReactions[postId];
            if (reactionType) {
                const reactionBtn = reactionOptions.querySelector('.reaction-btn');
                const config = reactionConfig[reactionType];
                if (config) {
                    reactionOptions.classList.add(config.class);
                    reactionBtn.innerHTML = `
                        <i class="fa-solid ${config.icon}" style="color: ${config.color}"></i>
                        <span style="color: ${config.color}">${config.text}</span>
                    `;
                }
            }
        });

        // Gérer le clic direct sur le bouton "J'aime" d'un commentaire (sans passer par le tooltip)
        document.querySelectorAll('.comment-reaction-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                // Vérifie si le clic provient directement du bouton et non d'une icône du tooltip
                // La propagation est déjà gérée par setCommentReaction appelée par onclick dans le HTML
                // Donc on ne fait rien ici pour le clic direct sur le bouton, car il est géré par l'onclick inline.
                // Ce bloc est principalement utile si vous retiriez les onclick/onmouseenter/onmouseleave inline.
                // Étant donné que ces attributs sont déjà dans votre HTML, ce gestionnaire d'événements peut être redondant
                // ou nécessiter une logique plus complexe pour éviter les doubles déclenchements.
                // Pour l'instant, je le laisse commenté pour éviter une éventuelle confusion ou double gestion.
                /*
                if (event.target === this || this.contains(event.target)) {
                    const commentReactionOptions = this.closest('.comment-reaction-options');
                    const postId = commentReactionOptions.dataset.postId;
                    const commentId = commentReactionOptions.dataset.commentId;
                    const currentReaction = allCommentReactions[postId] && allCommentReactions[postId][commentId] ?
                                            allCommentReactions[postId][commentId] : 'none';

                    if (currentReaction === 'none' || currentReaction !== 'like') {
                        setCommentReaction(postId, commentId, 'like', event);
                    } else {
                        setCommentReaction(postId, commentId, 'none', event);
                    }
                }
                */
            });
        });

        // Gérer le survol du tooltip des commentaires pour le maintenir ouvert
        document.querySelectorAll('.comment-reaction-options .reaction-tooltip').forEach(tooltip => {
            tooltip.addEventListener('mouseenter', () => {
                clearTimeout(commentTooltipTimer);
                tooltip.classList.add('show');
            });
            tooltip.addEventListener('mouseleave', () => {
                tooltip.classList.remove('show');
            });
        });


        // Gestion des autres interactions (déjà présentes dans votre code)
        document.querySelectorAll('.confirm-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const contactName = this.closest('.contact-item').querySelector('.contact-name')
                    .textContent;
                console.log('Contact confirmé:', contactName);
                this.textContent = 'Confirmé';
                this.style.backgroundColor = '#2e89ff';
            });
        });

        document.querySelectorAll('.sponsored-card').forEach(card => {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('.contact-actions')) {
                    console.log('Publicité cliquée:', this.querySelector('.sponsored-title')
                        .textContent);
                    const link = this.querySelector('.sponsored-link').textContent;
                    if (link.startsWith('http')) {
                        window.open(link, '_blank');
                    } else {
                        window.open('https://' + link, '_blank');
                    }
                }
            });
        });

        document.querySelectorAll('.comment-toggle-button').forEach(commentButton => {
            commentButton.addEventListener('click', function() {
                const postElement = this.closest('.post');
                const postCommentsSection = postElement.querySelector('.post-comments');

                if (postCommentsSection) {
                    if (postCommentsSection.style.display === 'none' || postCommentsSection
                        .style.display === '') {
                        postCommentsSection.style.display = 'block';
                        postCommentsSection.querySelector('.comment-input').focus();
                    } else {
                        postCommentsSection.style.display = 'none';
                    }
                    const postId = postElement.dataset.postId;
                    renderComments(postId);
                }
            });
        });
    }); // Fin du bloc unique DOMContentLoaded

    document.addEventListener('click', function(event) {
        // Fermer les tooltips des publications si clic ailleurs
        if (!event.target.closest('.reaction-options')) {
            document.querySelectorAll('.reaction-tooltip').forEach(tooltip => {
                tooltip.classList.remove('show');
            });
        }
        // Fermer les tooltips des commentaires si clic ailleurs
        if (!event.target.closest('.comment-reaction-options')) {
            document.querySelectorAll('.comment-reaction-options .reaction-tooltip').forEach(tooltip => {
                tooltip.classList.remove('show'); // Utilise classList.remove('show') pour masquer
            });
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const storiesContainer = document.getElementById('stories-container');
        const scrollLeftBtn = document.getElementById('stories-scroll-left');
        const scrollRightBtn = document.getElementById('stories-scroll-right');

        if (storiesContainer && scrollLeftBtn && scrollRightBtn) {
            // Fonction de défilement
            const scrollStories = (direction) => {
                const scrollAmount = storiesContainer.clientWidth *
                    0.8; // Défile  de 80% de la largeur visible
                if (direction === 'left') {
                    storiesContainer.scrollBy({
                        left: -scrollAmount,
                        behavior: 'smooth'
                    });
                } else {
                    storiesContainer.scrollBy({
                        left: scrollAmount,
                        behavior: 'smooth'
                    });
                }
            };

            scrollLeftBtn.addEventListener('click', () => scrollStories('left'));
            scrollRightBtn.addEventListener('click', () => scrollStories('right'));

            // Optionnel: masquer/afficher les boutons si plus de contenu à défiler
            const toggleScrollButtons = () => {
                if (storiesContainer.scrollWidth > storiesContainer.clientWidth) {
                    // Il y a du contenu à défiler
                    scrollLeftBtn.style.display = storiesContainer.scrollLeft > 0 ? 'flex' : 'none';
                    scrollRightBtn.style.display = storiesContainer.scrollLeft < (storiesContainer
                        .scrollWidth - storiesContainer.clientWidth) ? 'flex' : 'none';
                } else {
                    // Pas assez de contenu pour défiler, cacher les boutons
                    scrollLeftBtn.style.display = 'none';
                    scrollRightBtn.style.display = 'none';
                }
            };

            // Appeler au chargement et lors du défilement
            toggleScrollButtons();
            storiesContainer.addEventListener('scroll', toggleScrollButtons);
            // Appeler aussi si la taille de la fenêtre change
            window.addEventListener('resize', toggleScrollButtons);
        }
    });
    </script>
</body>

</html>