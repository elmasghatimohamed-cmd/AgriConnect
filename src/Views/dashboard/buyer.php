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
                        <span class="text-xl font-bold text-gray-800">AXOM</span>
                    </div>
                    <div class="hidden md:flex ml-10 space-x-8">
                        <a href="/" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Accueil</a>
                        <a href="/marketplace" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Marketplace</a>
                        <a href="/land-rental" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Location</a>
                        <a href="/services" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Services</a>
                        <a href="/messages" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Messages</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <div class="relative">
                        <button class="p-2 text-gray-600 hover:text-green-600 relative">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-0 right-0 h-3 w-3 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg opacity-0 invisible hover:opacity-100 hover:visible transition-all duration-200 z-50">
                            <div class="p-4 border-b border-gray-200">
                                <h3 class="font-semibold text-gray-900">Notifications</h3>
                            </div>
                            <div class="max-h-96 overflow-y-auto">
                                <!-- Notification items -->
                                <div class="p-4 hover:bg-gray-50 border-b border-gray-100">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-check text-green-600 text-xs"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <p class="text-sm text-gray-900">Votre commande #1234 a été livrée</p>
                                            <p class="text-xs text-gray-500 mt-1">Il y a 2 heures</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-4 hover:bg-gray-50 border-b border-gray-100">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-truck text-blue-600 text-xs"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <p class="text-sm text-gray-900">Votre commande #1235 est en cours de livraison</p>
                                            <p class="text-xs text-gray-500 mt-1">Il y a 5 heures</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-4 hover:bg-gray-50 border-b border-gray-100">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-star text-yellow-600 text-xs"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <p class="text-sm text-gray-900">Nouveaux produits recommandés pour vous</p>
                                            <p class="text-xs text-gray-500 mt-1">Hier</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-4 hover:bg-gray-50">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-percentage text-purple-600 text-xs"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <p class="text-sm text-gray-900">Promotion: -20% sur les produits bio</p>
                                            <p class="text-xs text-gray-500 mt-1">Il y a 2 jours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-t border-gray-200">
                                <button class="w-full text-center text-sm text-green-600 hover:text-green-700 font-medium">
                                    Voir toutes les notifications
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative group">
                        <button class="flex items-center text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">
                            <i class="fas fa-user-circle text-xl mr-2"></i>
                            <?= $user['name'] ?? 'Utilisateur' ?>
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

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Tableau de bord - Acheteur</h1>
        <p class="text-gray-600 mt-2">Découvrez et achetez des produits agricoles locaux</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">
                    <i class="fas fa-shopping-bag text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Commandes</p>
                    <p class="text-2xl font-bold text-gray-900">15</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full">
                    <i class="fas fa-heart text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Favoris</p>
                    <p class="text-2xl font-bold text-gray-900">23</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-full">
                    <i class="fas fa-truck text-yellow-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">En livraison</p>
                    <p class="text-2xl font-bold text-gray-900">3</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-full">
                    <i class="fas fa-euro-sign text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Total dépensé</p>
                    <p class="text-2xl font-bold text-gray-900">€1,850</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Orders -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Commandes récentes</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <img src="https://images.unsplash.com/photo-1593175086247-632fb85e3e6f?w=50&h=50&fit=crop" 
                                 alt="Carottes" class="w-12 h-12 rounded-lg object-cover">
                            <div class="ml-3">
                                <p class="font-medium text-gray-900">Commande #1234</p>
                                <p class="text-sm text-gray-600">Carottes x 10kg • 150€</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Livré</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=50&h=50&fit=crop" 
                                 alt="Tomates" class="w-12 h-12 rounded-lg object-cover">
                            <div class="ml-3">
                                <p class="font-medium text-gray-900">Commande #1235</p>
                                <p class="text-sm text-gray-600">Tomates x 5kg • 60€</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">En livraison</span>
                    </div>
                </div>
                
                <button class="mt-4 w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-list mr-2"></i>Voir toutes les commandes
                </button>
            </div>
        </div>

        <!-- Recommended Products -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Produits recommandés</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <img src="https://images.unsplash.com/photo-1546470427-e92b2c9c09d6?w=50&h=50&fit=crop" 
                                 alt="Pommes" class="w-12 h-12 rounded-lg object-cover">
                            <div class="ml-3">
                                <p class="font-medium text-gray-900">Pommes Bio</p>
                                <p class="text-sm text-gray-600">8€/kg • Ferme du Sud</p>
                            </div>
                        </div>
                        <button class="px-3 py-1 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Ajouter
                        </button>
                    </div>
                    
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <img src="https://images.unsplash.com/photo-1550258987-190a2d41a8ba?w=50&h=50&fit=crop" 
                                 alt="Avocats" class="w-12 h-12 rounded-lg object-cover">
                            <div class="ml-3">
                                <p class="font-medium text-gray-900">Avocats</p>
                                <p class="text-sm text-gray-600">18€/kg • Jardin Tropical</p>
                            </div>
                        </div>
                        <button class="px-3 py-1 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Ajouter
                        </button>
                    </div>
                </div>
                
                <button class="mt-4 w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-store mr-2"></i>Explorer la marketplace
                </button>
            </div>
        </div>
    </div>

    <!-- Buyer Statistics Section -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Vos Statistiques d'Achat</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Purchase History -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Historique d'Achat</h3>
                </div>
                <div class="p-6">
                    <canvas id="purchaseChart" height="150"></canvas>
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Total dépensé</span>
                            <span class="font-semibold">€1,850</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Moyenne/mois</span>
                            <span class="font-semibold">€308</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Économie réalisée</span>
                            <span class="font-semibold text-green-600">€125</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Favorite Categories -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Catégories Préférées</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Légumes</span>
                                <span class="text-sm text-gray-600">45%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-600 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Fruits</span>
                                <span class="text-sm text-gray-600">30%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 30%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Produits laitiers</span>
                                <span class="text-sm text-gray-600">15%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-600 h-2 rounded-full" style="width: 15%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Céréales</span>
                                <span class="text-sm text-gray-600">10%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-purple-600 h-2 rounded-full" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Market Insights -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Informations Marché</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="p-3 bg-green-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-arrow-down text-green-600 mr-2"></i>
                                <span class="text-sm font-medium">Prix légumes -8%</span>
                            </div>
                            <p class="text-xs text-gray-600 mt-1">Bon moment pour acheter</p>
                        </div>
                        <div class="p-3 bg-red-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-arrow-up text-red-600 mr-2"></i>
                                <span class="text-sm font-medium">Prix fruits +12%</span>
                            </div>
                            <p class="text-xs text-gray-600 mt-1">Attendre si possible</p>
                        </div>
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                                <span class="text-sm font-medium">Nouveaux produits bio</span>
                            </div>
                            <p class="text-xs text-gray-600 mt-1">5 agriculteurs ajoutés</p>
                        </div>
                    </div>
                    
                    <button class="mt-4 w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition text-sm">
                        <i class="fas fa-chart-line mr-2"></i>Voir analyses complètes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<script>
// Purchase History Chart
const purchaseCtx = document.getElementById('purchaseChart').getContext('2d');
new Chart(purchaseCtx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
        datasets: [{
            label: 'Dépenses (€)',
            data: [280, 320, 290, 350, 310, 300],
            borderColor: 'rgb(34, 197, 94)',
            backgroundColor: 'rgba(34, 197, 94, 0.1)',
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
