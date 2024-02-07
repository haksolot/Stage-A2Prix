CREATE TABLE Utilisateur(
   ID_User VARCHAR(50),
   Nom_user VARCHAR(50) NOT NULL,
   Prenom_user VARCHAR(50) NOT NULL,
   Password VARCHAR(50) NOT NULL,
   Login VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_User)
);

CREATE TABLE Pilote_de_promotion(
   ID_User VARCHAR(50),
   Promo_Assigne VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_User),
   FOREIGN KEY(ID_User) REFERENCES Utilisateur(ID_User)
);

CREATE TABLE Administrateur(
   ID_User VARCHAR(50),
   PRIMARY KEY(ID_User),
   FOREIGN KEY(ID_User) REFERENCES Utilisateur(ID_User)
);

CREATE TABLE Région(
   ID_Region INT,
   Nom_Reg VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Region)
);

CREATE TABLE Formation(
   ID_Formation INT,
   Centre VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Formation)
);

CREATE TABLE Promotion(
   ID_Promotion INT,
   Nom_Promo VARCHAR(50) NOT NULL,
   ID_User VARCHAR(50) NOT NULL,
   ID_Formation INT NOT NULL,
   PRIMARY KEY(ID_Promotion),
   FOREIGN KEY(ID_User) REFERENCES Pilote_de_promotion(ID_User),
   FOREIGN KEY(ID_Formation) REFERENCES Formation(ID_Formation)
);

CREATE TABLE Compétences(
   ID_Compétences INT,
   Nom_de_la_compétence VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Compétences)
);

CREATE TABLE Étudiant(
   ID_User VARCHAR(50),
   Annee_Formation VARCHAR(50) NOT NULL,
   ID_Promotion INT NOT NULL,
   PRIMARY KEY(ID_User),
   FOREIGN KEY(ID_User) REFERENCES Utilisateur(ID_User),
   FOREIGN KEY(ID_Promotion) REFERENCES Promotion(ID_Promotion)
);

CREATE TABLE Département(
   ID_Department INT,
   Nom_Dep VARCHAR(50) NOT NULL,
   Num_Dep VARCHAR(50) NOT NULL,
   ID_Region INT NOT NULL,
   PRIMARY KEY(ID_Department),
   FOREIGN KEY(ID_Region) REFERENCES Région(ID_Region)
);

CREATE TABLE Localisation(
   ID_City INT,
   Nom_Ville VARCHAR(50) NOT NULL,
   Adresse VARCHAR(50),
   CP INT NOT NULL,
   ID_Department INT NOT NULL,
   PRIMARY KEY(ID_City),
   FOREIGN KEY(ID_Department) REFERENCES Département(ID_Department)
);

CREATE TABLE Entreprise(
   ID_Entreprise INT,
   Nom_Ent VARCHAR(50) NOT NULL,
   Type_Ent VARCHAR(50) NOT NULL,
   Nb_postulant INT NOT NULL,
   Evaluation DECIMAL(2,1) NOT NULL,
   ID_City INT NOT NULL,
   PRIMARY KEY(ID_Entreprise),
   FOREIGN KEY(ID_City) REFERENCES Localisation(ID_City)
);

CREATE TABLE Stage(
   ID_Stage VARCHAR(50),
   Compétences VARCHAR(50) NOT NULL,
   Durre VARCHAR(50) NOT NULL,
   Type_Promo VARCHAR(50) NOT NULL,
   Remuneration DECIMAL(15,2) NOT NULL,
   Places INT NOT NULL,
   Nb_Postulants INT NOT NULL,
   Date_Parution DATE NOT NULL,
   Notation INT,
   ID_Compétences INT NOT NULL,
   ID_Entreprise INT NOT NULL,
   PRIMARY KEY(ID_Stage),
   FOREIGN KEY(ID_Compétences) REFERENCES Compétences(ID_Compétences),
   FOREIGN KEY(ID_Entreprise) REFERENCES Entreprise(ID_Entreprise)
);

CREATE TABLE Candidature(
   ID_cand VARCHAR(50),
   CV VARCHAR(50) NOT NULL,
   Lettre_Motivation VARCHAR(50) NOT NULL,
   ID_User VARCHAR(50) NOT NULL,
   ID_Stage VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_cand),
   FOREIGN KEY(ID_User) REFERENCES Utilisateur(ID_User),
   FOREIGN KEY(ID_Stage) REFERENCES Stage(ID_Stage)
);

CREATE TABLE Souhaiter(
   ID_Stage VARCHAR(50),
   ID_User VARCHAR(50),
   Wishlist bool,
   PRIMARY KEY(ID_Stage, ID_User),
   FOREIGN KEY(ID_Stage) REFERENCES Stage(ID_Stage),
   FOREIGN KEY(ID_User) REFERENCES Étudiant(ID_User)
);

CREATE TABLE Evaluer(
   ID_Entreprise INT,
   ID_User VARCHAR(50),
   Note INT,
   PRIMARY KEY(ID_Entreprise, ID_User),
   FOREIGN KEY(ID_Entreprise) REFERENCES Entreprise(ID_Entreprise),
   FOREIGN KEY(ID_User) REFERENCES Utilisateur(ID_User)
);

CREATE TABLE Noter(
   ID_Stage VARCHAR(50),
   ID_User VARCHAR(50),
   Note INT,
   PRIMARY KEY(ID_Stage, ID_User),
   FOREIGN KEY(ID_Stage) REFERENCES Stage(ID_Stage),
   FOREIGN KEY(ID_User) REFERENCES Étudiant(ID_User)
);
