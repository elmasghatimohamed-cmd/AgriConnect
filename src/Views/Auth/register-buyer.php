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
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-leaf text-green-600 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-gray-800">AXOM</span>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="/" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Registration Section -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="text-center mb-8">
                    <i class="fas fa-shopping-cart text-blue-600 text-4xl mb-4"></i>
                    <h2 class="text-3xl font-bold text-gray-900">Inscription Acheteur</h2>
                    <p class="text-gray-600 mt-2">Accédez aux meilleurs produits agricoles directement des producteurs</p>
                </div>

                <?php if ($this->getFlash('error')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <?= $this->getFlash('error') ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="/register/buyer" class="space-y-6">
                    <!-- Informations Personnelles -->
                    <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">
                            <i class="fas fa-user mr-2 text-blue-600"></i>Informations personnelles
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Prénom *
                                </label>
                                <input type="text" name="first_name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="Ahmed">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Nom *
                                </label>
                                <input type="text" name="last_name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="Bensalah">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Email *
                                </label>
                                <input type="email" name="email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="ahmed@entreprise.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Téléphone *
                                </label>
                                <input type="tel" name="phone" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="+212 6 00 00 00 00">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Mot de passe *
                                </label>
                                <input type="password" name="password" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="••••••••">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Confirmer mot de passe *
                                </label>
                                <input type="password" name="password_confirm" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="••••••••">
                            </div>
                        </div>
                    </div>

                    <!-- Informations Entreprise -->
                    <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">
                            <i class="fas fa-building mr-2 text-blue-600"></i>Informations entreprise
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Raison sociale *
                                </label>
                                <input type="text" name="company_name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="Restaurant Le Gourmet">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Type d'activité *
                                </label>
                                <select name="activity_type" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                    <option value="">Sélectionnez...</option>
                                    <option value="restaurant">Restaurant</option>
                                    <option value="hotel">Hôtel</option>
                                    <option value="supermarche">Supermarché</option>
                                    <option value="marche">Marché traditionnel</option>
                                    <option value="grossiste">Grossiste</option>
                                    <option value="distributeur">Distributeur</option>
                                    <option value="cooperative">Coopérative</option>
                                    <option value="transformateur">Transformateur agroalimentaire</option>
                                    <option value="epicerie">Épicerie fine</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    SIRET / Numéro d'immatriculation *
                                </label>
                                <input type="text" name="registration_number" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="12345678901234">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Volume d'achat moyen mensuel
                                </label>
                                <input type="text" name="monthly_volume"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="ex: 500kg de légumes, 1000L de lait...">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Adresse de livraison *
                                </label>
                                <textarea name="delivery_address" required rows="3"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                          placeholder="Adresse complète pour la livraison des produits..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Produits recherchés -->
                    <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">
                            <i class="fas fa-search mr-2 text-blue-600"></i>Produits recherchés
                        </h3>
                        <div class="grid md:grid-cols-3 gap-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="products[]" value="fruits" class="mr-2">
                                <span>Fruits</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="products[]" value="legumes" class="mr-2">
                                <span>Légumes</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="products[]" value="cereales" class="mr-2">
                                <span>Céréales</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="products[]" value="laitiers" class="mr-2">
                                <span>Produits laitiers</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="products[]" value="viandes" class="mr-2">
                                <span>Viandes</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="products[]" value="oeufs" class="mr-2">
                                <span>Œufs</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="products[]" value="miel" class="mr-2">
                                <span>Miel</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="products[]" value="olives" class="mr-2">
                                <span>Oliviers</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="products[]" value="vins" class="mr-2">
                                <span>Vins</span>
                            </label>
                        </div>
                    </div>

                    <!-- Documents -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">
                            <i class="fas fa-file-alt mr-2 text-blue-600"></i>Documents de vérification
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Carte d'identité *
                                </label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-400 transition cursor-pointer">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p class="text-sm text-gray-600">Cliquez pour télécharger</p>
                                    <p class="text-xs text-gray-500">PDF, JPG, PNG (max 5MB)</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Registre de commerce (optionnel)
                                </label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-400 transition cursor-pointer">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p class="text-sm text-gray-600">Cliquez pour télécharger</p>
                                    <p class="text-xs text-gray-500">PDF, JPG, PNG (max 5MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Terms -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <label class="flex items-start">
                            <input type="checkbox" required class="mt-1 mr-3">
                            <span class="text-sm text-gray-600">
                                J'accepte les <a href="#" class="text-blue-600 hover:text-blue-700">conditions générales d'utilisation</a> 
                                et la <a href="#" class="text-blue-600 hover:text-blue-700">politique de confidentialité</a> d'AgriConnect.
                            </span>
                        </label>
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit" 
                                class="flex-1 bg-blue-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-blue-700 transition transform hover:scale-105">
                            <i class="fas fa-check mr-2"></i>
                            Créer mon compte
                        </button>
                        <a href="/login" class="flex-1 border-2 border-gray-300 text-gray-700 py-3 px-4 rounded-lg font-medium hover:bg-gray-50 transition text-center">
                            Annuler
                        </a>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-gray-600">
                        Vous avez déjà un compte ? 
                        <a href="/login" class="text-blue-600 hover:text-blue-700 font-medium">
                            Se connecter
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
