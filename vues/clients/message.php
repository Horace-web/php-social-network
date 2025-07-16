<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

    </style>
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

    <script src="/php-social-network/assets/js/message.js"></script>
</body>

</html>