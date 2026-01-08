<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <h1 class="text-3xl font-bold text-gray-900">Météo & Saisons Agricoles</h1>
        <p class="text-gray-600 mt-2">Prévisions météo et conseils saisonniers optimisés pour vos cultures</p>
    </div>

    <!-- Current Weather -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2">
            <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg shadow-lg p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold mb-2">Météo Actuelle</h2>
                        <div class="flex items-center">
                            <i class="fas fa-sun text-6xl mr-4"></i>
                            <div>
                                <div class="text-5xl font-bold">24°C</div>
                                <div class="text-blue-100">Ensoleillé</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="mb-2">
                            <i class="fas fa-tint text-2xl mb-1"></i>
                            <span class="text-xl">65%</span>
                            <div class="text-sm text-blue-100">Humidité</div>
                        </div>
                        <div>
                            <i class="fas fa-wind text-2xl mb-1"></i>
                            <span class="text-xl">12 km/h</span>
                            <div class="text-sm text-blue-100">Vent NE</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Weather Details -->
        <div class="space-y-4">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-gray-600">Pression</span>
                    <span class="text-xl font-semibold">1013 hPa</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-gray-600">Indice UV</span>
                    <span class="text-xl font-semibold">6</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-yellow-500 h-2 rounded-full" style="width: 60%"></div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-gray-600">Précipitations</span>
                    <span class="text-xl font-semibold">0 mm</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: 0%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3-Day Forecast -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Prévisions 3 jours</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Today -->
                <div class="text-center">
                    <div class="font-semibold text-gray-900 mb-3">Aujourd'hui</div>
                    <i class="fas fa-sun text-6xl text-yellow-500 mb-3"></i>
                    <div class="text-2xl font-bold text-gray-900 mb-2">18° - 26°</div>
                    <div class="text-sm text-gray-600 mb-3">Ensoleillé</div>
                    <div class="flex items-center justify-center text-sm text-blue-600">
                        <i class="fas fa-tint mr-2"></i>
                        <span>0% de pluie</span>
                    </div>
                </div>

                <!-- Tomorrow -->
                <div class="text-center">
                    <div class="font-semibold text-gray-900 mb-3">Demain</div>
                    <i class="fas fa-cloud text-6xl text-gray-500 mb-3"></i>
                    <div class="text-2xl font-bold text-gray-900 mb-2">16° - 24°</div>
                    <div class="text-sm text-gray-600 mb-3">Nuageux</div>
                    <div class="flex items-center justify-center text-sm text-blue-600">
                        <i class="fas fa-tint mr-2"></i>
                        <span>20% de pluie</span>
                    </div>
                </div>

                <!-- Day After -->
                <div class="text-center">
                    <div class="font-semibold text-gray-900 mb-3">Après-demain</div>
                    <i class="fas fa-cloud-rain text-6xl text-blue-500 mb-3"></i>
                    <div class="text-2xl font-bold text-gray-900 mb-2">15° - 22°</div>
                    <div class="text-sm text-gray-600 mb-3">Pluvieux</div>
                    <div class="flex items-center justify-center text-sm text-blue-600">
                        <i class="fas fa-tint mr-2"></i>
                        <span>80% de pluie</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seasonal Information -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Current Season -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Informations Saisonnières</h3>
            </div>
            <div class="p-6">
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-600">Saison actuelle</span>
                        <span class="text-xl font-semibold text-blue-600">Hiver</span>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-600">Risque de gel</span>
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">Modéré</span>
                    </div>
                </div>

                <div>
                    <div class="text-gray-600 mb-3">Période de plantation optimale</div>
                    <div class="text-lg font-semibold text-green-600">Février - Mars</div>
                </div>
            </div>
        </div>

        <!-- Recommended Crops -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Cultures Recommandées</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center p-3 bg-green-50 rounded-lg">
                        <i class="fas fa-seedling text-green-600 text-xl mr-3"></i>
                        <span class="font-medium">Blé</span>
                    </div>
                    <div class="flex items-center p-3 bg-green-50 rounded-lg">
                        <i class="fas fa-seedling text-green-600 text-xl mr-3"></i>
                        <span class="font-medium">Orge</span>
                    </div>
                    <div class="flex items-center p-3 bg-green-50 rounded-lg">
                        <i class="fas fa-seedling text-green-600 text-xl mr-3"></i>
                        <span class="font-medium">Fèves</span>
                    </div>
                    <div class="flex items-center p-3 bg-green-50 rounded-lg">
                        <i class="fas fa-seedling text-green-600 text-xl mr-3"></i>
                        <span class="font-medium">Petits pois</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agricultural Calendar -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Calendrier Agricole 2024</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Winter -->
                <div>
                    <div class="flex items-center mb-3">
                        <i class="fas fa-snowflake text-blue-500 text-xl mr-2"></i>
                        <h4 class="font-semibold">Hiver</h4>
                    </div>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Préparation des sols</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Plantation d'hiver</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Protection contre le gel</span>
                        </li>
                    </ul>
                </div>

                <!-- Spring -->
                <div>
                    <div class="flex items-center mb-3">
                        <i class="fas fa-seedling text-green-500 text-xl mr-2"></i>
                        <h4 class="font-semibold">Printemps</h4>
                    </div>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Plantation principale</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Fertilisation</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Irrigation de démarrage</span>
                        </li>
                    </ul>
                </div>

                <!-- Summer -->
                <div>
                    <div class="flex items-center mb-3">
                        <i class="fas fa-sun text-yellow-500 text-xl mr-2"></i>
                        <h4 class="font-semibold">Été</h4>
                    </div>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Récolte précoce</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Irrigation régulière</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Lutte contre les ravageurs</span>
                        </li>
                    </ul>
                </div>

                <!-- Autumn -->
                <div>
                    <div class="flex items-center mb-3">
                        <i class="fas fa-leaf text-orange-500 text-xl mr-2"></i>
                        <h4 class="font-semibold">Automne</h4>
                    </div>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Récolte principale</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Préparation hivernale</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Plantation d'automne</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Auto-refresh weather data every 5 minutes
setInterval(() => {
    fetch('/api/weather')
        .then(response => response.json())
        .then(data => {
            console.log('Weather data updated:', data);
            // Update weather display here
        })
        .catch(error => console.error('Error fetching weather data:', error));
}, 300000);
</script>

</body>
</html>
