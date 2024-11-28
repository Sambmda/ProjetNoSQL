CREATE TABLE IF NOT EXISTS clients (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    login VARCHAR(100) UNIQUE,
    adresse VARCHAR(255),
    telephone VARCHAR(20),
    email VARCHAR(100)
);