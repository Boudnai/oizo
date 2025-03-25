CREATE TABLE Utilisateur(
   idUtilisateur INT AUTO_INCREMENT,
   nom VARCHAR(150),
   PrenomUtilisateur VARCHAR(150),
   Email VARCHAR(150),
   mdp VARCHAR(50),
   PRIMARY KEY(idUtilisateur)
);

CREATE TABLE Spectacle(
   idSpectacle INT AUTO_INCREMENT,
   nbSpectateursMax INT,
   titre VARCHAR(50),
   libelle VARCHAR(500),
   prix DECIMAL(15,2),
   PRIMARY KEY(idSpectacle)
);

CREATE TABLE Oiseau(
   idOiseau INT AUTO_INCREMENT,
   nom VARCHAR(50),
   espece VARCHAR(50),
   taille DECIMAL(15,2),
   typeO VARCHAR(50),
   imageO VARCHAR(50),
   idSpectacle INT NULL,
   PRIMARY KEY(idOiseau),
   FOREIGN KEY(idSpectacle) REFERENCES Spectacle(idSpectacle)
);

CREATE TABLE Panier(
   idPanier INT AUTO_INCREMENT,
   idUtilisateur INT NOT NULL,
   PRIMARY KEY(idPanier),
   UNIQUE(idUtilisateur),
   FOREIGN KEY(idUtilisateur) REFERENCES Utilisateur(idUtilisateur)
);

CREATE TABLE s_inscrire(
   idUtilisateur INT,
   idSpectacle INT,
   PRIMARY KEY(idUtilisateur, idSpectacle),
   FOREIGN KEY(idUtilisateur) REFERENCES Utilisateur(idUtilisateur),
   FOREIGN KEY(idSpectacle) REFERENCES Spectacle(idSpectacle)
);

CREATE TABLE contenir(
   idSpectacle INT,
   idPanier INT,
   nbPlaces INT,
   PRIMARY KEY(idSpectacle, idPanier),
   FOREIGN KEY(idSpectacle) REFERENCES Spectacle(idSpectacle),
   FOREIGN KEY(idPanier) REFERENCES Panier(idPanier)
);

INSERT INTO Utilisateur (nom, PrenomUtilisateur, Email, mdp) VALUES ('Admin', 'Admin', 'admin@gmail.com', 'admin');
INSERT INTO Utilisateur (nom, PrenomUtilisateur, Email, mdp) VALUES ('Dupont', 'Jean', 'jean.dupont@example.com', 'motdepasse123');
SET @idUtilisateur = LAST_INSERT_ID();

INSERT INTO Spectacle (nbSpectateursMax, titre, libelle, prix) VALUES (100, 'Spectacle de rapaces', 'Un show impressionnant avec des rapaces.', 20.00);
INSERT INTO Spectacle (nbSpectateursMax, titre, libelle, prix) VALUES(80, "Spectacle d'oiseaux exotiques", 'Découvrez des espèces rares et colorées.', 25.00);
INSERT INTO Spectacle (nbSpectateursMax, titre, libelle, prix) VALUES(90, 'Show aquatique', 'Les oiseaux aquatiques en action.', 22.50);
SET @idSpectacle1 = LAST_INSERT_ID() - 2;
SET @idSpectacle2 = LAST_INSERT_ID() - 1;
SET @idSpectacle3 = LAST_INSERT_ID();

INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Aigle Royal', 'Aquila chrysaetos', 2.3, 'rapace diurne', @idSpectacle1)
INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Faucon Pèlerin', 'Falco peregrinus', 1.2, 'rapace diurne', @idSpectacle1);
INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Buse Variable', 'Buteo buteo', 1.1, 'rapace diurne', @idSpectacle1);

INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Chouette Effraie', 'Tyto alba', 0.9, 'rapace nocturne', @idSpectacle1);
INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Hibou Grand-Duc', 'Bubo bubo', 1.5, 'rapace nocturne', @idSpectacle1);
INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Petit Duc Scops', 'Otus scops', 0.7, 'rapace nocturne', @idSpectacle1);

INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Perroquet Ara', 'Ara macao', 1.0, 'exotiques', @idSpectacle2);
INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Cacatoès', 'Cacatua galerita', 0.9, 'exotiques', @idSpectacle2);
INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Toucan', 'Ramphastos toco', 1.1, 'exotiques', @idSpectacle2);

INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Cygne Tuberculé', 'Cygnus olor', 1.5, 'aquatiques', @idSpectacle3);
INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Canard Mandarin', 'Aix galericulata', 0.5, 'aquatiques', @idSpectacle3);
INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Héron Cendré', 'Ardea cinerea', 1.2, 'aquatiques', @idSpectacle3);

INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Moineau Domestique', 'Passer domesticus', 0.3, 'passereaux', NULL);
INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Rouge-gorge', 'Erithacus rubecula', 0.4, 'passereaux', NULL);
INSERT INTO Oiseau (nom, espece, taille, typeO, idSpectacle) VALUES('Mésange Bleue', 'Cyanistes caeruleus', 0.3, 'passereaux', NULL);

INSERT INTO Panier (idUtilisateur) VALUES (@idUtilisateur);