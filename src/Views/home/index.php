<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/styles.css">
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
                        <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Services</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative cart-btn">
                        <button class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium relative">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center" style="display: none;">0</span>
                        </button>
                    </div>
                    <a href="/login" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Connexion</a>
                    <div class="flex space-x-2">
                        <a href="/register/farmer" class="bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-200 transition">
                            Agriculteur
                        </a>
                        <a href="/register/buyer" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                            Acheteur
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-green-600 to-green-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Digitalisons l'Agriculture Marocaine
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-green-100">
                    Connectez directement les agriculteurs aux acheteurs professionnels<br>
                    Sans intermédiaires, avec plus de transparence et de rentabilité
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/register/farmer" class="bg-white text-green-700 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-green-50 transition transform hover:scale-105">
                        <i class="fas fa-seedling mr-2"></i>
                        Je veux vendre
                    </a>
                    <a href="/register/buyer" class="bg-blue-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition transform hover:scale-105">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Je veux acheter
                    </a>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-12 text-gray-50" preserveAspectRatio="none" viewBox="0 0 1440 54">
                <path fill="currentColor" d="M0,22L60,18.7C120,16,240,11,360,12C480,13,600,21,720,25.3C840,29,960,29,1080,25.3C1200,21,1320,13,1380,9.3L1440,5.3L1440,54L1380,54C1320,54,1200,54,1080,54C960,54,840,54,720,54C600,54,480,54,360,54C240,54,120,54,60,54L0,54Z"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Pourquoi choisir AgriConnect ?
                </h2>
                <p class="text-xl text-gray-600">
                    La plateforme qui révolutionne la chaîne d'approvisionnement agricole
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6 rounded-xl hover:shadow-lg transition fade-in">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Sans Intermédiaires</h3>
                    <p class="text-gray-600">
                        Connectez-vous directement avec les acheteurs et augmentez vos revenus jusqu'à 30%
                    </p>
                </div>
                
                <div class="text-center p-6 rounded-xl hover:shadow-lg transition fade-in" style="animation-delay: 0.1s">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Transactions Sécurisées</h3>
                    <p class="text-gray-600">
                        Paiements protégés et traçabilité complète de la ferme à l'assiette
                    </p>
                </div>
                
                <div class="text-center p-6 rounded-xl hover:shadow-lg transition fade-in" style="animation-delay: 0.2s">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Analytics Prédictifs</h3>
                    <p class="text-gray-600">
                        Optimisez vos productions avec l'intelligence artificielle et les données satellite
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How it Works -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Comment ça marche ?
                </h2>
                <p class="text-xl text-gray-600">
                    En 3 étapes simples pour une expérience optimale
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="relative fade-in">
                    <div class="bg-white p-8 rounded-xl shadow-lg">
                        <div class="bg-green-600 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold mb-4">
                            1
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Inscription</h3>
                        <p class="text-gray-600">
                            Créez votre compte en quelques minutes et complétez votre profil
                        </p>
                    </div>
                </div>
                
                <div class="relative fade-in" style="animation-delay: 0.1s">
                    <div class="bg-white p-8 rounded-xl shadow-lg">
                        <div class="bg-green-600 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold mb-4">
                            2
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Publication</h3>
                        <p class="text-gray-600">
                            Vendez vos produits ou louez vos terrains en quelques clics
                        </p>
                    </div>
                </div>
                
                <div class="relative fade-in" style="animation-delay: 0.2s">
                    <div class="bg-white p-8 rounded-xl shadow-lg">
                        <div class="bg-green-600 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold mb-4">
                            3
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Transaction</h3>
                        <p class="text-gray-600">
                            Communiquez, négociez et finalisez les ventes en toute sécurité
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-green-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2 stat-number" data-target="500">0</div>
                    <div class="text-green-100">Agriculteurs</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2 stat-number" data-target="200">0</div>
                    <div class="text-green-100">Acheteurs</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2 stat-number" data-target="1000">0</div>
                    <div class="text-green-100">Transactions</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-4 stat-number" data-target="30">0</div>
                    <div class="text-green-100">Augmentation revenus</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Prêt à révolutionner votre activité agricole ?
            </h2>
            <p class="text-xl text-gray-600 mb-8">
                Rejoignez la communauté AgriConnect dès aujourd'hui
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/register/farmer" class="bg-green-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-green-700 transition transform hover:scale-105">
                    Commencer gratuitement
                </a>
                <a href="#" class="border-2 border-green-600 text-green-600 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-green-50 transition">
                    En savoir plus
                </a>
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

    <!-- Cart Sidebar -->
    <div class="cart-sidebar">
        <div class="cart-header">
            <h3 class="text-lg font-semibold">Mon Panier</h3>
            <button class="close-cart text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="cart-content">
            <div class="text-center text-gray-500 py-8">
                <i class="fas fa-shopping-cart text-4xl mb-4"></i>
                <p>Votre panier est vide</p>
            </div>
        </div>
        <div class="cart-footer">
            <div class="flex justify-between mb-4">
                <span class="font-semibold">Total:</span>
                <span class="font-bold text-green-600">0 DH</span>
            </div>
            <button class="btn btn-primary w-full">
                Commander
            </button>
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>
