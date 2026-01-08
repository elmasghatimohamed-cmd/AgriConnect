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
        <h1 class="text-3xl font-bold text-gray-900">Statistiques Agricoles</h1>
        <p class="text-gray-600 mt-2">Analyse complète de vos performances et tendances du marché</p>
    </div>

    <!-- Key Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">
                    <i class="fas fa-chart-line text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Production totale</p>
                    <p class="text-2xl font-bold text-gray-900">22.5T</p>
                    <p class="text-sm text-green-600">+12% vs année dernière</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full">
                    <i class="fas fa-euro-sign text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Revenus</p>
                    <p class="text-2xl font-bold text-gray-900">€45,200</p>
                    <p class="text-sm text-green-600">+18% vs année dernière</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-full">
                    <i class="fas fa-percentage text-yellow-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Efficacité</p>
                    <p class="text-2xl font-bold text-gray-900">85%</p>
                    <p class="text-sm text-green-600">+5% vs année dernière</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-full">
                    <i class="fas fa-award text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Qualité</p>
                    <p class="text-2xl font-bold text-gray-900">A+</p>
                    <p class="text-sm text-green-600">Excellente</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Production Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Production Comparison -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Production par Culture</h3>
            </div>
            <div class="p-6">
                <canvas id="productionChart" height="200"></canvas>
            </div>
        </div>

        <!-- Market Trends -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Tendances du Marché</h3>
            </div>
            <div class="p-6">
                <canvas id="marketChart" height="200"></canvas>
            </div>
        </div>
    </div>

    <!-- Efficiency Metrics -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Indicateurs d'Efficacité</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-600">Utilisation de l'eau</span>
                        <span class="text-xl font-semibold text-blue-600">85%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-blue-600 h-3 rounded-full" style="width: 85%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Optimal: 80-90%</p>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-600">Utilisation engrais</span>
                        <span class="text-xl font-semibold text-green-600">92%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-green-600 h-3 rounded-full" style="width: 92%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Excellent: >90%</p>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-600">Rendement cultures</span>
                        <span class="text-xl font-semibold text-yellow-600">78%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-yellow-600 h-3 rounded-full" style="width: 78%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Moyen: 70-85%</p>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-600">Efficacité globale</span>
                        <span class="text-xl font-semibold text-purple-600">85%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-purple-600 h-3 rounded-full" style="width: 85%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Très bon: >80%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Market Analysis -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Price Trends -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Prix Moyens du Marché</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-carrot text-orange-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-medium">Carottes</p>
                                <p class="text-xs text-gray-600">+8% vs mois dernier</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold">15€</div>
                            <div class="text-xs text-gray-600">/kg</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-circle text-red-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-medium">Tomates</p>
                                <p class="text-xs text-gray-600">+12% vs mois dernier</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold">12€</div>
                            <div class="text-xs text-gray-600">/kg</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-circle text-yellow-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-medium">Pommes de terre</p>
                                <p class="text-xs text-gray-600">-3% vs mois dernier</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold">8€</div>
                            <div class="text-xs text-gray-600">/kg</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-wheat-awn text-amber-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-medium">Blé</p>
                                <p class="text-xs text-gray-600">+5% vs mois dernier</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold">25€</div>
                            <div class="text-xs text-gray-600">/100kg</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommendations -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Recommandations IA</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="p-4 bg-green-50 border-l-4 border-green-400 rounded">
                        <div class="flex items-start">
                            <i class="fas fa-lightbulb text-green-600 mr-3 mt-1"></i>
                            <div>
                                <p class="font-medium text-green-800">Optimiser irrigation</p>
                                <p class="text-sm text-green-700 mt-1">Réduire l'irrigation de 15% pourrait maintenir le rendement tout en économisant 2000L/jour.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 bg-blue-50 border-l-4 border-blue-400 rounded">
                        <div class="flex items-start">
                            <i class="fas fa-chart-line text-blue-600 mr-3 mt-1"></i>
                            <div>
                                <p class="font-medium text-blue-800">Opportunité marché</p>
                                <p class="text-sm text-blue-700 mt-1">Les prix des tomates augmentent. Considérez augmenter la production de 20%.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 bg-yellow-50 border-l-4 border-yellow-400 rounded">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-triangle text-yellow-600 mr-3 mt-1"></i>
                            <div>
                                <p class="font-medium text-yellow-800">Alerte efficacité</p>
                                <p class="text-sm text-yellow-700 mt-1">Le rendement des pommes de terre est inférieur de 10% à la moyenne.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Options -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Export & Rapports</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <button class="flex items-center justify-center p-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-file-pdf mr-2"></i>
                    <span>Rapport PDF</span>
                </button>
                <button class="flex items-center justify-center p-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-file-excel mr-2"></i>
                    <span>Export Excel</span>
                </button>
                <button class="flex items-center justify-center p-4 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                    <i class="fas fa-print mr-2"></i>
                    <span>Impression</span>
                </button>
                <button class="flex items-center justify-center p-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                    <i class="fas fa-share mr-2"></i>
                    <span>Partager</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Production Chart
const productionCtx = document.getElementById('productionChart').getContext('2d');
new Chart(productionCtx, {
    type: 'bar',
    data: {
        labels: ['Carottes', 'Tomates', 'Pommes de terre', 'Blé'],
        datasets: [
            {
                label: 'Année actuelle',
                data: [2500, 3200, 4800, 12000],
                backgroundColor: 'rgba(34, 197, 94, 0.8)',
                borderColor: 'rgb(34, 197, 94)',
                borderWidth: 1
            },
            {
                label: 'Année précédente',
                data: [2200, 2800, 4500, 11000],
                backgroundColor: 'rgba(156, 163, 175, 0.8)',
                borderColor: 'rgb(156, 163, 175)',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: { beginAtZero: true }
        }
    }
});

// Market Trends Chart
const marketCtx = document.getElementById('marketChart').getContext('2d');
new Chart(marketCtx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
        datasets: [
            {
                label: 'Carottes',
                data: [14, 14.5, 15, 15.2, 15.8, 16],
                borderColor: 'rgb(251, 146, 60)',
                backgroundColor: 'rgba(251, 146, 60, 0.1)',
                tension: 0.4
            },
            {
                label: 'Tomates',
                data: [10, 10.5, 11, 11.8, 12.2, 12],
                borderColor: 'rgb(239, 68, 68)',
                backgroundColor: 'rgba(239, 68, 68, 0.1)',
                tension: 0.4
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: { beginAtZero: false }
        }
    }
});

// Auto-refresh statistics data every 10 minutes
setInterval(() => {
    fetch('/api/statistics')
        .then(response => response.json())
        .then(data => {
            console.log('Statistics data updated:', data);
            // Update charts and values here
        })
        .catch(error => console.error('Error fetching statistics data:', error));
}, 600000);
</script>

</body>
</html>
