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
                        <span class="text-xl font-bold text-gray-800">AgriConnect</span>
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
                    <i class="fas fa-seedling text-green-600 text-4xl mb-4"></i>
                    <h2 class="text-3xl font-bold text-gray-900">Inscription Agriculteur</h2>
                    <p class="text-gray-600 mt-2">Rejoignez la communauté d'agriculteurs AgriConnect</p>
                </div>

                <?php if ($this->getFlash('error')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <?= $this->getFlash('error') ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="/register/farmer" class="space-y-6">
                    <!-- Informations Personnelles -->
                    <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">
                            <i class="fas fa-user mr-2 text-green-600"></i>Informations personnelles
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Prénom *
                                </label>
                                <input type="text" name="first_name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                       placeholder="Mohamed">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Nom *
                                </label>
                                <input type="text" name="last_name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                       placeholder="El Masghati">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Email *
                                </label>
                                <input type="email" name="email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                       placeholder="mohamed@email.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Téléphone *
                                </label>
                                <input type="tel" name="phone" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                       placeholder="+212 6 00 00 00 00">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Mot de passe *
                                </label>
                                <input type="password" name="password" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                       placeholder="••••••••">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Confirmer mot de passe *
                                </label>
                                <input type="password" name="password_confirm" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                       placeholder="••••••••">
                            </div>
                        </div>
                    </div>

                    <!-- Informations sur l'exploitation -->
                    <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">
                            <i class="fas fa-tractor mr-2 text-green-600"></i>Informations sur l'exploitation
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Type d'exploitation *
                                </label>
                                <select name="farm_type" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                                    <option value="">Sélectionnez...</option>
                                    <option value="maraichage">Maraîchage</option>
                                    <option value="elevage">Élevage</option>
                                    <option value="cereales">Céréales</option>
                                    <option value="agrumes">Agrumes</option>
                                    <option value="oliviers">Oliviers</option>
                                    <option value="vigne">Vigne</option>
                                    <option value="laitier">Produits laitiers</option>
                                    <option value="mixte">Mixte</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Ville *
                                </label>
                                <input type="text" name="city" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                       placeholder="Marrakech">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Adresse de l'exploitation *
                                </label>
                                <textarea name="farm_address" required rows="3"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                          placeholder="Adresse complète de votre exploitation agricole..."></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Capacité de production mensuelle
                                </label>
                                <input type="text" name="production_capacity"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                       placeholder="ex: 500kg de tomates, 2000L de lait...">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Certifications (optionnel)
                                </label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="certifications[]" value="bio" class="mr-2">
                                        <span>Agriculture Biologique</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="certifications[]" value="globalgap" class="mr-2">
                                        <span>GLOBALG.A.P</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="certifications[]" value="fairtrade" class="mr-2">
                                        <span>Commerce Équitable</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Documents -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">
                            <i class="fas fa-file-alt mr-2 text-green-600"></i>Documents de vérification
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Carte d'identité *
                                </label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-green-400 transition cursor-pointer">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p class="text-sm text-gray-600">Cliquez pour télécharger</p>
                                    <p class="text-xs text-gray-500">PDF, JPG, PNG (max 5MB)</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Certificat d'exploitation (optionnel)
                                </label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-green-400 transition cursor-pointer">
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
                                J'accepte les <a href="#" class="text-green-600 hover:text-green-700">conditions générales d'utilisation</a> 
                                et la <a href="#" class="text-green-600 hover:text-green-700">politique de confidentialité</a> d'AgriConnect.
                            </span>
                        </label>
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit" 
                                class="flex-1 bg-green-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-green-700 transition transform hover:scale-105">
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
                        <a href="/login" class="text-green-600 hover:text-green-700 font-medium">
                            Se connecter
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
