<?php

namespace Pc\AgriConnect\Controllers;

use Pc\AgriConnect\Core\BaseController;

class ApiController extends BaseController {
    public function products(): void {
        $products = [
            [
                'id' => 1,
                'name' => 'Tomates Bio Premium',
                'category' => 'legumes',
                'price' => 25,
                'unit' => 'kg',
                'quantity' => 500,
                'location' => 'Marrakech',
                'seller' => 'Mohamed El Masghati',
                'rating' => 4.5,
                'image' => 'https://images.unsplash.com/photo-1546630997-3e1b4645382c?w=400&h=300&fit=crop',
                'certifications' => ['bio'],
                'description' => 'Tomates bio de qualité supérieure'
            ],
            [
                'id' => 2,
                'name' => 'Oranges Juteuses',
                'category' => 'fruits',
                'price' => 8,
                'unit' => 'kg',
                'quantity' => 2000,
                'location' => 'Agadir',
                'seller' => 'Ahmed Benali',
                'rating' => 5.0,
                'image' => 'https://images.unsplash.com/photo-1515003197210-e0cd71810b5f?w=400&h=300&fit=crop',
                'certifications' => ['premium'],
                'description' => 'Oranges douces et juteuses'
            ],
            [
                'id' => 3,
                'name' => 'Lait Frais Pasteurisé',
                'category' => 'laitiers',
                'price' => 12,
                'unit' => 'L',
                'quantity' => 500,
                'location' => 'Rabat',
                'seller' => 'Ferme du Nord',
                'rating' => 4.0,
                'image' => 'https://images.unsplash.com/photo-1581375380449-1d88a025c14e?w=400&h=300&fit=crop',
                'certifications' => [],
                'description' => 'Lait frais pasteurisé'
            ]
        ];

        $this->json($products);
    }

    public function lands(): void {
        $lands = [
            [
                'id' => 1,
                'title' => 'Terrain Fertile - Marrakech',
                'surface' => 5,
                'price' => 2500,
                'location' => 'Marrakech',
                'type' => 'terres-arables',
                'water_access' => true,
                'electricity' => true,
                'image' => 'https://images.unsplash.com/photo-1590736969955-71cc94901144?w=400&h=250&fit=crop',
                'owner' => 'Propriétaire 1'
            ],
            [
                'id' => 2,
                'title' => 'Verger d\'Agrumes - Agadir',
                'surface' => 3,
                'price' => 1800,
                'location' => 'Agadir',
                'type' => 'vergers',
                'water_access' => true,
                'electricity' => false,
                'image' => 'https://images.unsplash.com/photo-1574944985070-8f3ebc6b79d2?w=400&h=250&fit=crop',
                'owner' => 'Propriétaire 2'
            ]
        ];

        $this->json($lands);
    }

    public function messages(): void {
        $messages = [
            [
                'id' => 1,
                'sender' => 'Restaurant Le Gourmet',
                'content' => 'Bonjour, je suis intéressé par vos tomates bio...',
                'time' => '14:30',
                'unread' => 2,
                'avatar' => 'RL',
                'online' => true
            ],
            [
                'id' => 2,
                'sender' => 'Al-Mounia Supermarché',
                'content' => 'Merci pour la livraison, les produits sont excellents!',
                'time' => 'Hier',
                'unread' => 0,
                'avatar' => 'AM',
                'online' => false
            ]
        ];

        $this->json($messages);
    }
    
    public function sensorData(): void {
        $this->json([
            'sensors' => [
                [
                    'id' => 1,
                    'name' => 'Capteur Humidité Sol #1',
                    'type' => 'humidity',
                    'value' => 65,
                    'unit' => '%',
                    'status' => 'active',
                    'location' => 'Champ A',
                    'lastUpdate' => '2024-01-08 14:30:00'
                ],
                [
                    'id' => 2,
                    'name' => 'Capteur Température #1',
                    'type' => 'temperature',
                    'value' => 24,
                    'unit' => '°C',
                    'status' => 'active',
                    'location' => 'Serre 1',
                    'lastUpdate' => '2024-01-08 14:25:00'
                ],
                [
                    'id' => 3,
                    'name' => 'Capteur NPK #1',
                    'type' => 'nutrients',
                    'value' => ['N' => 45, 'P' => 30, 'K' => 25],
                    'unit' => 'mg/kg',
                    'status' => 'active',
                    'location' => 'Champ B',
                    'lastUpdate' => '2024-01-08 14:20:00'
                ]
            ]
        ]);
    }
    
    public function weatherData(): void {
        $this->json([
            'current' => [
                'temperature' => 24,
                'humidity' => 65,
                'windSpeed' => 12,
                'windDirection' => 'NE',
                'pressure' => 1013,
                'uvIndex' => 6,
                'precipitation' => 0
            ],
            'forecast' => [
                ['day' => 'Aujourd\'hui', 'temp_min' => 18, 'temp_max' => 26, 'condition' => 'Ensoleillé', 'rain' => 0],
                ['day' => 'Demain', 'temp_min' => 16, 'temp_max' => 24, 'condition' => 'Nuageux', 'rain' => 20],
                ['day' => 'Après-demain', 'temp_min' => 15, 'temp_max' => 22, 'condition' => 'Pluvieux', 'rain' => 80]
            ],
            'seasonal' => [
                'currentSeason' => 'Hiver',
                'recommendedCrops' => ['Blé', 'Orge', 'Fèves', 'Petits pois'],
                'frostRisk' => 'medium',
                'optimalPlanting' => 'Février-Mars'
            ]
        ]);
    }
    
    public function agriculturalStatistics(): void {
        $this->json([
            'production' => [
                'currentYear' => [
                    'carrots' => 2500,
                    'tomatoes' => 3200,
                    'potatoes' => 4800,
                    'wheat' => 12000
                ],
                'previousYear' => [
                    'carrots' => 2200,
                    'tomatoes' => 2800,
                    'potatoes' => 4500,
                    'wheat' => 11000
                ]
            ],
            'market' => [
                'averagePrices' => [
                    'carrots' => 15,
                    'tomatoes' => 12,
                    'potatoes' => 8,
                    'wheat' => 25
                ],
                'trends' => [
                    'carrots' => '+8%',
                    'tomatoes' => '+12%',
                    'potatoes' => '-3%',
                    'wheat' => '+5%'
                ]
            ],
            'efficiency' => [
                'waterUsage' => 85,
                'fertilizerUsage' => 92,
                'cropYield' => 78,
                'overall' => 85
            ]
        ]);
    }
}
