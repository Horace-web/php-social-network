// Variables globales pour gérer les réactions des publications
let currentReactions = {};
let tooltipTimer = null;
let commentHoverTimeout = null;
let allCommentReactions = {};

// Configuration des réactions
const reactionConfig = {
    like: { icon: 'fa-thumbs-up', text: "J'aime", color: '#1877f2', class: 'liked' },
    love: { icon: 'fa-heart', text: "J'adore", color: '#f3425f', class: 'loved' },
    haha: { icon: 'fa-face-laugh-squint', text: "Haha", color: '#f7b928', class: 'haha' },
    wow: { icon: 'fa-face-surprise', text: "Wow", color: '#f7b928', class: 'wow' },
    sad: { icon: 'fa-face-sad-tear', text: "Triste", color: '#f7b928', class: 'sad' },
    angry: { icon: 'fa-face-angry', text: "Grrr", color: '#e9710f', class: 'angry' }
};

// Fonctions principales
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

// Gestion des réactions pour les publications
function handleReactionClick(postId, event) {
    event.stopPropagation();
    const current = currentReactions[postId];
    !current ? setReaction(postId, 'like', event) : removeReaction(postId);
}

function handleReactionHover(postId) {
    clearTimeout(tooltipTimer);
    const tooltip = document.querySelector(`[data-post-id="${postId}"] .reaction-tooltip`);
    document.querySelectorAll('.reaction-tooltip').forEach(t => t !== tooltip && t.classList.remove('show'));
    tooltip && (tooltipTimer = setTimeout(() => tooltip.classList.add('show'), 500));
}

function hideReactionTooltip(postId) {
    clearTimeout(tooltipTimer);
    setTimeout(() => {
        const tooltip = document.querySelector(`[data-post-id="${postId}"] .reaction-tooltip`);
        tooltip && !tooltip.matches(':hover') && tooltip.classList.remove('show');
    }, 300);
}

function setReaction(postId, reactionType, event) {
    event.stopPropagation();
    const reactionBtn = document.querySelector(`[data-post-id="${postId}"] .reaction-btn`);
    const reactionOptionsContainer = document.querySelector(`[data-post-id="${postId}"] .post-action.reaction-options`);
    const config = reactionConfig[reactionType];

    Object.values(reactionConfig).forEach(r => reactionOptionsContainer?.classList.remove(r.class));
    reactionOptionsContainer?.classList.add(config.class);

    if (reactionBtn && config) {
        reactionBtn.innerHTML = `<i class="fa-solid ${config.icon}" style="color: ${config.color}"></i><span style="color: ${config.color}">${config.text}</span>`;
    }

    currentReactions[postId] = reactionType;
    document.querySelector(`[data-post-id="${postId}"] .reaction-tooltip`)?.classList.remove('show');
}

function removeReaction(postId) {
    const reactionBtn = document.querySelector(`[data-post-id="${postId}"] .reaction-btn`);
    const reactionOptionsContainer = document.querySelector(`[data-post-id="${postId}"] .post-action.reaction-options`);

    Object.values(reactionConfig).forEach(r => reactionOptionsContainer?.classList.remove(r.class));
    reactionBtn && (reactionBtn.innerHTML = `<i class="fa-solid fa-thumbs-up"></i><span>J'aime</span>`);
    delete currentReactions[postId];
}

// Gestion des commentaires
let allComments = { 1: [], 2: [], 3: [], 4: [], 5: [] };

function addComment(postId, author, text, avatarUrl = 'https://via.placeholder.com/30') {
    if (!allComments[postId]) allComments[postId] = [];
    allComments[postId].push({ id: Date.now(), author, text, avatar: avatarUrl, time: "À l'instant" });
    renderComments(postId);
}

