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
                        <a href="/land-rental" class="text-green-600 border-b-2 border-green-600 px-3 py-2 text-sm font-medium">Location</a>
                        <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Services</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher des terrains..." 
                               class="w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>
                    <a href="/login" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Connexion</a>
                    <a href="/register/farmer" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                        S'inscrire
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-600 to-green-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Location de Terrains Agricoles</h1>
                <p class="text-xl text-green-100">
                    Trouvez le terrain parfait pour votre projet agricole
                </p>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="bg-white border-b sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-wrap gap-4 items-center">
                <!-- Surface Filter -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Surface:</label>
                    <input type="number" placeholder="Min (ha)" class="w-20 px-2 py-2 border border-gray-300 rounded-lg">
                    <span>-</span>
                    <input type="number" placeholder="Max (ha)" class="w-20 px-2 py-2 border border-gray-300 rounded-lg">
                </div>

                <!-- Price Filter -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Prix:</label>
                    <input type="number" placeholder="Min DH/mois" class="w-24 px-2 py-2 border border-gray-300 rounded-lg">
                    <span>-</span>
                    <input type="number" placeholder="Max DH/mois" class="w-24 px-2 py-2 border border-gray-300 rounded-lg">
                </div>

                <!-- Type Filter -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Type:</label>
                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <option value="">Tous</option>
                        <option value="terres-arables">Terres arables</option>
                        <option value="vergers">Vergers</option>
                        <option value="vignes">Vignes</option>
                        <option value="serres">Serres</option>
                        <option value="paturages">Pâturages</option>
                    </select>
                </div>

                <!-- Water Access -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Accès eau:</label>
                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <option value="">Indifférent</option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>

                <!-- Electricity Access -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Électricité:</label>
                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <option value="">Indifférent</option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>

                <!-- Sort -->
                <div class="flex items-center space-x-2 ml-auto">
                    <label class="text-sm font-medium text-gray-700">Trier:</label>
                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <option value="pertinence">Pertinence</option>
                        <option value="prix-croissant">Prix croissant</option>
                        <option value="prix-decroissant">Prix décroissant</option>
                        <option value="surface">Surface</option>
                        <option value="distance">Distance</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Land Listings Grid -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Land Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1560573824016-e60e11b3cfa5?w=400&h=250&fit=crop" 
                             alt="Terrain agricole avec champs verdoyants" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-green-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Terres arables
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Terrain Fertile - Marrakech</h3>
                        <p class="text-gray-600 text-sm mb-2">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Marrakech, 15km du centre
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-3">
                            <div>
                                <span class="text-sm text-gray-600">Surface:</span>
                                <span class="font-semibold ml-1">5 hectares</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">Prix:</span>
                                <span class="font-semibold text-green-600 ml-1">2,500 DH/mois</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-tint mr-1"></i>Accès eau
                            </span>
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-bolt mr-1"></i>Électricité
                            </span>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-seedling mr-1"></i>Sol fertile
                            </span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Contacter
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Land Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1574944985070-8f3ebc6b79d2?w=400&h=250&fit=crop" 
                             alt="Verger avec pommiers en fleurs" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-orange-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Vergers
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Verger d'Agrumes - Agadir</h3>
                        <p class="text-gray-600 text-sm mb-2">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Agadir, 8km de la ville
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-3">
                            <div>
                                <span class="text-sm text-gray-600">Surface:</span>
                                <span class="font-semibold ml-1">3 hectares</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">Prix:</span>
                                <span class="font-semibold text-green-600 ml-1">1,800 DH/mois</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-tint mr-1"></i>Accès eau
                            </span>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-tree mr-1"></i>Arbres fruitiers
                            </span>
                            <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-warehouse mr-1"></i>Stockage
                            </span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Contacter
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Land Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1580837119756-563d608dd119?w=400&h=250&fit=crop" 
                             alt="Serres agricoles modernes" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-purple-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Serres
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Serres Modernes - Rabat</h3>
                        <p class="text-gray-600 text-sm mb-2">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Rabat, 12km du centre
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-3">
                            <div>
                                <span class="text-sm text-gray-600">Surface:</span>
                                <span class="font-semibold ml-1">2 hectares</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">Prix:</span>
                                <span class="font-semibold text-green-600 ml-1">3,200 DH/mois</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-tint mr-1"></i>Irrigation auto
                            </span>
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-bolt mr-1"></i>Électricité
                            </span>
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-thermometer-half mr-1"></i>Climatisation
                            </span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Contacter
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Land Card 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1598175048155-1e5e5b8d8d6c?w=400&h=250&fit=crop" 
                             alt="Vignes luxuriantes au coucher du soleil" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-red-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Vignes
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Domaine Viticole - Meknès</h3>
                        <p class="text-gray-600 text-sm mb-2">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Meknès, 20km de la ville
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-3">
                            <div>
                                <span class="text-sm text-gray-600">Surface:</span>
                                <span class="font-semibold ml-1">8 hectares</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">Prix:</span>
                                <span class="font-semibold text-green-600 ml-1">4,500 DH/mois</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-tint mr-1"></i>Accès eau
                            </span>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-wine-glass mr-1"></i>Cépages nobles
                            </span>
                            <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-home mr-1"></i>Cave incluse
                            </span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Contacter
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Land Card 5 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1574391584665-358c2a7538c5?w=400&h=250&fit=crop" 
                             alt="Pâturages" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-yellow-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Pâturages
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Pâturages - Atlas</h3>
                        <p class="text-gray-600 text-sm mb-2">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Région Atlas, 45km d'Azilal
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-3">
                            <div>
                                <span class="text-sm text-gray-600">Surface:</span>
                                <span class="font-semibold ml-1">15 hectares</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">Prix:</span>
                                <span class="font-semibold text-green-600 ml-1">800 DH/mois</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-tint mr-1"></i>Source naturelle
                            </span>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-horse mr-1"></i>Élevage idéal
                            </span>
                            <span class="bg-orange-100 text-orange-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-mountain mr-1"></i>Montagne
                            </span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Contacter
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Land Card 6 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?w=400&h=250&fit=crop" 
                             alt="Terrain mixte" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-green-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Mixte
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Terrain Polyvalent - Fès</h3>
                        <p class="text-gray-600 text-sm mb-2">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Fès, 10km de la ville
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-3">
                            <div>
                                <span class="text-sm text-gray-600">Surface:</span>
                                <span class="font-semibold ml-1">6 hectares</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">Prix:</span>
                                <span class="font-semibold text-green-600 ml-1">2,200 DH/mois</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-tint mr-1"></i>Puits
                            </span>
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-bolt mr-1"></i>Électricité
                            </span>
                            <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-xs">
                                <i class="fas fa-home mr-1"></i>Habitation
                            </span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Contacter
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <nav class="flex space-x-2">
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg">1</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">...</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">8</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </nav>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-green-600 text-white py-12">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">
                Vous avez un terrain à louer ?
            </h2>
            <p class="text-xl text-green-100 mb-8">
                Publiez votre annonce et atteignez des milliers d'agriculteurs
            </p>
            <button class="bg-white text-green-600 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-green-50 transition transform hover:scale-105">
                <i class="fas fa-plus mr-2"></i>
                Publier une annonce
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-leaf text-green-400 text-xl mr-2"></i>
                        <span class="text-lg font-bold">AgriConnect</span>
                    </div>
                    <p class="text-gray-400">
                        La plateforme de digitalisation agricole pour un futur plus durable.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Produits</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="/marketplace" class="hover:text-white">Marketplace</a></li>
                        <li><a href="/land-rental" class="hover:text-white">Location</a></li>
                        <li><a href="#" class="hover:text-white">Services</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Aide</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                        <li><a href="#" class="hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 AgriConnect. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>
