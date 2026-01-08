<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-leaf text-green-600 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-gray-800">AgriConnect</span>
                    </div>
                    <div class="hidden md:flex ml-10 space-x-8">
                        <a href="/" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Accueil</a>
                        <a href="/marketplace" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Marketplace</a>
                        <a href="/land-rental" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Location</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">
                            <i class="fas fa-bell"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                        </button>
                    </div>
                    <div class="relative group">
                        <button class="flex items-center text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">
                            <i class="fas fa-user-circle text-xl mr-2"></i>
                            Mohamed El Masghati
                            <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-tachometer-alt mr-2"></i>Tableau de bord
                            </a>
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i>Mon profil
                            </a>
                            <a href="/messages" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-envelope mr-2"></i>Messages
                            </a>
                            <hr class="my-1">
                            <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Messages Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden" style="height: calc(100vh - 200px);">
            <div class="flex h-full">
                <!-- Conversations List -->
                <div class="w-1/3 border-r border-gray-200">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold mb-4">Messages</h3>
                        <div class="relative">
                            <input type="text" placeholder="Rechercher une conversation..." 
                                   class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                    
                    <div class="overflow-y-auto" style="height: calc(100% - 120px);">
                        <!-- Conversation 1 - Active -->
                        <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer bg-green-50 border-l-4 border-green-600">
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                    RL
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-1">
                                        <h4 class="font-semibold text-gray-900">Restaurant Le Gourmet</h4>
                                        <span class="text-xs text-gray-500">14:30</span>
                                    </div>
                                    <p class="text-sm text-gray-600 truncate">Bonjour, je suis intéressé par vos tomates bio...</p>
                                </div>
                                <div class="bg-green-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center ml-2">
                                    2
                                </div>
                            </div>
                        </div>

                        <!-- Conversation 2 -->
                        <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer">
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                    AM
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-1">
                                        <h4 class="font-semibold text-gray-900">Al-Mounia Supermarché</h4>
                                        <span class="text-xs text-gray-500">Hier</span>
                                    </div>
                                    <p class="text-sm text-gray-600 truncate">Merci pour la livraison, les produits sont excellents!</p>
                                </div>
                            </div>
                        </div>

                        <!-- Conversation 3 -->
                        <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer">
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                    EF
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-1">
                                        <h4 class="font-semibold text-gray-900">Épicerie Fine</h4>
                                        <span class="text-xs text-gray-500">2 jours</span>
                                    </div>
                                    <p class="text-sm text-gray-600 truncate">Pouvez-vous me donner plus d'informations sur...</p>
                                </div>
                                <div class="bg-blue-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center ml-2">
                                    1
                                </div>
                            </div>
                        </div>

                        <!-- Conversation 4 -->
                        <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer">
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-orange-600 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                    KA
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-1">
                                        <h4 class="font-semibold text-gray-900">Karim Ahmed</h4>
                                        <span class="text-xs text-gray-500">3 jours</span>
                                    </div>
                                    <p class="text-sm text-gray-600 truncate">Le terrain est toujours disponible à la location?</p>
                                </div>
                            </div>
                        </div>

                        <!-- Conversation 5 -->
                        <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer">
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                    HC
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-1">
                                        <h4 class="font-semibold text-gray-900">Hôtel Casablanca</h4>
                                        <span class="text-xs text-gray-500">1 semaine</span>
                                    </div>
                                    <p class="text-sm text-gray-600 truncate">Nous aimerions visiter votre exploitation...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chat Area -->
                <div class="flex-1 flex flex-col">
                    <!-- Chat Header -->
                    <div class="p-4 border-b border-gray-200 bg-white">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                    RL
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Restaurant Le Gourmet</h4>
                                    <p class="text-sm text-green-600">
                                        <i class="fas fa-circle text-xs mr-1"></i>En ligne
                                    </p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="text-gray-600 hover:text-gray-800">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="text-gray-600 hover:text-gray-800">
                                    <i class="fas fa-video"></i>
                                </button>
                                <button class="text-gray-600 hover:text-gray-800">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Messages Area -->
                    <div class="flex-1 overflow-y-auto p-4 bg-gray-50">
                        <div class="space-y-4">
                            <!-- Date Separator -->
                            <div class="text-center">
                                <span class="bg-white px-3 py-1 rounded-full text-xs text-gray-500">Aujourd'hui</span>
                            </div>

                            <!-- Received Message -->
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white text-sm font-semibold mr-3">
                                    RL
                                </div>
                                <div class="max-w-md">
                                    <div class="bg-white rounded-lg p-3 shadow-sm">
                                        <p class="text-gray-800">Bonjour, je suis intéressé par vos tomates bio que j'ai vues sur la marketplace.</p>
                                    </div>
                                    <span class="text-xs text-gray-500 mt-1 ml-1">14:25</span>
                                </div>
                            </div>

                            <!-- Sent Message -->
                            <div class="flex items-start justify-end">
                                <div class="max-w-md">
                                    <div class="bg-green-600 text-white rounded-lg p-3 shadow-sm">
                                        <p>Bonjour! Merci pour votre intérêt. J'ai actuellement 500kg de tomates bio disponibles.</p>
                                    </div>
                                    <span class="text-xs text-gray-500 mt-1 mr-1 text-right block">14:28</span>
                                </div>
                            </div>

                            <!-- Received Message -->
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white text-sm font-semibold mr-3">
                                    RL
                                </div>
                                <div class="max-w-md">
                                    <div class="bg-white rounded-lg p-3 shadow-sm">
                                        <p class="text-gray-800">Excellent! Quel est le prix au kg et pouvez-vous livrer à Casablanca?</p>
                                    </div>
                                    <span class="text-xs text-gray-500 mt-1 ml-1">14:30</span>
                                </div>
                            </div>

                            <!-- Typing Indicator -->
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white text-sm font-semibold mr-3">
                                    RL
                                </div>
                                <div class="bg-white rounded-lg p-3 shadow-sm">
                                    <div class="flex space-x-1">
                                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Message Input -->
                    <div class="p-4 border-t border-gray-200 bg-white">
                        <div class="flex items-end space-x-2">
                            <button class="text-gray-600 hover:text-gray-800 p-2">
                                <i class="fas fa-paperclip"></i>
                            </button>
                            <button class="text-gray-600 hover:text-gray-800 p-2">
                                <i class="fas fa-image"></i>
                            </button>
                            <div class="flex-1">
                                <textarea placeholder="Tapez votre message..." 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent resize-none"
                                          rows="1"></textarea>
                            </div>
                            <button class="text-gray-600 hover:text-gray-800 p-2">
                                <i class="fas fa-smile"></i>
                            </button>
                            <button class="bg-green-600 text-white p-2 rounded-lg hover:bg-green-700 transition">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-resize textarea
        const textarea = document.querySelector('textarea');
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });

        // Simulate typing indicator
        setTimeout(() => {
            const typingIndicator = document.querySelector('.animate-bounce').parentElement.parentElement;
            if (typingIndicator) {
                typingIndicator.remove();
                
                // Add new message
                const messagesContainer = document.querySelector('.space-y-4');
                const newMessage = document.createElement('div');
                newMessage.className = 'flex items-start';
                newMessage.innerHTML = `
                    <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white text-sm font-semibold mr-3">
                        RL
                    </div>
                    <div class="max-w-md">
                        <div class="bg-white rounded-lg p-3 shadow-sm">
                            <p class="text-gray-800">Parfait! Je vais prendre 100kg. Quand pouvez-vous livrer?</p>
                        </div>
                        <span class="text-xs text-gray-500 mt-1 ml-1">14:32</span>
                    </div>
                `;
                messagesContainer.appendChild(newMessage);
            }
        }, 3000);
    </script>
</body>
</html>