function renderComments(postId) {
    const commentsList = document.querySelector(`[data-post-id="${postId}"] .comments-list`);
    const commentCountSpan = document.querySelector(`[data-post-id="${postId}"] .comment-count`);
    if (!commentsList) return;

    commentsList.innerHTML = '';
    const comments = allComments[postId] || [];
    
    comments.forEach(comment => {
        const currentReaction = allCommentReactions[postId]?.[comment.id] || 'default';
        let initialIconClass = 'fa-regular fa-thumbs-up';
        let initialText = "J'aime";
        let initialBtnColor = '#b0b3b8';

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
                            <div class="reaction-icon reaction-like" onclick="setCommentReaction(${postId}, ${comment.id}, 'like', event)"><i class="fa-solid fa-thumbs-up"></i></div>
                            <div class="reaction-icon reaction-love" onclick="setCommentReaction(${postId}, ${comment.id}, 'love', event)"><i class="fa-solid fa-heart"></i></div>
                            <div class="reaction-icon reaction-haha" onclick="setCommentReaction(${postId}, ${comment.id}, 'haha', event)"><i class="fa-solid fa-face-laugh-squint"></i></div>
                            <div class="reaction-icon reaction-wow" onclick="setCommentReaction(${postId}, ${comment.id}, 'wow', event)"><i class="fa-solid fa-face-surprise"></i></div>
                            <div class="reaction-icon reaction-sad" onclick="setCommentReaction(${postId}, ${comment.id}, 'sad', event)"><i class="fa-solid fa-face-sad-tear"></i></div>
                            <div class="reaction-icon reaction-angry" onclick="setCommentReaction(${postId}, ${comment.id}, 'angry', event)"><i class="fa-solid fa-face-angry"></i></div>
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

// Gestion de la modale de publication
function initPostModal() {
    const postModal = document.getElementById('postModal');
    const openPostModalBtn = document.getElementById('openPostModal');
    const closePostModalBtn = document.getElementById('closePostModal');
    const publishButton = document.getElementById('publishButton');
    const mediaUploadInput = document.getElementById('mediaUpload');
    const mediaPreview = document.getElementById('mediaPreview');
    const postContentTextarea = document.getElementById('postContent');

    function openModal() {
        postModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        postModal.style.display = 'none';
        document.body.style.overflow = '';
        postContentTextarea.value = '';
        mediaPreview.innerHTML = '';
        mediaUploadInput.value = '';
    }

    openPostModalBtn?.addEventListener('click', openModal);
    closePostModalBtn?.addEventListener('click', closeModal);

    window.addEventListener('click', function(event) {
        if (event.target == postModal) closeModal();
    });

    mediaUploadInput?.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                mediaPreview.innerHTML = '';
                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    mediaPreview.appendChild(img);
                } else if (file.type.startsWith('video/')) {
                    const video = document.createElement('video');
                    video.src = e.target.result;
                    video.controls = true;
                    video.muted = true;
                    video.autoplay = true;
                    mediaPreview.appendChild(video);
                }
            };
            reader.readAsDataURL(file);
        } else {
            mediaPreview.innerHTML = '';
        }
    });

    publishButton?.addEventListener('click', function() {
        const postText = postContentTextarea.value.trim();
        const mediaFile = mediaUploadInput.files[0];

        if (!postText && !mediaFile) {
            alert("Veuillez écrire quelque chose ou ajouter une photo/vidéo avant de publier.");
            return;
        }

        alert("Publication créée : " + postText + (mediaFile ? " (avec média : " + mediaFile.name + ")" : ""));
        closeModal();
    });
}

// Gestion des stories et reels
function initMediaScrollers() {
    function setupScroller(containerId, leftBtnId, rightBtnId) {
        const container = document.getElementById(containerId);
        const scrollLeftBtn = document.getElementById(leftBtnId);
        const scrollRightBtn = document.getElementById(rightBtnId);

        if (!container || !scrollLeftBtn || !scrollRightBtn) return;

        const scroll = (direction) => {
            const scrollAmount = container.clientWidth * (containerId === 'stories-container' ? 0.8 : 1);
            container.scrollBy({ left: direction === 'left' ? -scrollAmount : scrollAmount, behavior: 'smooth' });
        };

        scrollLeftBtn.addEventListener('click', () => scroll('left'));
        scrollRightBtn.addEventListener('click', () => scroll('right'));

        const toggleButtons = () => {
            if (container.scrollWidth > container.clientWidth) {
                scrollLeftBtn.style.display = container.scrollLeft > 0 ? 'flex' : 'none';
                scrollRightBtn.style.display = container.scrollLeft < (container.scrollWidth - container.clientWidth) ? 'flex' : 'none';
            } else {
                scrollLeftBtn.style.display = 'none';
                scrollRightBtn.style.display = 'none';
            }
        };

        toggleButtons();
        container.addEventListener('scroll', toggleButtons);
        window.addEventListener('resize', toggleButtons);
    }

    setupScroller('stories-container', 'stories-scroll-left', 'stories-scroll-right');
    setupScroller('reels-container', 'reels-scroll-left', 'reels-scroll-right');
}

