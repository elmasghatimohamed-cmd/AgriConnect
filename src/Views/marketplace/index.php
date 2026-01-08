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
                        <a href="/marketplace" class="text-green-600 border-b-2 border-green-600 px-3 py-2 text-sm font-medium">Marketplace</a>
                        <a href="/land-rental" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Location</a>
                        <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Services</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher des produits..." 
                               class="w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>
                    <a href="/login" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Connexion</a>
                    <a href="/register/buyer" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">
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
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Marketplace Agricole</h1>
                <p class="text-xl text-green-100">
                    Découvrez les meilleurs produits agricoles directement des producteurs locaux
                </p>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="bg-white border-b sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-wrap gap-4 items-center">
                <!-- Category Filter -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Catégorie:</label>
                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <option value="">Toutes</option>
                        <option value="fruits">Fruits</option>
                        <option value="legumes">Légumes</option>
                        <option value="cereales">Céréales</option>
                        <option value="laitiers">Produits laitiers</option>
                        <option value="viandes">Viandes</option>
                        <option value="oeufs">Œufs</option>
                        <option value="miel">Miel</option>
                    </select>
                </div>

                <!-- Location Filter -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Localisation:</label>
                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <option value="">Toutes les régions</option>
                        <option value="marrakech">Marrakech</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="fes">Fès</option>
                        <option value="agadir">Agadir</option>
                    </select>
                </div>

                <!-- Price Filter -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Prix:</label>
                    <input type="number" placeholder="Min" class="w-20 px-2 py-2 border border-gray-300 rounded-lg">
                    <span>-</span>
                    <input type="number" placeholder="Max" class="w-20 px-2 py-2 border border-gray-300 rounded-lg">
                </div>

                <!-- Certification Filter -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Certification:</label>
                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <option value="">Toutes</option>
                        <option value="bio">Bio</option>
                        <option value="globalgap">GlobalG.A.P</option>
                        <option value="fairtrade">Commerce Équitable</option>
                    </select>
                </div>

                <!-- Sort -->
                <div class="flex items-center space-x-2 ml-auto">
                    <label class="text-sm font-medium text-gray-700">Trier:</label>
                    <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <option value="pertinence">Pertinence</option>
                        <option value="prix-croissant">Prix croissant</option>
                        <option value="prix-decroissant">Prix décroissant</option>
                        <option value="distance">Distance</option>
                        <option value="note">Note du vendeur</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1546630997-3e1b4645382c?w=400&h=300&fit=crop" 
                             alt="Tomates bio" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-green-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Bio
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Tomates Bio Premium</h3>
                        <p class="text-gray-600 text-sm mb-2">Marrakech • Agriculture Biologique</p>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-sm text-gray-600 ml-2">(4.5)</span>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <span class="text-2xl font-bold text-green-600">25</span>
                                <span class="text-gray-600">/kg</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-box mr-1"></i>
                                500kg disponible
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Ajouter au panier
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-comment"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1515003197210-e0cd71810b5f?w=400&h=300&fit=crop" 
                             alt="Oranges" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-orange-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Premium
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Oranges Juteuses</h3>
                        <p class="text-gray-600 text-sm mb-2">Agadir • Agrumes de qualité</p>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-sm text-gray-600 ml-2">(5.0)</span>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <span class="text-2xl font-bold text-green-600">8</span>
                                <span class="text-gray-600">/kg</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-box mr-1"></i>
                                2 tonnes disponible
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Ajouter au panier
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-comment"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1581375380449-1d88a025c14e?w=400&h=300&fit=crop" 
                             alt="Lait frais" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-blue-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Laitier
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Lait Frais Pasteurisé</h3>
                        <p class="text-gray-600 text-sm mb-2">Rabat • Production locale</p>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-sm text-gray-600 ml-2">(4.0)</span>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <span class="text-2xl font-bold text-green-600">12</span>
                                <span class="text-gray-600">/L</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-box mr-1"></i>
                                500L disponible
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Ajouter au panier
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-comment"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1598300042247-d088f8263f66?w=400&h=300&fit=crop" 
                             alt="Œufs fermiers" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-yellow-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Fermier
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Œufs Fermiers Frais</h3>
                        <p class="text-gray-600 text-sm mb-2">Fès • Élevage en plein air</p>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-sm text-gray-600 ml-2">(4.7)</span>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <span class="text-2xl font-bold text-green-600">2</span>
                                <span class="text-gray-600">/pièce</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-box mr-1"></i>
                                2000 pièces disponible
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Ajouter au panier
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-comment"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 5 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1577234286642-fc512a5f8f11?w=400&h=300&fit=crop" 
                             alt="Miel d'abeille" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-amber-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Artisanal
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Miel de Thym Bio</h3>
                        <p class="text-gray-600 text-sm mb-2">Atlas • Miel artisanal</p>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-sm text-gray-600 ml-2">(5.0)</span>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <span class="text-2xl font-bold text-green-600">150</span>
                                <span class="text-gray-600">/kg</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-box mr-1"></i>
                                50kg disponible
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Ajouter au panier
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-comment"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 6 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1593175086247-632fb85e3e6f?w=400&h=300&fit=crop" 
                             alt="Carottes" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-green-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Bio
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Carottes Fraîches</h3>
                        <p class="text-gray-600 text-sm mb-2">Marrakech • Maraîchage bio</p>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-sm text-gray-600 ml-2">(4.0)</span>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <span class="text-2xl font-bold text-green-600">15</span>
                                <span class="text-gray-600">/kg</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-box mr-1"></i>
                                300kg disponible
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Ajouter au panier
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-comment"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 7 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1447196147524-d1d0b6d5e7f6?w=400&h=300&fit=crop" 
                             alt="Olive oil" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-green-800 text-white px-2 py-1 rounded text-xs font-semibold">
                            AOP
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Huile d'Olive AOP</h3>
                        <p class="text-gray-600 text-sm mb-2">Meknès • Première pression</p>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-sm text-gray-600 ml-2">(4.8)</span>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <span class="text-2xl font-bold text-green-600">85</span>
                                <span class="text-gray-600">/L</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-box mr-1"></i>
                                200L disponible
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Ajouter au panier
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-comment"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 8 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400&h=300&fit=crop" 
                             alt="Poulet fermier" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-red-600 text-white px-2 py-1 rounded text-xs font-semibold">
                            Fermier
                        </div>
                        <div class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-lg">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Poulet Fermier</h3>
                        <p class="text-gray-600 text-sm mb-2">Casablanca • Élevage traditionnel</p>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-sm text-gray-600 ml-2">(4.2)</span>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <span class="text-2xl font-bold text-green-600">45</span>
                                <span class="text-gray-600">/kg</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-box mr-1"></i>
                                150kg disponible
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-green-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                Ajouter au panier
                            </button>
                            <button class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-comment"></i>
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
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">12</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </nav>
            </div>
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
