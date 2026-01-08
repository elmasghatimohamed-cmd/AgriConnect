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
                        <a href="/services" class="text-green-600 border-b-2 border-green-600 px-3 py-2 text-sm font-medium">Services</a>
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
        <h1 class="text-3xl font-bold text-gray-900">Services Agricoles</h1>
        <p class="text-gray-600 mt-2">Outils et services pour optimiser votre exploitation agricole</p>
    </div>

    <!-- Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Logistics Service -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6">
                <i class="fas fa-truck text-white text-4xl mb-4"></i>
                <h3 class="text-xl font-bold text-white">Services Logistiques</h3>
            </div>
            <div class="p-6">
                <p class="text-gray-600 mb-4">Transport, stockage et distribution de vos produits agricoles</p>
                <ul class="space-y-2 mb-4">
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Transport réfrigéré
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Entrepôts de stockage
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Livraison dernière minute
                    </li>
                </ul>
                <a href="/services/logistics" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition inline-block text-center">
                    <i class="fas fa-arrow-right mr-2"></i>Explorer
                </a>
            </div>
        </div>

        <!-- Sensors Service -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="bg-gradient-to-r from-green-500 to-green-600 p-6">
                <i class="fas fa-microchip text-white text-4xl mb-4"></i>
                <h3 class="text-xl font-bold text-white">Capteurs & IoT</h3>
            </div>
            <div class="p-6">
                <p class="text-gray-600 mb-4">Surveillance en temps réel de vos cultures et équipements</p>
                <ul class="space-y-2 mb-4">
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Capteurs d'humidité
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Capteurs de température
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Analyse NPK du sol
                    </li>
                </ul>
                <a href="/services/sensors" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition inline-block text-center">
                    <i class="fas fa-arrow-right mr-2"></i>Explorer
                </a>
            </div>
        </div>

        <!-- Weather Service -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="bg-gradient-to-r from-yellow-500 to-orange-600 p-6">
                <i class="fas fa-cloud-sun text-white text-4xl mb-4"></i>
                <h3 class="text-xl font-bold text-white">Météo & Saisons</h3>
            </div>
            <div class="p-6">
                <p class="text-gray-600 mb-4">Prévisions météo et conseils saisonniers optimisés</p>
                <ul class="space-y-2 mb-4">
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Prévisions 7 jours
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Alertes gel/grêle
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Calendrier de plantation
                    </li>
                </ul>
                <a href="/services/weather" class="w-full bg-yellow-600 text-white py-2 px-4 rounded-lg hover:bg-yellow-700 transition inline-block text-center">
                    <i class="fas fa-arrow-right mr-2"></i>Explorer
                </a>
            </div>
        </div>

        <!-- Statistics Service -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-6">
                <i class="fas fa-chart-line text-white text-4xl mb-4"></i>
                <h3 class="text-xl font-bold text-white">Statistiques</h3>
            </div>
            <div class="p-6">
                <p class="text-gray-600 mb-4">Analyse des données pour des décisions éclairées</p>
                <ul class="space-y-2 mb-4">
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Rendements par culture
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Tendances du marché
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Optimisation ressources
                    </li>
                </ul>
                <a href="/services/statistics" class="w-full bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition inline-block text-center">
                    <i class="fas fa-arrow-right mr-2"></i>Explorer
                </a>
            </div>
        </div>

        <!-- Technical Products -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="bg-gradient-to-r from-red-500 to-red-600 p-6">
                <i class="fas fa-tools text-white text-4xl mb-4"></i>
                <h3 class="text-xl font-bold text-white">Produits Techniques</h3>
            </div>
            <div class="p-6">
                <p class="text-gray-600 mb-4">Équipements et intrants agricoles de qualité</p>
                <ul class="space-y-2 mb-4">
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Matériels agricoles
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Engrais et amendements
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Protection des cultures
                    </li>
                </ul>
                <button class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition">
                    <i class="fas fa-arrow-right mr-2"></i>Bientôt disponible
                </button>
            </div>
        </div>

        <!-- Decision Support -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 p-6">
                <i class="fas fa-brain text-white text-4xl mb-4"></i>
                <h3 class="text-xl font-bold text-white">Aide à la Décision</h3>
            </div>
            <div class="p-6">
                <p class="text-gray-600 mb-4">IA et algorithmes pour optimiser vos choix</p>
                <ul class="space-y-2 mb-4">
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Prédictions de rendement
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Optimisation irrigation
                    </li>
                    <li class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Planification culturale
                    </li>
                </ul>
                <button class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition">
                    <i class="fas fa-arrow-right mr-2"></i>Bientôt disponible
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Vos statistiques en temps réel</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-600">24°C</div>
                <div class="text-sm text-gray-600">Température actuelle</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-green-600">65%</div>
                <div class="text-sm text-gray-600">Humidité du sol</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-yellow-600">12 km/h</div>
                <div class="text-sm text-gray-600">Vitesse du vent</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-purple-600">85%</div>
                <div class="text-sm text-gray-600">Efficacité globale</div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
