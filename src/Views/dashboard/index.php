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

    <!-- Dashboard Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Tableau de bord</h1>
            <p class="text-gray-600 mt-2">Bienvenue, Mohamed! Voici un aperçu de votre activité.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <i class="fas fa-chart-line text-green-600 text-xl"></i>
                    </div>
                    <span class="text-green-600 text-sm font-semibold">+12%</span>
                </div>
                <div class="text-2xl font-bold text-gray-900">45,230 DH</div>
                <div class="text-gray-600 text-sm">Chiffre d'affaires ce mois</div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="fas fa-shopping-cart text-blue-600 text-xl"></i>
                    </div>
                    <span class="text-blue-600 text-sm font-semibold">+8%</span>
                </div>
                <div class="text-2xl font-bold text-gray-900">127</div>
                <div class="text-gray-600 text-sm">Commandes ce mois</div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <i class="fas fa-star text-purple-600 text-xl"></i>
                    </div>
                    <span class="text-purple-600 text-sm font-semibold">4.8</span>
                </div>
                <div class="text-2xl font-bold text-gray-900">4.8/5</div>
                <div class="text-gray-600 text-sm">Note moyenne</div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-orange-100 p-3 rounded-lg">
                        <i class="fas fa-users text-orange-600 text-xl"></i>
                    </div>
                    <span class="text-orange-600 text-sm font-semibold">+15%</span>
                </div>
                <div class="text-2xl font-bold text-gray-900">89</div>
                <div class="text-gray-600 text-sm">Nouveaux clients</div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Évolution des ventes</h3>
                <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-chart-area text-4xl mb-2"></i>
                        <p>Graphique des ventes (6 derniers mois)</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Produits les plus vendus</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded text-sm font-semibold mr-3">1</span>
                            <span>Tomates Bio</span>
                        </div>
                        <span class="text-gray-600">450 kg</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded text-sm font-semibold mr-3">2</span>
                            <span>Oranges Juteuses</span>
                        </div>
                        <span class="text-gray-600">380 kg</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded text-sm font-semibold mr-3">3</span>
                            <span>Lait Frais</span>
                        </div>
                        <span class="text-gray-600">320 L</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-sm font-semibold mr-3">4</span>
                            <span>Œufs Fermiers</span>
                        </div>
                        <span class="text-gray-600">280 pièces</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-sm font-semibold mr-3">5</span>
                            <span>Miel de Thym</span>
                        </div>
                        <span class="text-gray-600">45 kg</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold">Commandes récentes</h3>
                <a href="/orders" class="text-green-600 hover:text-green-700 text-sm font-medium">Voir tout</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Commande</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Client</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Produits</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Montant</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Statut</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <div class="font-medium">#CMD-2024-001</div>
                                <div class="text-sm text-gray-600">08/01/2024</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-medium">Restaurant Le Gourmet</div>
                                <div class="text-sm text-gray-600">Casablanca</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="text-sm">Tomates Bio (25kg)</div>
                                <div class="text-sm text-gray-600">+ 2 autres produits</div>
                            </td>
                            <td class="py-3 px-4 font-medium">850 DH</td>
                            <td class="py-3 px-4">
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-semibold">En préparation</span>
                            </td>
                            <td class="py-3 px-4">
                                <button class="text-green-600 hover:text-green-700 mr-2">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-comment"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <div class="font-medium">#CMD-2024-002</div>
                                <div class="text-sm text-gray-600">07/01/2024</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-medium">Supermarché Al-Mounia</div>
                                <div class="text-sm text-gray-600">Rabat</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="text-sm">Oranges (50kg)</div>
                                <div class="text-sm text-gray-600">+ 1 autre produit</div>
                            </td>
                            <td class="py-3 px-4 font-medium">450 DH</td>
                            <td class="py-3 px-4">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">Livrée</span>
                            </td>
                            <td class="py-3 px-4">
                                <button class="text-gray-400 hover:text-gray-600 mr-2">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-comment"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <div class="font-medium">#CMD-2024-003</div>
                                <div class="text-sm text-gray-600">06/01/2024</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-medium">Épicerie Fine</div>
                                <div class="text-sm text-gray-600">Marrakech</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="text-sm">Miel de Thym (10kg)</div>
                                <div class="text-sm text-gray-600">Huile d'olive (5L)</div>
                            </td>
                            <td class="py-3 px-4 font-medium">1,850 DH</td>
                            <td class="py-3 px-4">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-semibold">Confirmée</span>
                            </td>
                            <td class="py-3 px-4">
                                <button class="text-green-600 hover:text-green-700 mr-2">
                                    <i class="fas fa-truck"></i>
                                </button>
                                <button class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-comment"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-plus text-green-600 text-xl"></i>
                </div>
                <h3 class="font-semibold mb-2">Ajouter un produit</h3>
                <p class="text-gray-600 text-sm mb-4">Mettre en vente un nouveau produit</p>
                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    Ajouter
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-landmark text-blue-600 text-xl"></i>
                </div>
                <h3 class="font-semibold mb-2">Louer un terrain</h3>
                <p class="text-gray-600 text-sm mb-4">Publier une annonce de location</p>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Publier
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-bar text-purple-600 text-xl"></i>
                </div>
                <h3 class="font-semibold mb-2">Voir les statistiques</h3>
                <p class="text-gray-600 text-sm mb-4">Analyser vos performances</p>
                <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                    Analyser
                </button>
            </div>
        </div>
    </div>
</body>
</html>
