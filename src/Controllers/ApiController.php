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
}