function initVideoPlayer() {
    const videoPlayer = document.createElement('div');
    videoPlayer.id = 'video-player';
    videoPlayer.innerHTML = `
        <div class="video-container">
            <video controls autoplay playsinline class="fullscreen-video"></video>
            <div class="video-controls">
                <button class="video-control-btn pause-btn" title="Pause"><i class="fas fa-pause"></i></button>
                <button class="video-control-btn mute-btn" title="Activer le son"><i class="fas fa-volume-up"></i></button>
                <button class="video-control-btn close-video-btn" title="Fermer">&times;</button>
            </div>
        </div>
    `;
    document.body.appendChild(videoPlayer);

    const style = document.createElement('style');
    style.textContent = `
        #video-player {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.95);
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
        }
        #video-player .video-container {
            position: relative;
            width: 100%;
            max-width: 500px;
        }
        #video-player .fullscreen-video {
            width: 100%;
            height: auto;
            max-height: 90vh;
            background-color: #000;
        }
        #video-player .video-controls {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 10px;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
        }
        #video-player .video-control-btn {
            background: rgba(255,255,255,0.2);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        #video-player .video-control-btn:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.1);
        }
        #video-player .video-control-btn i {
            font-size: 16px;
        }
        #video-player .close-video-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
        }
    `;
    document.head.appendChild(style);

    function playVideo(videoElement) {
        const videoSrc = videoElement.getAttribute('src');
        const videoPlayerElement = videoPlayer.querySelector('.fullscreen-video');
        const pauseBtn = videoPlayer.querySelector('.pause-btn');
        const muteBtn = videoPlayer.querySelector('.mute-btn');
        
        // Arrêter toutes les autres vidéos
        document.querySelectorAll('video').forEach(v => {
            document.querySelectorAll('video').forEach(v => {
        if (v !== videoElement) {
            v.pause();
            v.currentTime = 0;
        }
    });
    
    // Démarrer la vidéo cliquée
    videoElement.muted = false;
    videoElement.play().catch(e => {
        console.error("Erreur de lecture:", e);
        videoElement.muted = true;
        videoElement.play();
    });

        // Configurer la vidéo
        videoPlayerElement.setAttribute('src', videoSrc);
        videoPlayerElement.muted = false;
        videoPlayer.style.display = 'flex';
        
        // Mettre à jour l'état des boutons
        pauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
        muteBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
        
        // Gestion de la lecture
        const playPromise = videoPlayerElement.play();
        
        if (playPromise !== undefined) {
            playPromise.catch(error => {
                console.error("Erreur de lecture:", error);
                // Fallback si la lecture automatique est bloquée
                videoPlayerElement.muted = true;
                videoPlayerElement.play()
                    .then(_ => {
                        muteBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
                    })
                    .catch(e => console.error("Échec de lecture même en mute:", e));
            });
        }
    }

    // Gestion des clics sur les stories et reels
    document.querySelectorAll('.story-card, .reel-card').forEach(card => {
        card.addEventListener('click', function() {
            const videoElement = this.querySelector('video');
            playVideo(videoElement);
        });
    });

    // Contrôles vidéo
    const videoPlayerElement = videoPlayer.querySelector('.fullscreen-video');
    const pauseBtn = videoPlayer.querySelector('.pause-btn');
    const muteBtn = videoPlayer.querySelector('.mute-btn');
    const closeBtn = videoPlayer.querySelector('.close-video-btn');

    // Bouton pause/play
    pauseBtn.addEventListener('click', function() {
        if (videoPlayerElement.paused) {
            videoPlayerElement.play();
            this.innerHTML = '<i class="fas fa-pause"></i>';
        } else {
            videoPlayerElement.pause();
            this.innerHTML = '<i class="fas fa-play"></i>';
        }
    });

    // Bouton mute/unmute
    muteBtn.addEventListener('click', function() {
        videoPlayerElement.muted = !videoPlayerElement.muted;
        this.innerHTML = videoPlayerElement.muted 
            ? '<i class="fas fa-volume-mute"></i>' 
            : '<i class="fas fa-volume-up"></i>';
    });

    // Fermer le player vidéo
    closeBtn.addEventListener('click', function() {
        videoPlayerElement.pause();
        videoPlayerElement.removeAttribute('src');
        videoPlayer.style.display = 'none';
    });

    // Fermer en cliquant à l'extérieur
    videoPlayer.addEventListener('click', function(e) {
        if (e.target === this) {
            this.querySelector('.close-video-btn').click();
        }
    });
    // Ajoutez ceci dans initVideoPlayer()
const progressBar = document.createElement('div');
progressBar.className = 'video-progress';
progressBar.innerHTML = '<div class="video-progress-filled"></div>';
videoPlayer.querySelector('.video-container').appendChild(progressBar);

// Gestion de la progression
videoPlayerElement.addEventListener('timeupdate', function() {
    const percent = (videoPlayerElement.currentTime / videoPlayerElement.duration) * 100;
    progressBar.querySelector('.video-progress-filled').style.width = percent + '%';
});

// Cliquer sur la barre pour avancer
progressBar.addEventListener('click', function(e) {
    const rect = this.getBoundingClientRect();
    const pos = (e.pageX - rect.left) / rect.width;
    videoPlayerElement.currentTime = pos * videoPlayerElement.duration;
});
}
// Gestion de la messagerie
function initMessenger() {
    const messengerIcon = document.getElementById('messenger-icon');
    const messengerDropdown = document.getElementById('messenger');
    
    if (!messengerIcon || !messengerDropdown) return;

    messengerIcon.addEventListener('click', function(e) {
        e.stopPropagation();
        messengerDropdown.classList.toggle('active');
    });
    
    document.addEventListener('click', function(e) {
        if (!messengerDropdown.contains(e.target)) {
            messengerDropdown.classList.remove('active');
        }
    });
    
    messengerDropdown.addEventListener('click', function(e) {
        e.stopPropagation();
    });
}

// Initialisation principale
document.addEventListener('DOMContentLoaded', function() {
    // Commentaires
    document.querySelectorAll('.comment-input').forEach(input => {
        input.addEventListener('keypress', function(event) {
            if (event.key === 'Enter' && this.value.trim() !== '') {
                event.preventDefault();
                const postId = this.closest('.post').dataset.postId;
                addComment(postId, 'Votre Nom', this.value.trim(), 'https://via.placeholder.com/30');
                this.value = '';
            }
        });
    });

    document.querySelectorAll('.post').forEach(postElement => {
        const postId = postElement.dataset.postId;
        renderComments(postId);
    });

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

    document.querySelectorAll('.comment-toggle-button').forEach(commentButton => {
        commentButton.addEventListener('click', function() {
            const postElement = this.closest('.post');
            const postCommentsSection = postElement.querySelector('.post-comments');
            if (postCommentsSection) {
                if (postCommentsSection.style.display === 'none' || postCommentsSection.style.display === '') {
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

    // Initialiser les autres fonctionnalités
    initPostModal();
    initMediaScrollers();
    initVideoPlayer();
    initMessenger();

    // Fermer les tooltips au clic externe
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.reaction-options')) {
            document.querySelectorAll('.reaction-tooltip').forEach(tooltip => {
                tooltip.classList.remove('show');
            });
        }
        if (!event.target.closest('.comment-reaction-options')) {
            document.querySelectorAll('.comment-reaction-options .reaction-tooltip').forEach(tooltip => {
                tooltip.classList.remove('show');
            });
        }
    });
});