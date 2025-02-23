CREATE DATABASE boutique_raclette;

USE boutique_raclette;

CREATE TABLE commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produit VARCHAR(255) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    message TEXT NOT NULL,
    date_commande TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);