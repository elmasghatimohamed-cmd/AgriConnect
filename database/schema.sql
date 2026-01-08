

CREATE DATABASE IF NOT EXISTS AXOM


CREATE TABLE buyers (
    id INT AUTO_INCREMENT PRIMARY KEY,

    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,

    company_name VARCHAR(150) NOT NULL,
    activity_type VARCHAR(100) NOT NULL,
    registration_number VARCHAR(100) NOT NULL,
    monthly_volume VARCHAR(100),
    delivery_address TEXT NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sellers (
    id INT AUTO_INCREMENT PRIMARY KEY,

    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,

    farm_type VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    farm_address TEXT NOT NULL,
    production_capacity VARCHAR(255),

    certifications JSON NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
axom