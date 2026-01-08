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

    <!-- Login Section -->
    <section class="py-20">
        <div class="max-w-md mx-auto px-4">
            <div class="bg-white rounded-xl shadow-lg p-8 fade-in">
                <div class="text-center mb-8">
                    <i class="fas fa-leaf text-green-600 text-4xl mb-4"></i>
                    <h2 class="text-3xl font-bold text-gray-900">Connexion</h2>
                    <p class="text-gray-600 mt-2">Accédez à votre compte AXOM</p>
                </div>

                <?php if ($this->getFlash('error')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <?= $this->getFlash('error') ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->getFlash('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <?= $this->getFlash('success') ?>
                    </div>
                <?php endif; ?>

                <form id="loginForm" method="POST" action="/login" class="space-y-6">
                    <div class="form-group">
                        <label class="form-label" for="email">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" required
                                   class="form-input pl-10"
                                   placeholder="votre@email.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">
                            Mot de passe
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="password" name="password" required
                                   class="form-input pl-10"
                                   placeholder="••••••••">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Type de compte
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative">
                                <input type="radio" name="user_type" value="farmer" checked class="peer sr-only">
                                <div class="p-4 border-2 rounded-lg cursor-pointer peer-checked:border-green-600 peer-checked:bg-green-50 hover:bg-gray-50">
                                    <i class="fas fa-seedling text-green-600 text-xl mb-2"></i>
                                    <div class="font-medium">Agriculteur</div>
                                </div>
                            </label>
                            <label class="relative">
                                <input type="radio" name="user_type" value="buyer" class="peer sr-only">
                                <div class="p-4 border-2 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:bg-gray-50">
                                    <i class="fas fa-shopping-cart text-blue-600 text-xl mb-2"></i>
                                    <div class="font-medium">Acheteur</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                            <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                        </label>
                        <a href="#" class="text-sm text-green-600 hover:text-green-700">
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <button type="submit" class="btn btn-primary w-full" data-original-text="Se connecter">
                        Se connecter
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-gray-600">
                        Pas encore de compte ? 
                        <a href="/register/farmer" class="text-green-600 hover:text-green-700 font-medium">
                            S'inscrire comme agriculteur
                        </a>
                        ou 
                        <a href="/register/buyer" class="text-blue-600 hover:text-blue-700 font-medium">
                            comme acheteur
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script src="/js/app.js"></script>
</body>
</html>