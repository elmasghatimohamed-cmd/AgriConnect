<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="/css/styles.css"> -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            dark: '#2D5016',
                            DEFAULT: '#4A7C30',
                            light: '#6B9E4A'
                        },
                        secondary: {
                            DEFAULT: '#E67E22',
                            light: '#F39C12'
                        }
                    }
                }
            }
        }
    </script>
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
                        <a href="/marketplace"
                            class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Marketplace</a>
                        <a href="/land-rental"
                            class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Location</a>
                        <a href="/services"
                            class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Services</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative cart-btn">
                        <button onclick="toggleCart()" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium relative">
                            <i class="fas fa-shopping-cart"></i>
                            <span
                                class="cart-count absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center"
                                style="display: none;">0</span>
                        </button>
                    </div>
                    <a href="/login"
                        class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Connexion</a>
                    <div class="flex space-x-2">
                        <a href="/register/farmer"
                            class="bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-200 transition">
                            Agriculteur
                        </a>
                        <a href="/register/buyer"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                            Acheteur
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="accueil" class="pt-12 pb-16 bg-gradient-to-br from-green-50 to-white hero-pattern">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-5xl font-bold text-gray-900 mb-6 leading-tight">
                        Connectez Agriculteurs et Acheteurs Professionnels
                    </h1>
                    <p class="text-xl text-gray-600 mb-8">
                        Modernisez votre chaîne d'approvisionnement agricole. Éliminez les intermédiaires, augmentez vos
                        profits et accédez à des produits de qualité directement des producteurs.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button onclick="showRegisterModal('agriculteur')"
                            class="bg-primary text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-primary-dark transition shadow-lg hover:shadow-xl">
                            Vendre mes produits
                        </button>
                        <button onclick="showRegisterModal('acheteur')"
                            class="border-2 border-primary text-primary px-8 py-4 rounded-lg text-lg font-semibold hover:bg-primary hover:text-white transition">
                            Acheter des produits
                        </button>
                    </div>
                    <div class="mt-8 flex items-center space-x-8">
                        <div>
                            <p class="text-3xl font-bold text-primary">500+</p>
                            <p class="text-gray-600">Agriculteurs</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-primary">1000+</p>
                            <p class="text-gray-600">Acheteurs</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-primary">5000+</p>
                            <p class="text-gray-600">Transactions</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="relative animate-fade-up delay-300">

                        <!-- 2x2 Bento Grid -->
                        <div class="grid grid-cols-2 gap-4 lg:gap-6">

                            <!-- Image 1: Top Left - Crop Sensors -->
                            <div
                                class="group relative aspect-square rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                                <img src="/image/axom.png" alt="Capteurs agricoles intelligents surveillant les cultures avec technologie IoT"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-green-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                <!-- Floating Badge -->
                                <div
                                    class="absolute bottom-4 left-4 right-4 glass-panel-light rounded-2xl p-3 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                                    <p class="text-xs font-semibold text-white">Capteurs IoT</p>
                                </div>
                            </div>

                            <!-- Image 2: Top Right - Seeds in Hand -->
                            <div
                                class="group relative aspect-square rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 mt-8 lg:mt-12">
                                <img src="https://images.unsplash.com/photo-1548439083-58684fed30a4"
                                    alt="Mains tenant des graines dans un champ agricole avec rangées de cultures"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-green-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                <!-- Floating Badge -->
                                <div
                                    class="absolute bottom-4 left-4 right-4 glass-panel-light rounded-2xl p-3 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                                    <p class="text-xs font-semibold text-white">Optimisation des semences</p>
                                </div>
                            </div>

                            <!-- Image 3: Bottom Left - Agricultural Equipment -->
                            <div
                                class="group relative aspect-square rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                                <img src="https://img.rocket.new/generatedImages/rocket_gen_img_1735adbb8-1766605126050.png"
                                    alt="Équipement agricole rouge de semis moderne dans un champ"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-red-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                <!-- Floating Badge -->
                                <div
                                    class="absolute bottom-4 left-4 right-4 glass-panel-light rounded-2xl p-3 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                                    <p class="text-xs font-semibold text-white">Équipement intelligent</p>
                                </div>
                            </div>

                            <!-- Image 4: Bottom Right - Mobile App -->
                            <div
                                class="group relative aspect-square rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 mt-8 lg:mt-12">
                                <img src="https://img.rocket.new/generatedImages/rocket_gen_img_19f093407-1767384964188.png"
                                    alt="Application mobile affichant des analyses agricoles avec graphiques et visualisation de données"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                <!-- Floating Badge -->
                                <div
                                    class="absolute bottom-4 left-4 right-4 glass-panel-light rounded-2xl p-3 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                                    <p class="text-xs font-semibold text-white">Tableau de bord mobile</p>
                                </div>
                            </div>

                        </div>

                        <!-- Floating Stats Card (Optional Enhancement) -->
                        <div
                            class="absolute -bottom-6 -left-6 glass-panel-white rounded-2xl p-6 shadow-2xl animate-float hidden lg:block">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="text-green-600">
                                        <path d="M3 3v18h18"></path>
                                        <path d="m19 9-5 5-4-4-3 3"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-black">+32%</p>
                                    <p class="text-xs text-black">Efficacité moyenne</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comment ça marche -->
    <section id="comment-ca-marche" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Comment ça marche ?</h2>
                <p class="text-xl text-gray-600">Simple, rapide et sécurisé en 3 étapes</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-primary-light rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <span class="text-4xl">📝</span>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">1. Inscrivez-vous</h3>
                    <p class="text-gray-600">Créez votre compte agriculteur ou acheteur en quelques minutes.
                        Vérification simple et rapide.</p>
                </div>

                <div class="text-center">
                    <div class="bg-primary-light rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <span class="text-4xl">🛒</span>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">2. Publiez ou Achetez</h3>
                    <p class="text-gray-600">Agriculteurs : publiez vos produits. Acheteurs : parcourez et commandez
                        directement.</p>
                </div>

                <div class="text-center">
                    <div class="bg-primary-light rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <span class="text-4xl">🚚</span>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">3. Livraison sécurisée</h3>
                    <p class="text-gray-600">Paiement sécurisé, livraison organisée, et confirmation de réception en
                        toute tranquillité.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Avantages -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Pourquoi choisir Axom ?</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                    <div class="text-4xl mb-4">💰</div>
                    <h3 class="text-xl font-semibold mb-2">Meilleurs Prix</h3>
                    <p class="text-gray-600">Éliminez les intermédiaires et augmentez vos marges jusqu'à 30%</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                    <div class="text-4xl mb-4">🔒</div>
                    <h3 class="text-xl font-semibold mb-2">Paiement Sécurisé</h3>
                    <p class="text-gray-600">Transactions protégées avec garantie de paiement</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                    <div class="text-4xl mb-4">📊</div>
                    <h3 class="text-xl font-semibold mb-2">Analytics</h3>
                    <p class="text-gray-600">Suivez vos performances et optimisez vos ventes</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                    <div class="text-4xl mb-4">🌍</div>
                    <h3 class="text-xl font-semibold mb-2">Portée Nationale</h3>
                    <p class="text-gray-600">Accédez à tout le marché marocain depuis votre exploitation</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Nos Forfaits</h2>
                <p class="text-xl text-gray-600">Choisissez le plan qui correspond à vos besoins</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Gratuit -->
                <div class="bg-white border-2 border-gray-200 rounded-2xl p-8 hover:shadow-xl transition">
                    <h3 class="text-2xl font-bold mb-4">Gratuit</h3>
                    <p class="text-4xl font-bold text-gray-900 mb-6">0 DH<span
                            class="text-lg text-gray-500">/mois</span></p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>10 annonces maximum</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Commission 3%</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Messagerie incluse</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Statistiques de base</span>
                        </li>
                    </ul>
                    <button
                        class="w-full border-2 border-primary text-primary py-3 rounded-lg hover:bg-primary hover:text-white transition">
                        Commencer gratuitement
                    </button>
                </div>

                <!-- Pro Mensuel -->
                <div class="bg-primary text-white rounded-2xl p-8 shadow-2xl transform scale-105 relative">
                    <div
                        class="absolute top-0 right-0 bg-secondary text-white px-4 py-1 rounded-bl-lg rounded-tr-lg text-sm font-semibold">
                        POPULAIRE
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Pro Mensuel</h3>
                    <p class="text-4xl font-bold mb-6">29 DH<span class="text-lg opacity-80">/mois</span></p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <span class="mr-2">✓</span>
                            <span>Annonces illimitées</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">✓</span>
                            <span>Commission 2%</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">✓</span>
                            <span>Badge "Vendeur Pro"</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">✓</span>
                            <span>Boost 5 annonces/mois</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">✓</span>
                            <span>Support prioritaire</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">✓</span>
                            <span>Analytics avancés</span>
                        </li>
                    </ul>
                    <button
                        class="w-full bg-white text-primary py-3 rounded-lg hover:bg-gray-100 transition font-semibold">
                        Choisir Pro
                    </button>
                </div>

                <!-- Pro Annuel -->
                <div class="bg-white border-2 border-gray-200 rounded-2xl p-8 hover:shadow-xl transition">
                    <div
                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold inline-block mb-4">
                        Économie 28%
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Pro Annuel</h3>
                    <p class="text-4xl font-bold text-gray-900 mb-2">250 DH<span
                            class="text-lg text-gray-500">/an</span></p>
                    <p class="text-sm text-gray-500 mb-6">20,83 DH/mois</p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Tous les avantages Pro</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Commission 1,5%</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Boost 100 annonces/an</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Badge "Vendeur Elite"</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Consultations gratuites</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Publicité page d'accueil</span>
                        </li>
                    </ul>
                    <button class="w-full bg-primary text-white py-3 rounded-lg hover:bg-primary-dark transition">
                        Choisir Pro Annuel
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-primary to-primary-dark text-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Prêt à moderniser votre agriculture ?</h2>
            <p class="text-xl mb-8 opacity-90">Rejoignez des centaines d'agriculteurs et acheteurs qui ont déjà
                transformé leur activité</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="showRegisterModal('agriculteur')"
                    class="bg-white text-primary px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition">
                    Commencer maintenant
                </button>
                <button onclick="showLoginModal()"
                    class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-primary transition">
                    Se connecter
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4"> <i class="fas fa-leaf text-green-600 text-2xl mr-2"></i>
                        Axom</h3>
                    <p class="text-gray-400">Digitalisez votre agriculture et connectez-vous directement aux acheteurs
                        professionnels.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Plateforme</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Comment ça marche</a></li>
                        <li><a href="#" class="hover:text-white transition">Produits</a></li>
                        <li><a href="#" class="hover:text-white transition">Terrains</a></li>
                        <li><a href="#" class="hover:text-white transition">Tarifs</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Centre d'aide</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition">Sécurité</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Légal</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Conditions d'utilisation</a></li>
                        <li><a href="#" class="hover:text-white transition">Politique de confidentialité</a></li>
                        <li><a href="#" class="hover:text-white transition">Mentions légales</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Axom. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function showLoginModal() {
            window.location.href = "/login";
        }

        function showRegisterModal(type) {
            if (type === 'agriculteur') {
                window.location.href = "/register/farmer";
            } else if (type === 'acheteur') {
                window.location.href = "/register/buyer";
            }
        }

        // Cart functionality
        let cart = [];
        let cartOpen = false;

        function toggleCart() {
            const sidebar = document.getElementById('cartSidebar');
            const overlay = document.getElementById('cartOverlay');
            
            cartOpen = !cartOpen;
            
            if (cartOpen) {
                sidebar.classList.remove('translate-x-full');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.add('translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }

        function addToCart(product) {
            cart.push(product);
            updateCartUI();
            showNotification('Produit ajouté au panier');
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCartUI();
            showNotification('Produit retiré du panier');
        }

        function updateCartUI() {
            const cartItems = document.getElementById('cartItems');
            const cartCount = document.querySelector('.cart-count');
            const cartTotal = document.getElementById('cartTotal');
            
            if (cart.length === 0) {
                cartItems.innerHTML = `
                    <div class="text-center text-gray-500 py-12">
                        <i class="fas fa-shopping-cart text-6xl mb-4 text-gray-300"></i>
                        <p class="text-lg">Votre panier est vide</p>
                        <p class="text-sm mt-2">Ajoutez des produits depuis la marketplace</p>
                    </div>
                `;
                cartCount.style.display = 'none';
                cartTotal.textContent = '0 DH';
            } else {
                let html = '';
                let total = 0;
                
                cart.forEach((item, index) => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    
                    html += `
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded-lg">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900">${item.name}</h4>
                                <p class="text-sm text-gray-600">${item.quantity} x ${item.price} DH</p>
                            </div>
                            <button onclick="removeFromCart(${index})" class="text-red-500 hover:text-red-700 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                });
                
                cartItems.innerHTML = html;
                cartCount.textContent = cart.length;
                cartCount.style.display = 'flex';
                cartTotal.textContent = `${total} DH`;
            }
        }

        function clearCart() {
            cart = [];
            updateCartUI();
            showNotification('Panier vidé');
        }

        function checkout() {
            if (cart.length === 0) {
                showNotification('Votre panier est vide');
                return;
            }
            
            // Rediriger vers la page de paiement
            window.location.href = '/checkout';
        }

        function showNotification(message) {
            // Créer une notification simple (peut être amélioré plus tard)
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-pulse';
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>