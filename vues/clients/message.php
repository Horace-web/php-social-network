<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php-social-network/assets/css/style.css">
    <title>Messenger Clone</title>

</head>
<body>
    <!-- Bouton Messenger -->
    <button id="open-messenger" class="messenger-launcher">
        <i>💬</i> Messenger
    </button>

    <!-- Fenêtre Messenger -->
    <div class="messenger-dropdown" id="messenger">
        <!-- En-tête -->
        <div class="messenger-header">
            <span>Messenger</span>
            <div class="header-actions">
                <button title="Nouvelle conversation"><i>✚</i></button>
                <button title="Paramètres"><i>⚙️</i></button>
            </div>
        </div>

        <!-- Barre de recherche -->
        <div class="messenger-search">
            <div class="search-container">
                <i>🔍</i>
                <input type="text" id="search-input" placeholder="Rechercher sur Messenger...">
            </div>
        </div>

        <!-- Filtres -->
        <div class="messenger-filters">
            <button class="filter active">Tout</button>
            <button class="filter">Non lu</button>
            <button class="filter">Groupes</button>
            <button class="filter">En ligne</button>
        </div>

        <!-- Liste des discussions -->
        <div class="discussion-list" id="discussion-list">
            <div class="discussion-list-title">Messages</div>
            <!-- Remplie dynamiquement -->
        </div>

        <!-- Zone des messages -->
        <div class="message-area" id="message-area">
            <div class="message-header">
                <button class="back-button" id="back-button">←</button>
                <div class="discussion-avatar online" id="current-chat-avatar">A</div>
                <div class="discussion-info">
                    <div class="discussion-name" id="current-chat-name">Alice</div>
                    <div class="discussion-last-message" id="current-chat-status">En ligne</div>
                </div>
            </div>
            
            <div class="message-content" id="message-content">
                <!-- Messages chargés dynamiquement -->
            </div>
            
            <div class="input-area">
                <input type="text" id="message-input" placeholder="Tapez votre message...">
                <button id="send-button">Envoyer</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Éléments DOM
            const messenger = document.getElementById('messenger');
            const openButton = document.getElementById('open-messenger');
            const discussionList = document.getElementById('discussion-list');
            const messageArea = document.getElementById('message-area');
            const messageContent = document.getElementById('message-content');
            const messageInput = document.getElementById('message-input');
            const sendButton = document.getElementById('send-button');
            const backButton = document.getElementById('back-button');
            const currentChatName = document.getElementById('current-chat-name');
            const currentChatAvatar = document.getElementById('current-chat-avatar');
            const currentChatStatus = document.getElementById('current-chat-status');
            const searchInput = document.getElementById('search-input');
            
            // Données simulées
            const discussions = [
                { 
                    id: 1, 
                    user_id: 2, 
                    name: "Alice", 
                    last_message: "Salut ça va ?", 
                    time: "10:30", 
                    unread: 2,
                    isOnline: true,
                    avatar: "A"
                },
                { 
                    id: 2, 
                    user_id: 3, 
                    name: "Bob", 
                    last_message: "Dispo demain ?", 
                    time: "Hier", 
                    unread: 0,
                    isOnline: false,
                    avatar: "B"
                },
                { 
                    id: 3, 
                    user_id: 4, 
                    name: "Charlie", 
                    last_message: "J'ai reçu ton document", 
                    time: "Lundi", 
                    unread: 1,
                    isOnline: true,
                    avatar: "C"
                },
                { 
                    id: 4, 
                    user_id: 5, 
                    name: "Diana", 
                    last_message: "On se voit à 18h", 
                    time: "Dimanche", 
                    unread: 0,
                    isOnline: true,
                    avatar: "D"
                }
            ];
            
            const messages = {
                2: [
                    { id: 1, sender_id: 2, content: "Salut !", time: "10:25", sent: false },
                    { id: 2, sender_id: 1, content: "Bonjour Alice !", time: "10:26", sent: true },
                    { id: 3, sender_id: 2, content: "Comment vas-tu aujourd'hui ?", time: "10:27", sent: false },
                    { id: 4, sender_id: 1, content: "Très bien, merci ! Et toi ?", time: "10:28", sent: true },
                    { id: 5, sender_id: 2, content: "Super aussi, merci de demander.", time: "10:30", sent: false }
                ],
                3: [
                    { id: 1, sender_id: 1, content: "Salut Bob !", time: "09:15", sent: true },
                    { id: 2, sender_id: 3, content: "Hey ! Dispo demain pour une réunion ?", time: "09:16", sent: false },
                    { id: 3, sender_id: 1, content: "Oui, à quelle heure ?", time: "09:18", sent: true }
                ],
                4: [
                    { id: 1, sender_id: 4, content: "Bonjour ! J'ai reçu ton document", time: "14:45", sent: false },
                    { id: 2, sender_id: 1, content: "Parfait, merci !", time: "14:50", sent: true }
                ],
                5: [
                    { id: 1, sender_id: 1, content: "Salut Diana !", time: "16:20", sent: true },
                    { id: 2, sender_id: 5, content: "Coucou ! On se voit à 18h ?", time: "16:22", sent: false },
                    { id: 3, sender_id: 1, content: "Oui, c'est noté !", time: "16:23", sent: true }
                ]
            };
            
            // Variables d'état
            let currentChatId = null;
            let currentUserId = 1; // ID de l'utilisateur actuel
            
            // Toggle affichage du messenger
            openButton.addEventListener('click', () => {
                messenger.classList.toggle('active');
                if (messenger.classList.contains('active')) {
                    loadDiscussions();
                }
            });
            
            // Charger les discussions
            function loadDiscussions() {
                discussionList.innerHTML = '<div class="discussion-list-title">Messages</div>';
                
                if (discussions.length === 0) {
                    discussionList.innerHTML += `
                        <div class="empty-state">
                            <i>💬</i>
                            <h3>Aucune discussion</h3>
                            <p>Commencez une nouvelle conversation</p>
                        </div>
                    `;
                    return;
                }
                
                discussions.forEach(discussion => {
                    const discussionEl = document.createElement('div');
                    discussionEl.className = 'discussion';
                    discussionEl.dataset.id = discussion.id;
                    
                    discussionEl.innerHTML = `
                        <div class="discussion-avatar ${discussion.isOnline ? 'online' : ''}">${discussion.avatar}</div>
                        <div class="discussion-info">
                            <div class="discussion-name">${discussion.name}</div>
                            <div class="discussion-last-message">${discussion.last_message}</div>
                        </div>
                        <div class="discussion-meta">
                            <div class="discussion-time">${discussion.time}</div>
                            ${discussion.unread > 0 ? `<div class="unread-count">${discussion.unread}</div>` : ''}
                        </div>
                    `;
                    
                    discussionEl.addEventListener('click', () => {
                        openChat(discussion);
                    });
                    
                    discussionList.appendChild(discussionEl);
                });
            }
            
            // Ouvrir une conversation
            function openChat(discussion) {
                currentChatId = discussion.user_id;
                
                // Mettre à jour l'en-tête de la conversation
                currentChatName.textContent = discussion.name;
                currentChatAvatar.textContent = discussion.avatar;
                currentChatStatus.textContent = discussion.isOnline ? "En ligne" : "Hors ligne";
                
                // Activer la zone de message
                messageArea.classList.add('active');
                
                // Charger les messages
                loadMessages();
                
                // Marquer la discussion comme active
                document.querySelectorAll('.discussion').forEach(el => {
                    el.classList.remove('active');
                });
                document.querySelector(`.discussion[data-id="${discussion.id}"]`).classList.add('active');
            }
            
            // Charger les messages d'une conversation
            function loadMessages() {
                messageContent.innerHTML = '';
                
                if (messages[currentChatId] && messages[currentChatId].length > 0) {
                    messages[currentChatId].forEach(msg => {
                        addMessageToChat(msg);
                    });
                    
                    // Faire défiler vers le bas
                    messageContent.scrollTop = messageContent.scrollHeight;
                } else {
                    messageContent.innerHTML = `
                        <div class="empty-state">
                            <i>💬</i>
                            <h3>Aucun message</h3>
                            <p>Envoyez votre premier message</p>
                        </div>
                    `;
                }
            }
            
            // Ajouter un message à la conversation
            function addMessageToChat(message) {
                const messageEl = document.createElement('div');
                messageEl.className = `message ${message.sender_id === currentUserId ? 'sent' : 'received'}`;
                
                messageEl.innerHTML = `
                    ${message.content}
                    <div class="message-time">${message.time}</div>
                `;
                
                messageContent.appendChild(messageEl);
                
                // Faire défiler vers le bas
                messageContent.scrollTop = messageContent.scrollHeight;
            }
            
            // Envoyer un message
            function sendMessage() {
                const content = messageInput.value.trim();
                if (!content || !currentChatId) return;
                
                // Créer un nouveau message
                const newMessage = {
                    id: Date.now(),
                    sender_id: currentUserId,
                    content: content,
                    time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
                    sent: true
                };
                
                // Ajouter le message à l'interface
                addMessageToChat(newMessage);
                
                // Simuler une réponse après un délai
                setTimeout(() => {
                    const responses = [
                        "Merci pour ton message !",
                        "Je te réponds dans quelques instants.",
                        "C'est intéressant, je vais y réfléchir.",
                        "Je suis occupé pour le moment, je te réponds plus tard."
                    ];
                    
                    const responseMessage = {
                        id: Date.now(),
                        sender_id: currentChatId,
                        content: responses[Math.floor(Math.random() * responses.length)],
                        time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
                        sent: false
                    };
                    
                    addMessageToChat(responseMessage);
                }, 2000);
                
                // Réinitialiser le champ de saisie
                messageInput.value = '';
            }
            
            // Gestion des événements
            sendButton.addEventListener('click', sendMessage);
            
            messageInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });
            
            backButton.addEventListener('click', () => {
                messageArea.classList.remove('active');
                currentChatId = null;
                document.querySelectorAll('.discussion').forEach(el => {
                    el.classList.remove('active');
                });
            });
            
            // Filtre de recherche
            searchInput.addEventListener('input', () => {
                const searchTerm = searchInput.value.toLowerCase();
                
                discussions.forEach(discussion => {
                    const el = document.querySelector(`.discussion[data-id="${discussion.id}"]`);
                    if (!el) return;
                    
                    if (discussion.name.toLowerCase().includes(searchTerm) || 
                        discussion.last_message.toLowerCase().includes(searchTerm)) {
                        el.style.display = 'flex';
                    } else {
                        el.style.display = 'none';
                    }
                });
            });
            
            // Initialisation
            loadDiscussions();
        });
    </script>
</body>
</html>