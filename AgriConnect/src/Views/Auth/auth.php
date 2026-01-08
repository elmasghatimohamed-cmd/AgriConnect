<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroConnect - Connexion / Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-gradient-to-br from-green-50 to-white min-h-screen">
    <!-- Header -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="index.html" class="flex items-center">
                    <h1 class="text-2xl font-bold text-primary">🌾 AgroConnect</h1>
                </a>
                <a href="index.html" class="text-gray-600 hover:text-primary transition">
                    ← Retour à l'accueil
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="max-w-6xl mx-auto px-4 py-12">
        <!-- Page Selector -->
        <div class="flex justify-center mb-8">
            <div class="bg-white rounded-lg shadow-md p-2 inline-flex">
                <button onclick="showLogin()" id="btnLogin" class="px-8 py-3 rounded-md font-semibold transition bg-primary text-white">
                    Connexion
                </button>
                <button onclick="showSignup()" id="btnSignup" class="px-8 py-3 rounded-md font-semibold transition text-gray-700 hover:bg-gray-100">
                    Inscription
                </button>
            </div>
        </div>

        <!-- LOGIN FORM -->
        <div id="loginForm" class="max-w-md mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Bon retour !</h2>
                    <p class="text-gray-600">Connectez-vous à votre compte</p>
                </div>

                <form onsubmit="handleLogin(event)">
                    <!-- Email -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" required 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                               placeholder="votre@email.com">
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Mot de passe</label>
                        <input type="password" required 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                               placeholder="••••••••">
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                            <span class="ml-2 text-gray-700">Se souvenir de moi</span>
                        </label>
                        <a href="#" class="text-primary hover:text-primary-dark font-semibold">Mot de passe oublié ?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-primary-dark transition shadow-lg hover:shadow-xl">
                        Se connecter
                    </button>

                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500">Ou continuer avec</span>
                        </div>
                    </div>

                    <!-- Social Login -->
                    <div class="grid grid-cols-2 gap-4">
                        <button type="button" class="flex items-center justify-center px-4 py-3 border-2 border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            Google
                        </button>
                        <button type="button" class="flex items-center justify-center px-4 py-3 border-2 border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <svg class="w-5 h-5 mr-2" fill="#1877F2" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </button>
                    </div>
                </form>

                <p class="text-center mt-6 text-gray-600">
                    Pas encore de compte ? 
                    <button onclick="showSignup()" class="text-primary hover:text-primary-dark font-semibold">
                        Inscrivez-vous
                    </button>
                </p>
            </div>
        </div>

        <!-- SIGNUP FORM -->
        <div id="signupForm" class="hidden max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Créer un compte</h2>
                    <p class="text-gray-600">Rejoignez la plateforme AgroConnect</p>
                </div>

                <!-- User Type Selection -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold mb-4 text-center">Je suis :</label>
                    <div class="grid md:grid-cols-2 gap-4">
                        <button type="button" onclick="selectUserType('agriculteur')" 
                                id="typeAgriculteur"
                                class="user-type-btn p-6 border-2 border-gray-200 rounded-xl hover:border-primary transition text-center">
                            <div class="text-5xl mb-3">🌾</div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Agriculteur</h3>
                            <p class="text-gray-600 text-sm">Je veux vendre mes produits agricoles</p>
                        </button>
                        <button type="button" onclick="selectUserType('acheteur')" 
                                id="typeAcheteur"
                                class="user-type-btn p-6 border-2 border-gray-200 rounded-xl hover:border-primary transition text-center">
                            <div class="text-5xl mb-3">🏪</div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Acheteur</h3>
                            <p class="text-gray-600 text-sm">Je veux acheter des produits agricoles</p>
                        </button>
                    </div>
                </div>

                <form onsubmit="handleSignup(event)" id="mainSignupForm">
                    <input type="hidden" id="userType" name="userType" value="">

                    <!-- Common Fields -->
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Prénom *</label>
                            <input type="text" required 
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                   placeholder="Ahmed">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nom *</label>
                            <input type="text" required 
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                   placeholder="El Idrissi">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Email *</label>
                            <input type="email" required 
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                   placeholder="ahmed@email.com">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Téléphone *</label>
                            <input type="tel" required 
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                   placeholder="+212 6XX XXX XXX">
                        </div>
                    </div>

                    <!-- Agriculteur Specific Fields -->
                    <div id="agriculteurFields" class="hidden">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 mt-8">Informations sur l'exploitation</h3>
                        
                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Type d'exploitation *</label>
                                <select required 
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition">
                                    <option value="">Sélectionnez...</option>
                                    <option value="maraichage">Maraîchage</option>
                                    <option value="elevage">Élevage</option>
                                    <option value="cereales">Céréales</option>
                                    <option value="arboriculture">Arboriculture</option>
                                    <option value="viticulture">Viticulture</option>
                                    <option value="bio">Agriculture biologique</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Ville *</label>
                                <input type="text" required 
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                       placeholder="Agadir">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Adresse de l'exploitation *</label>
                            <textarea required rows="3"
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                      placeholder="Adresse complète de votre exploitation agricole"></textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Capacité de production mensuelle</label>
                            <input type="text" 
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                   placeholder="ex: 500 kg de tomates, 200 kg de pommes de terre...">
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Certifications (optionnel)</label>
                            <div class="flex flex-wrap gap-3">
                                <label class="flex items-center">
                                    <input type="checkbox" class="w-4 h-4 text-primary border-gray-300 rounded">
                                    <span class="ml-2 text-gray-700">Agriculture Biologique</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="w-4 h-4 text-primary border-gray-300 rounded">
                                    <span class="ml-2 text-gray-700">Label Rouge</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="w-4 h-4 text-primary border-gray-300 rounded">
                                    <span class="ml-2 text-gray-700">AOC</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Acheteur Specific Fields -->
                    <div id="acheteurFields" class="hidden">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 mt-8">Informations professionnelles</h3>
                        
                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Raison sociale *</label>
                                <input type="text" required 
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                       placeholder="Nom de votre commerce/entreprise">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Type d'activité *</label>
                                <select required 
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition">
                                    <option value="">Sélectionnez...</option>
                                    <option value="marche">Marché traditionnel</option>
                                    <option value="supermarche">Supermarché</option>
                                    <option value="restaurant">Restaurant</option>
                                    <option value="hotel">Hôtel</option>
                                    <option value="grossiste">Grossiste</option>
                                    <option value="cooperative">Coopérative alimentaire</option>
                                    <option value="transformateur">Transformateur agroalimentaire</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">SIRET / N° d'immatriculation *</label>
                                <input type="text" required 
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                       placeholder="123456789">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Volume d'achat mensuel</label>
                                <input type="text" 
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                       placeholder="ex: 1000 kg">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Adresse de livraison *</label>
                            <textarea required rows="3"
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                      placeholder="Adresse complète pour les livraisons"></textarea>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Mot de passe *</label>
                            <input type="password" required minlength="8"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                   placeholder="Minimum 8 caractères">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Confirmer le mot de passe *</label>
                            <input type="password" required minlength="8"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition"
                                   placeholder="Confirmez votre mot de passe">
                        </div>
                    </div>

                    <!-- Terms -->
                    <div class="mb-6">
                        <label class="flex items-start">
                            <input type="checkbox" required class="w-5 h-5 text-primary border-gray-300 rounded mt-1">
                            <span class="ml-3 text-gray-700">
                                J'accepte les <a href="#" class="text-primary hover:underline">conditions d'utilisation</a> 
                                et la <a href="#" class="text-primary hover:underline">politique de confidentialité</a>
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-primary text-white py-4 rounded-lg font-semibold hover:bg-primary-dark transition shadow-lg hover:shadow-xl text-lg">
                        Créer mon compte
                    </button>
                </form>

                <p class="text-center mt-6 text-gray-600">
                    Vous avez déjà un compte ? 
                    <button onclick="showLogin()" class="text-primary hover:text-primary-dark font-semibold">
                        Connectez-vous
                    </button>
                </p>
            </div>
        </div>
    </div>

    <script>
        function showLogin() {
            document.getElementById('loginForm').classList.remove('hidden');
            document.getElementById('signupForm').classList.add('hidden');
            document.getElementById('btnLogin').classList.add('bg-primary', 'text-white');
            document.getElementById('btnLogin').classList.remove('text-gray-700', 'hover:bg-gray-100');
            document.getElementById('btnSignup').classList.remove('bg-primary', 'text-white');
            document.getElementById('btnSignup').classList.add('text-gray-700', 'hover:bg-gray-100');
        }

        function showSignup() {
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('signupForm').classList.remove('hidden');
            document.getElementById('btnSignup').classList.add('bg-primary', 'text-white');
            document.getElementById('btnSignup').classList.remove('text-gray-700', 'hover:bg-gray-100');
            document.getElementById('btnLogin').classList.remove('bg-primary', 'text-white');
            document.getElementById('btnLogin').classList.add('text-gray-700', 'hover:bg-gray-100');
        }

        function selectUserType(type) {
            document.getElementById('userType').value = type;
            
            // Reset all buttons
            document.querySelectorAll('.user-type-btn').forEach(btn => {
                btn.classList.remove('border-primary', 'bg-green-50');
                btn.classList.add('border-gray-200');
            });

            // Highlight selected
            if (type === 'agriculteur') {
                document.getElementById('typeAgriculteur').classList.add('border-primary', 'bg-green-50');
                document.getElementById('typeAgriculteur').classList.remove('border-gray-200');
                document.getElementById('agriculteurFields').classList.remove('hidden');
                document.getElementById('acheteurFields').classList.add('hidden');
            } else {
                document.getElementById('typeAcheteur').classList.add('border-primary', 'bg-green-50');
                document.getElementById('typeAcheteur').classList.remove('border-gray-200');
                document.getElementById('acheteurFields').classList.remove('hidden');
                document.getElementById('agriculteurFields').classList.add('hidden');
            }
        }

        function handleLogin(event) {
            event.preventDefault();
            alert('Connexion en cours...\n\nFonctionnalité à développer avec le backend PHP/Laravel');
            // Add PHP/AJAX call here
        }

        function handleSignup(event) {
            event.preventDefault();
            const userType = document.getElementById('userType').value;
            
            if (!userType) {
                alert('Veuillez sélectionner votre type de compte (Agriculteur ou Acheteur)');
                return;
            }
            
            alert(`Inscription ${userType} en cours...\n\nFonctionnalité à développer avec le backend PHP/Laravel`);
            // Add PHP/AJAX call here
        }
    </script>
</body>
</html>