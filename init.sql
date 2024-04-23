-- Création de la base de données aws_p3_g1
CREATE DATABASE IF NOT EXISTS aws_p3_g1;

-- Utilisation de la base de données aws_p3_g1
USE aws_p3_g1;

-- Création de la table personnes
CREATE TABLE IF NOT EXISTS personne (
    matricule INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    date_naiss DATE,
    lieu VARCHAR(255),
    adress VARCHAR(255),
    email VARCHAR(255),
    telephone VARCHAR(255)
);
-- Insertion d'une personne dans la table personnes
INSERT INTO personne (prenom, nom, date_naiss, lieu, adress, email,telephone) 
VALUES ('Sop', 'Dia', '2000-10-10', 'Dakar','Colobane', 'sopd479@gmail.com','+221772178022');
