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
        <h1 class="text-3xl font-bold text-gray-900">Tableau de bord - Agriculteur</h1>
        <p class="text-gray-600 mt-2">Gérez vos produits et votre exploitation</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">
                    <i class="fas fa-seedling text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Produits actifs</p>
                    <p class="text-2xl font-bold text-gray-900">12</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full">
                    <i class="fas fa-shopping-cart text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Commandes</p>
                    <p class="text-2xl font-bold text-gray-900">28</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-full">
                    <i class="fas fa-star text-yellow-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Note moyenne</p>
                    <p class="text-2xl font-bold text-gray-900">4.5</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-full">
                    <i class="fas fa-euro-sign text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Revenus</p>
                    <p class="text-2xl font-bold text-gray-900">€2,450</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Products -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Mes produits récents</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <img src="https://images.unsplash.com/photo-1593175086247-632fb85e3e6f?w=50&h=50&fit=crop" 
                                 alt="Carottes" class="w-12 h-12 rounded-lg object-cover">
                            <div class="ml-3">
                                <p class="font-medium text-gray-900">Carottes Fraîches</p>
                                <p class="text-sm text-gray-600">15€/kg • 50kg disponible</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Actif</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=50&h=50&fit=crop" 
                                 alt="Tomates" class="w-12 h-12 rounded-lg object-cover">
                            <div class="ml-3">
                                <p class="font-medium text-gray-900">Tomates Bio</p>
                                <p class="text-sm text-gray-600">12€/kg • 30kg disponible</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Actif</span>
                    </div>
                </div>
                
                <button class="mt-4 w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-plus mr-2"></i>Ajouter un produit
                </button>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Commandes récentes</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">Commande #1234</p>
                            <p class="text-sm text-gray-600">Carottes x 10kg • Ahmed M.</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">En préparation</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">Commande #1235</p>
                            <p class="text-sm text-gray-600">Tomates x 5kg • Fatima B.</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">Expédiée</span>
                    </div>
                </div>
                
                <button class="mt-4 w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-list mr-2"></i>Voir toutes les commandes
                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
