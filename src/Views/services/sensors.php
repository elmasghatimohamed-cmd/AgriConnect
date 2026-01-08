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
        <h1 class="text-3xl font-bold text-gray-900">Capteurs & IoT Agricole</h1>
        <p class="text-gray-600 mt-2">Surveillance en temps réel de vos cultures et équipements</p>
    </div>

    <!-- Real-time Sensor Data -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Sensor Cards -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Temperature Sensor -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-thermometer-half text-red-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Température</h3>
                            <p class="text-sm text-gray-600">Serre 1</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-900">24°C</div>
                        <div class="text-sm text-green-600">Optimal</div>
                    </div>
                </div>
                <canvas id="tempChart" height="100"></canvas>
            </div>

            <!-- Humidity Sensor -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-tint text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Humidité du sol</h3>
                            <p class="text-sm text-gray-600">Champ A</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-900">65%</div>
                        <div class="text-sm text-yellow-600">Modéré</div>
                    </div>
                </div>
                <canvas id="humidityChart" height="100"></canvas>
            </div>

            <!-- NPK Sensor -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-flask text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Nutriments NPK</h3>
                            <p class="text-sm text-gray-600">Champ B</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-semibold text-gray-900">N: 45 | P: 30 | K: 25</div>
                        <div class="text-sm text-green-600">Équilibré</div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center">
                        <div class="text-lg font-bold text-blue-600">45</div>
                        <div class="text-xs text-gray-600">Azote (N)</div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-lg font-bold text-green-600">30</div>
                        <div class="text-xs text-gray-600">Phosphore (P)</div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 30%"></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-lg font-bold text-yellow-600">25</div>
                        <div class="text-xs text-gray-600">Potassium (K)</div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                            <div class="bg-yellow-600 h-2 rounded-full" style="width: 25%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sensor Status & Controls -->
        <div class="space-y-6">
            <!-- Active Sensors -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Capteurs actifs</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium">Capteur Température #1</span>
                        </div>
                        <span class="text-xs text-gray-600">Serre 1</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium">Capteur Humidité #1</span>
                        </div>
                        <span class="text-xs text-gray-600">Champ A</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium">Capteur NPK #1</span>
                        </div>
                        <span class="text-xs text-gray-600">Champ B</span>
                    </div>
                </div>
            </div>

            <!-- Alerts -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Alertes récentes</h3>
                <div class="space-y-3">
                    <div class="p-3 bg-yellow-50 border-l-4 border-yellow-400 rounded">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle text-yellow-600 mr-2"></i>
                            <span class="text-sm font-medium">Humidité basse</span>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">Champ A - Il y a 2 heures</p>
                    </div>
                    <div class="p-3 bg-blue-50 border-l-4 border-blue-400 rounded">
                        <div class="flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                            <span class="text-sm font-medium">Température optimale</span>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">Serre 1 - Il y a 30 minutes</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions rapides</h3>
                <div class="space-y-3">
                    <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition text-sm">
                        <i class="fas fa-plus mr-2"></i>Ajouter un capteur
                    </button>
                    <button class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition text-sm">
                        <i class="fas fa-download mr-2"></i>Télécharger les données
                    </button>
                    <button class="w-full bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition text-sm">
                        <i class="fas fa-cog mr-2"></i>Configurer alertes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Historical Data Table -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Données historiques</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capteur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valeur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Localisation</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dernière mise à jour</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Capteur Température #1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Température</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">24°C</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Serre 1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14:25:00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Capteur Humidité #1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Humidité</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">65%</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Champ A</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14:30:00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Capteur NPK #1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Nutriments</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">N:45 P:30 K:25</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Champ B</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14:20:00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Temperature Chart
const tempCtx = document.getElementById('tempChart').getContext('2d');
new Chart(tempCtx, {
    type: 'line',
    data: {
        labels: ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00'],
        datasets: [{
            label: 'Température (°C)',
            data: [18, 17, 19, 24, 26, 22],
            borderColor: 'rgb(239, 68, 68)',
            backgroundColor: 'rgba(239, 68, 68, 0.1)',
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: { beginAtZero: false }
        }
    }
});

// Humidity Chart
const humidityCtx = document.getElementById('humidityChart').getContext('2d');
new Chart(humidityCtx, {
    type: 'line',
    data: {
        labels: ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00'],
        datasets: [{
            label: 'Humidité (%)',
            data: [70, 72, 68, 65, 62, 66],
            borderColor: 'rgb(59, 130, 246)',
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: { beginAtZero: false, max: 100 }
        }
    }
});

// Auto-refresh data every 30 seconds
setInterval(() => {
    fetch('/api/sensors')
        .then(response => response.json())
        .then(data => {
            console.log('Sensor data updated:', data);
            // Update charts and values here
        })
        .catch(error => console.error('Error fetching sensor data:', error));
}, 30000);
</script>

</body>
</html>
