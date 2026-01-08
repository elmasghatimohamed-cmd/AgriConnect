<?php

namespace Pc\AgriConnect\Controllers;

use Pc\AgriConnect\Core\BaseController;

class AuthController extends BaseController {
    public function showLogin(): void {
        // Rediriger si déjà connecté
        if ($this->isLoggedIn()) {
            $this->redirect('/dashboard');
            return;
        }
        
        $this->render('auth.login', [
            'pageTitle' => 'Connexion - AgriConnect'
        ]);
    }

    public function login(): void {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $userType = $_POST['user_type'] ?? 'farmer';

        if (empty($email) || empty($password)) {
            $this->flash('error', 'Veuillez remplir tous les champs');
            $this->redirect('/login');
            return;
        }

        // Simuler une connexion réussie (en réalité, vérifier dans la base de données)
        $this->setSession('user', [
            'name' => 'Utilisateur Test', // Normalement récupéré de la base de données
            'email' => $email,
            'type' => $userType,
            'logged_in' => true
        ]);

        $this->flash('success', 'Connexion réussie!');
        $this->redirect('/dashboard');
    }

    public function showFarmerRegister(): void {
        // Rediriger si déjà connecté
        if ($this->isLoggedIn()) {
            $this->redirect('/dashboard');
            return;
        }
        
        $this->render('auth.register-farmer', [
            'pageTitle' => 'Inscription Agriculteur - AgriConnect'
        ]);
    }

    public function showBuyerRegister(): void {
        // Rediriger si déjà connecté
        if ($this->isLoggedIn()) {
            $this->redirect('/dashboard');
            return;
        }
        
        $this->render('auth.register-buyer', [
            'pageTitle' => 'Inscription Acheteur - AgriConnect'
        ]);
    }

    public function registerFarmer(): void {
        $firstName = $_POST['first_name'] ?? '';
        $lastName = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $password = $_POST['password'] ?? '';
        $farmType = $_POST['farm_type'] ?? '';
        $city = $_POST['city'] ?? '';
        $farmAddress = $_POST['farm_address'] ?? '';

        if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
            $this->flash('error', 'Veuillez remplir tous les champs obligatoires');
            $this->redirect('/register/farmer');
            return;
        }

        $this->setSession('user', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'type' => 'farmer',
            'farm_type' => $farmType,
            'city' => $city,
            'farm_address' => $farmAddress,
            'logged_in' => true
        ]);

        $this->flash('success', 'Inscription réussie! Bienvenue sur AgriConnect');
        $this->redirect('/dashboard');
    }

    public function registerBuyer(): void {
        $firstName = $_POST['first_name'] ?? '';
        $lastName = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $password = $_POST['password'] ?? '';
        $companyName = $_POST['company_name'] ?? '';
        $activityType = $_POST['activity_type'] ?? '';
        $registrationNumber = $_POST['registration_number'] ?? '';
        $deliveryAddress = $_POST['delivery_address'] ?? '';

        if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($companyName)) {
            $this->flash('error', 'Veuillez remplir tous les champs obligatoires');
            $this->redirect('/register/buyer');
            return;
        }

        $this->setSession('user', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'type' => 'buyer',
            'company_name' => $companyName,
            'activity_type' => $activityType,
            'registration_number' => $registrationNumber,
            'delivery_address' => $deliveryAddress,
            'logged_in' => true
        ]);

        $this->flash('success', 'Inscription réussie! Bienvenue sur AgriConnect');
        $this->redirect('/dashboard');
    }

    public function logout(): void {
        session_destroy();
        $this->redirect('/login');
    }
}

