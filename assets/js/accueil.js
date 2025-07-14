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
            `[data-post-id="${postId}"] .post-action.reaction-options`
        ); // Le conteneur reaction-options du post

        const config = reactionConfig[reactionType];

        // Supprimer toutes les classes de réaction précédentes du conteneur
        Object.values(reactionConfig).forEach(r => {
            if (reactionOptionsContainer) { // S'assurer que le conteneur existe
                reactionOptionsContainer.classList.remove(r.class);
            }
        });

        if (reactionOptionsContainer && config) {
            reactionOptionsContainer.classList.add(config
                .class); // Ajouter la nouvelle classe au conteneur principal
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
        const reactionTooltip = commentReactionOptions ? commentReactionOptions.querySelector(
                '.reaction-tooltip') :
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
        const reactionTooltip = commentReactionOptions ? commentReactionOptions.querySelector(
                '.reaction-tooltip') :
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
            const currentReaction = allCommentReactions[postId] && allCommentReactions[postId][comment
                    .id
                ] ?
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
                const contactName = this.closest('.contact-item').querySelector(
                        '.contact-name')
                    .textContent;
                console.log('Contact confirmé:', contactName);
                this.textContent = 'Confirmé';
                this.style.backgroundColor = '#2e89ff';
            });
        });

        document.querySelectorAll('.sponsored-card').forEach(card => {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('.contact-actions')) {
                    console.log('Publicité cliquée:', this.querySelector(
                            '.sponsored-title')
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
                    if (postCommentsSection.style.display === 'none' ||
                        postCommentsSection
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
            document.querySelectorAll('.comment-reaction-options .reaction-tooltip').forEach(
                tooltip => {
                    tooltip.classList.remove(
                        'show'); // Utilise classList.remove('show') pour masquer
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
    document.addEventListener('DOMContentLoaded', function() {
        const reelsContainer = document.getElementById('reels-container');
        const scrollLeftBtnReels = document.getElementById('reels-scroll-left');
        const scrollRightBtnReels = document.getElementById('reels-scroll-right');

        if (reelsContainer && scrollLeftBtnReels && scrollRightBtnReels) {
            const scrollAmountReels = 220; // Largeur d'une carte + gap (200px + 20px)

            const scrollReels = (direction) => {
                if (direction === 'left') {
                    reelsContainer.scrollBy({
                        left: -scrollAmountReels,
                        behavior: 'smooth'
                    });
                } else {
                    reelsContainer.scrollBy({
                        left: scrollAmountReels,
                        behavior: 'smooth'
                    });
                }
            };

            scrollLeftBtnReels.addEventListener('click', () => scrollReels('left'));
            scrollRightBtnReels.addEventListener('click', () => scrollReels('right'));

            // Optionnel: masquer/afficher les boutons si plus de contenu à défiler
            const toggleReelsScrollButtons = () => {
                if (reelsContainer.scrollWidth > reelsContainer.clientWidth) {
                    scrollLeftBtnReels.style.display = reelsContainer.scrollLeft > 0 ? 'flex' :
                        'none';
                    scrollRightBtnReels.style.display = reelsContainer.scrollLeft < (reelsContainer
                        .scrollWidth - reelsContainer.clientWidth) ? 'flex' : 'none';
                } else {
                    scrollLeftBtnReels.style.display = 'none';
                    scrollRightBtnReels.style.display = 'none';
                }
            };

            toggleReelsScrollButtons();
            reelsContainer.addEventListener('scroll', toggleReelsScrollButtons);
            window.addEventListener('resize', toggleReelsScrollButtons);
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        // Éléments de la modale
        const openPostModalBtn = document.getElementById('openPostModal');
        const postModal = document.getElementById('postModal');
        const closePostModalBtn = document.getElementById('closePostModal');
        const publishButton = document.getElementById('publishButton');
        const mediaUploadInput = document.getElementById('mediaUpload');
        const mediaPreview = document.getElementById('mediaPreview');
        const postContentTextarea = document.getElementById('postContent');

        // Fonction pour ouvrir la modale
        if (openPostModalBtn) {
            openPostModalBtn.addEventListener('click', function() {
                postModal.style.display = 'flex'; // Utilise flex pour le centrage CSS
                document.body.style.overflow = 'hidden'; // Empêche le scroll du body
            });
        }

        // Fonction pour fermer la modale
        if (closePostModalBtn) {
            closePostModalBtn.addEventListener('click', function() {
                postModal.style.display = 'none';
                document.body.style.overflow = ''; // Rétablit le scroll du body
                // Réinitialiser le contenu de la modale
                postContentTextarea.value = '';
                mediaPreview.innerHTML = ''; // Efface l'aperçu média
                mediaUploadInput.value = ''; // Efface le fichier sélectionné
            });
        }

        // Fermer la modale si on clique en dehors du contenu
        if (postModal) {
            window.addEventListener('click', function(event) {
                if (event.target == postModal) {
                    postModal.style.display = 'none';
                    document.body.style.overflow = '';
                    // Réinitialiser le contenu de la modale
                    postContentTextarea.value = '';
                    mediaPreview.innerHTML = '';
                    mediaUploadInput.value = '';
                }
            });
        }

        // Gérer l'aperçu de l'image/vidéo sélectionnée
        if (mediaUploadInput) {
            mediaUploadInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        mediaPreview.innerHTML = ''; // Nettoie l'aperçu précédent
                        if (file.type.startsWith('image/')) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            mediaPreview.appendChild(img);
                        } else if (file.type.startsWith('video/')) {
                            const video = document.createElement('video');
                            video.src = e.target.result;
                            video.controls =
                                true; // Afficher les contrôles pour la vidéo d'aperçu
                            video.muted = true; // Muet par défaut
                            video.autoplay = true; // Lecture automatique
                            mediaPreview.appendChild(video);
                        }
                    };
                    reader.readAsDataURL(file);
                } else {
                    mediaPreview.innerHTML = ''; // Efface l'aperçu si aucun fichier
                }
            });
        }

        // Gérer le bouton Publier (pour l'instant, juste une alerte)
        if (publishButton) {
            publishButton.addEventListener('click', function() {
                const postText = postContentTextarea.value.trim();
                const mediaFile = mediaUploadInput.files[0];

                if (postText === '' && !mediaFile) {
                    alert(
                        "Veuillez écrire quelque chose ou ajouter une photo/vidéo avant de publier."
                    );
                    return;
                }

                // Ici, vous enverriez les données (postText, mediaFile) à votre serveur via AJAX/Fetch API
                // Pour l'exemple, nous allons juste simuler la publication
                alert("Publication créée : " + postText + (mediaFile ? " (avec média : " +
                    mediaFile
                    .name + ")" : ""));

                // Fermer la modale après publication simulée
                closePostModalBtn.click(); // Simule un clic sur le bouton de fermeture
            });
        }
    });