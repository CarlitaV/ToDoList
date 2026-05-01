

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150)NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tache (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    statut ENUM('a_faire','en_cours','termine') DEFAULT 'a_faire',
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,

    utilisateur_id INT,

    CONSTRAINT fk_utilisateur
    FOREIGN KEY (utilisateur_id)
    REFERENCES utilisateur(id)
    ON DELETE CASCADE
);

CREATE TABLE statistique(
    id INT AUTO_INCREMENT PRIMARY KEY,
    taches_creees INT DEFAULT 0,
    taches_terminees INT DEFAULT 0,
    date_mise_a_jour DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO utilisateur (nom, email, mot_de_passe)
VALUES ('Jana Lou', 'JanaLou@mail.com', '123456');

INSERT INTO tache (titre, description, statut, utilisateur_id)
VALUES
('Faire le projet', 'mettre en place environnement de travail','a_faire', 1),
('Créer UI','Faire le design', 'en_cours', 1),
('Tester app', 'Corriger bug','termine',1);