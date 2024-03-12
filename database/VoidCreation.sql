CREATE TABLE Utilisateur(
   ID_User INT auto_increment,
   Nom_user VARCHAR(50) NOT NULL,
   Prenom_user VARCHAR(50) NOT NULL,
   Password VARCHAR(50) NOT NULL,
   Login VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_User)
);

CREATE TABLE Région(
   ID_Region INT auto_increment,
   Nom_Reg VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Region)
);

CREATE TABLE Secteur(
   ID_Compétences INT auto_increment,
   Nom_Secteur VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Compétences)
);

CREATE TABLE Admin(
   ID_Admin INT,
   PRIMARY KEY(ID_Admin),
   FOREIGN KEY(ID_Admin) REFERENCES Utilisateur(ID_User)
);

CREATE TABLE Pilote(
   ID_Pilote INT,
   ID_Admin INT NOT NULL,
   PRIMARY KEY(ID_Pilote),
   FOREIGN KEY(ID_Pilote) REFERENCES Utilisateur(ID_User),
   FOREIGN KEY(ID_Admin) REFERENCES Admin(ID_Admin)
);

CREATE TABLE Département(
   ID_Department INT auto_increment,
   Nom_Dep VARCHAR(50) NOT NULL,
   Num_Dep VARCHAR(50) NOT NULL,
   ID_Region INT NOT NULL,
   PRIMARY KEY(ID_Department),
   FOREIGN KEY(ID_Region) REFERENCES Région(ID_Region)
);

CREATE TABLE Ville(
	ID_Ville INT auto_increment,
	Nom_Ville VARCHAR(50) NOT NULL,
	CP INT NOT NULL,
    ID_Departement INT NOT NULL,
    PRIMARY KEY(ID_Ville),
    FOREIGN KEY(ID_Departement) REFERENCES Département(ID_Department)
);

CREATE TABLE Localisation(
   ID_City INT auto_increment,
   Adresse VARCHAR(50),
   ID_Ville INT NOT NULL,
   PRIMARY KEY(ID_City),
   FOREIGN KEY(ID_Ville) REFERENCES Ville(ID_Ville)
);

CREATE TABLE Centre(
   ID_Formation INT auto_increment,
   Nom_Centre VARCHAR(50) NOT NULL,
   ID_City INT NOT NULL,
   PRIMARY KEY(ID_Formation),
   FOREIGN KEY(ID_City) REFERENCES Localisation(ID_City)
);

CREATE TABLE Promotion(
   ID_Promotion INT auto_increment,
   Nom_Promo VARCHAR(50) NOT NULL,
   ID_Pilote INT NOT NULL,
   ID_Formation INT NOT NULL,
   PRIMARY KEY(ID_Promotion),
   FOREIGN KEY(ID_Pilote) REFERENCES Pilote(ID_Pilote),
   FOREIGN KEY(ID_Formation) REFERENCES Centre(ID_Formation)
);

CREATE TABLE Entreprise(
   ID_Entreprise INT auto_increment,
   Nom_Ent VARCHAR(50) NOT NULL,
   Type_Ent VARCHAR(50) NOT NULL,
   Nb_postulant INT NULL,
   Evaluation DECIMAL(2,1) NULL,
   Description VARCHAR(512) NOT NULL,
   Numero_SIRET VARCHAR(14) NOT NULL,
   Forme_Juridique VARCHAR(50) NOT NULL,
   Capital_Social DECIMAL(15,2) NOT NULL,
   Hébergeur VARCHAR(50) NOT NULL,
   ID_Pilote INT NULL,
   ID_City INT NOT NULL,
   ID_Admin INT NULL,
   PRIMARY KEY(ID_Entreprise),
   FOREIGN KEY(ID_Pilote) REFERENCES Pilote(ID_Pilote),
   FOREIGN KEY(ID_City) REFERENCES Localisation(ID_City),
   FOREIGN KEY(ID_Admin) REFERENCES Admin(ID_Admin)
);

CREATE TABLE Stage(
   ID_Stage INT auto_increment,
   Compétences VARCHAR(50) NOT NULL,
   Durre VARCHAR(50) NOT NULL,
   Type_Promo VARCHAR(50) NOT NULL,
   Remuneration DECIMAL(15,2) NOT NULL,
   Places INT NOT NULL,
   Nb_Postulants INT NOT NULL,
   Date_Parution DATE NOT NULL,
   Notation INT,
   ID_Entreprise INT NOT NULL,
   PRIMARY KEY(ID_Stage),
   FOREIGN KEY(ID_Entreprise) REFERENCES Entreprise(ID_Entreprise)
);

CREATE TABLE Étudiant(
   ID_Student INT,
   Annee_Formation VARCHAR(50) NOT NULL,
   ID_Pilote INT NULL,
   ID_Admin INT NULL,
   ID_Promotion INT NOT NULL,
   PRIMARY KEY(ID_Student),
   FOREIGN KEY(ID_Student) REFERENCES Utilisateur(ID_User),
   FOREIGN KEY(ID_Pilote) REFERENCES Pilote(ID_Pilote),
   FOREIGN KEY(ID_Admin) REFERENCES Admin(ID_Admin),
   FOREIGN KEY(ID_Promotion) REFERENCES Promotion(ID_Promotion)
);

CREATE TABLE Candidater(
   ID_Stage INT,
   ID_Student INT,
   CV VARCHAR(50) NOT NULL,
   Lettre_Motiv VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Stage, ID_Student),
   FOREIGN KEY(ID_Stage) REFERENCES Stage(ID_Stage),
   FOREIGN KEY(ID_Student) REFERENCES Étudiant(ID_Student)
);

CREATE TABLE Souhaiter(
   ID_Stage INT,
   ID_Student INT,
   Wishlist bool,
   PRIMARY KEY(ID_Stage, ID_Student),
   FOREIGN KEY(ID_Stage) REFERENCES Stage(ID_Stage),
   FOREIGN KEY(ID_Student) REFERENCES Étudiant(ID_Student)
);

CREATE TABLE Créer(
   ID_Entreprise INT,
   ID_Compétences INT,
   Date_Creation DATE NOT NULL,
   PRIMARY KEY(ID_Entreprise, ID_Compétences),
   FOREIGN KEY(ID_Entreprise) REFERENCES Entreprise(ID_Entreprise),
   FOREIGN KEY(ID_Compétences) REFERENCES Secteur(ID_Compétences)
);

CREATE TABLE EVE(
   ID_Entreprise INT,
   ID_Student INT,
   Note INT NOT NULL,
   PRIMARY KEY(ID_Entreprise, ID_Student),
   FOREIGN KEY(ID_Entreprise) REFERENCES Entreprise(ID_Entreprise),
   FOREIGN KEY(ID_Student) REFERENCES Étudiant(ID_Student)
);

CREATE TABLE EVA(
   ID_Entreprise INT,
   ID_Admin INT,
   Note INT NOT NULL,
   PRIMARY KEY(ID_Entreprise, ID_Admin),
   FOREIGN KEY(ID_Entreprise) REFERENCES Entreprise(ID_Entreprise),
   FOREIGN KEY(ID_Admin) REFERENCES Admin(ID_Admin)
);

CREATE TABLE EVP(
   ID_Entreprise INT,
   ID_Pilote INT,
   Note INT NOT NULL,
   PRIMARY KEY(ID_Entreprise, ID_Pilote),
   FOREIGN KEY(ID_Entreprise) REFERENCES Entreprise(ID_Entreprise),
   FOREIGN KEY(ID_Pilote) REFERENCES Pilote(ID_Pilote)
);
