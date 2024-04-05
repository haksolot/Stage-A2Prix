INSERT INTO Utilisateur (Nom_user, Prenom_user, Password, Login)
VALUES
('Dupont', 'Jean', 'Mdp123', 'jean.dupont'),
('Martin', 'Sophie', 'Pass456', 'sophie.martin'),
('Lefebvre', 'Pierre', 'Secret789', 'pierre.lefebvre'),
('Durand', 'Marie', 'Secure321', 'marie.durand'),
('Petit', 'Paul', 'Safe987', 'paul.petit'),
('Moreau', 'Julie', 'Password123', 'julie.moreau'),
('Simon', 'Thomas', 'SecurePassword', 'thomas.simon'),
('Laurent', 'Catherine', 'SecretPass', 'catherine.laurent'),
('Leroy', 'Nicolas', 'SafePassword', 'nicolas.leroy'),
('Roux', 'Isabelle', 'PasswordSafe', 'isabelle.roux'),
('Fournier', 'David', 'SecurePass123', 'david.fournier'),
('Garcia', 'Christine', 'SafePass456', 'christine.garcia'),
('Michel', 'François', 'Password1234', 'francois.michel'),
('Lefevre', 'Sandrine', 'SecurePass1234', 'sandrine.lefevre'),
('Gauthier', 'Philippe', 'SafePassword123', 'philippe.gauthier'),
('Lefort', 'Nathalie', 'PassSecure123', 'nathalie.lefort'),
('André', 'Sylvie', 'Secure123Password', 'sylvie.andre'),
('Marchand', 'Éric', 'PasswordSecure123', 'eric.marchand'),
('Dumont', 'Valérie', 'Secure123Password', 'valerie.dumont'),
('Meunier', 'Patrick', 'Safe123Password', 'patrick.meunier');

-- Insertion des régions
INSERT INTO région (ID_Region, Nom_Reg) VALUES
(1, 'Auvergne-Rhône-Alpes'),
(2, 'Bourgogne-Franche-Comté'),
(3, 'Bretagne'),
(4, 'Centre-Val de Loire'),
(5, 'Corse'),
(6, 'Grand Est'),
(7, 'Hauts-de-France'),
(8, 'Île-de-France'),
(9, 'Normandie'),
(10, 'Nouvelle-Aquitaine'),
(11, 'Occitanie'),
(12, 'Pays de la Loire'),
(13, 'Provence-Alpes-Côte d''Azur');

-- Insertion des départements
INSERT INTO département (ID_Department, Nom_Dep, Num_Dep, ID_Region) VALUES
(1, 'Ain', '01', 1),
(2, 'Aisne', '02', 7),
(3, 'Allier', '03', 6),
(4, 'Alpes-de-Haute-Provence', '04', 13),
(5, 'Hautes-Alpes', '05', 13),
(6, 'Alpes-Maritimes', '06', 13),
(7, 'Ardèche', '07', 1),
(8, 'Ardennes', '08', 6),
(9, 'Ariège', '09', 11),
(10, 'Aube', '10', 6),
(11, 'Aude', '11', 11),
(12, 'Aveyron', '12', 11),
(13, 'Bouches-du-Rhône', '13', 13),
(14, 'Calvados', '14', 9),
(15, 'Cantal', '15', 6),
(16, 'Charente', '16', 10),
(17, 'Charente-Maritime', '17', 10),
(18, 'Cher', '18', 4),
(19, 'Corrèze', '19', 11),
(20, 'Côte-d''Or', '21', 2),
(21, 'Côtes-d''Armor', '22', 3),
(22, 'Creuse', '23', 11),
(23, 'Dordogne', '24', 10),
(24, 'Doubs', '25', 2),
(25, 'Drôme', '26', 1),
(26, 'Eure', '27', 8),
(27, 'Eure-et-Loir', '28', 4),
(28, 'Finistère', '29', 3),
(29, 'Corse-du-Sud', '2A', 5),
(30, 'Haute-Corse', '2B', 5),
(31, 'Gard', '30', 11),
(32, 'Haute-Garonne', '31', 11),
(33, 'Gers', '32', 11),
(34, 'Gironde', '33', 10),
(35, 'Hérault', '34', 11),
(36, 'Ille-et-Vilaine', '35', 3),
(37, 'Indre', '36', 4),
(38, 'Indre-et-Loire', '37', 4),
(39, 'Isère', '38', 1),
(40, 'Jura', '39', 2),
(41, 'Landes', '40', 10),
(42, 'Loir-et-Cher', '41', 4),
(43, 'Loire', '42', 1),
(44, 'Haute-Loire', '43', 1),
(45, 'Loire-Atlantique', '44', 12),
(46, 'Loiret', '45', 4),
(47, 'Lot', '46', 11),
(48, 'Lot-et-Garonne', '47', 10),
(49, 'Lozère', '48', 11),
(50, 'Maine-et-Loire', '49', 12),
(51, 'Manche', '50', 9),
(52, 'Marne', '51', 6),
(53, 'Haute-Marne', '52', 6),
(54, 'Mayenne', '53', 12),
(55, 'Meurthe-et-Moselle', '54', 6),
(56, 'Meuse', '55', 6),
(57, 'Morbihan', '56', 3),
(58, 'Moselle', '57', 6),
(59, 'Nièvre', '58', 2),
(60, 'Nord', '59', 7),
(61, 'Oise', '60', 7),
(62, 'Orne', '61', 9),
(63, 'Pas-de-Calais', '62', 7),
(64, 'Puy-de-Dôme', '63', 6),
(65, 'Pyrénées-Atlantiques', '64', 10),
(66, 'Hautes-Pyrénées', '65', 11),
(67, 'Pyrénées-Orientales', '66', 11),
(68, 'Bas-Rhin', '67', 6),
(69, 'Haut-Rhin', '68', 6),
(70, 'Rhône', '69', 1),
(71, 'Haute-Saône', '70', 2),
(72, 'Saône-et-Loire', '71', 2),
(73, 'Sarthe', '72', 12),
(74, 'Savoie', '73', 1),
(75, 'Haute-Savoie', '74', 1),
(76, 'Paris', '75', 8),
(77, 'Seine-Maritime', '76', 9),
(78, 'Seine-et-Marne', '77', 8),
(79, 'Yvelines', '78', 8),
(80, 'Deux-Sèvres', '79', 12),
(81, 'Somme', '80', 7),
(82, 'Tarn', '81', 11),
(83, 'Tarn-et-Garonne', '82', 11),
(84, 'Var', '83', 13),
(85, 'Vaucluse', '84', 13),
(86, 'Vendée', '85', 12),
(87, 'Vienne', '86', 10),
(88, 'Haute-Vienne', '87', 11),
(89, 'Vosges', '88', 6),
(90, 'Yonne', '89', 2),
(91, 'Territoire de Belfort', '90', 6),
(92, 'Essonne', '91', 8),
(93, 'Hauts-de-Seine', '92', 8),
(94, 'Seine-Saint-Denis', '93', 8),
(95, 'Val-de-Marne', '94', 8),
(96, 'Val-d''Oise', '95', 8);

-- Ajout des administrateurs
INSERT INTO Admin (ID_Admin)
VALUES
(1), -- Utilisateur existant avec ID_User 1
(3); -- Utilisateur existant avec ID_User 3

-- Ajout des pilotes
INSERT INTO Pilote (ID_Pilote, ID_Admin)
VALUES
(2, 1), -- Utilisateur existant avec ID_User 2, lié à l'admin avec ID_Admin 1
(4, 3); -- Utilisateur existant avec ID_User 4, lié à l'admin avec ID_Admin 3

INSERT INTO Secteur (Nom_Secteur)
VALUES
('Informatique'),
('Finance'),
('Santé'),
('Éducation'),
('Industrie'),
('Commerce'),
('Immobilier'),
('Tourisme'),
('Transport'),
('Art et Culture'),
('Agroalimentaire'),
('Énergie'),
('Environnement'),
('Services'),
('Télécommunications'),
('Mode et Beauté'),
('Sport et Loisirs'),
('Média'),
('Juridique'),
('Consulting');

INSERT INTO Ville (Nom_Ville, CP, ID_Departement)
VALUES
('Aix-en-Provence', 13090, 13), -- Bouches-du-Rhône
('Angoulême', 16000, 16), -- Charente
('Arras', 62000, 62), -- Pas-de-Calais
('Bordeaux', 33000, 33), -- Gironde
('Brest', 29200, 29), -- Finistère
('Caen', 14000, 14), -- Calvados
('Dijon', 21000, 21), -- Côte-d'Or
('Grenoble', 38000, 38), -- Isère
('La Rochelle', 17000, 17), -- Charente-Maritime
('Le Mans', 72000, 72), -- Sarthe
('Lille', 59000, 59), -- Nord
('Lyon', 69000, 69), -- Rhône
('Montpellier', 34000, 34), -- Héraultville
('Nancy', 54000, 54), -- Meurthe-et-Moselle
('Nantes', 44000, 44), -- Loire-Atlantique
('Nice', 06000, 6), -- Alpes-Maritimes
('Orléans', 45000, 45), -- Loiret
('Paris', 75000, 75), -- Paris
('Paris', 92000, 92), -- Hauts-de-Seine
('Pau', 64000, 64), -- Pyrénées-Atlantiques
('Reims', 51100, 51), -- Marne
('Rouen', 76000, 76), -- Seine-Maritime
('Saint-Nazaire', 44600, 44), -- Loire-Atlantique
('Strasbourg', 67000, 67), -- Bas-Rhin
('Toulouse', 31000, 31); -- Haute-Garonne

INSERT INTO Ville (Nom_Ville, CP, ID_Departement)
VALUES
('Marseille', 13000, 13), -- Bouches-du-Rhône
('Toulon', 83000, 83), -- Var
('Nîmes', 30000, 30), -- Gard
('Avignon', 84000, 84), -- Vaucluse
('Rennes', 35000, 35), -- Ille-et-Vilaine
('Saint-Étienne', 42000, 42), -- Loire
('Limoges', 87000, 87), -- Haute-Vienne
('Angers', 49000, 49), -- Maine-et-Loire
('Biarritz', 64200, 64), -- Pyrénées-Atlantiques
('Metz', 57000, 57), -- Moselle
('Mulhouse', 68100, 68), -- Haut-Rhin
('Tours', 37000, 37), -- Indre-et-Loire
('Besançon', 25000, 25), -- Doubs
('Clermont-Ferrand', 63000, 63), -- Puy-de-Dôme
('Lorient', 56100, 56), -- Morbihan
('Perpignan', 66000, 66), -- Pyrénées-Orientales
('Amiens', 80000, 80), -- Somme
('Béziers', 34500, 34), -- Hérault
('Annecy', 74000, 74), -- Haute-Savoie
('Bayonne', 64100, 64); -- Pyrénées-Atlantiques

INSERT INTO Localisation (Adresse, ID_Ville)
VALUES
('1 Rue de la Liberté', 1), -- Aix-en-Provence
('25 Rue des Fleurs', 2), -- Angoulême
('10 Avenue des Roses', 3), -- Arras
('5 Place du Commerce', 4), -- Bordeaux
('15 Rue de la Mer', 5), -- Brest
('30 Boulevard des Arts', 6), -- Caen
('12 Rue de la République', 7), -- Dijon
('8 Rue des Montagnes', 8), -- Grenoble
('20 Rue des Coquelicots', 9), -- La Rochelle
('7 Rue de la Gare', 10), -- Le Mans
('3 Avenue de la Paix', 11), -- Lille
('14 Rue du Bonheur', 12), -- Lyon
('50 Boulevard des Oliviers', 13), -- Montpellier
('9 Place de la Mairie', 14), -- Nancy
('2 Rue des Cerisiers', 15), -- Nantes
('18 Avenue du Soleil', 16), -- Nice
('6 Rue de la Liberté', 17), -- Orléans
('1 Avenue des Champs-Élysées', 18), -- Paris
('25 Rue de la Défense', 18), -- Paris
('10 Boulevard Pasteur', 19), -- Pau
('5 Rue des Vignes', 20), -- Reims
('22 Rue de la Seine', 21), -- Rouen
('11 Rue des Étoiles', 22), -- Saint-Nazaire
('17 Rue de la Cathédrale', 23), -- Strasbourg
('3 Avenue du Midi', 24); -- Toulouse

INSERT INTO Localisation (Adresse, ID_Ville)
VALUES
('5 Avenue de la Mer', 25), -- Marseille
('10 Rue des Oliviers', 26), -- Toulon
('15 Rue des Roses', 27), -- Nîmes
('20 Boulevard du Pont', 28), -- Avignon
('3 Rue de la Liberté', 29), -- Rennes
('8 Avenue de la République', 30), -- Saint-Étienne
('12 Rue de la Paix', 31), -- Limoges
('22 Avenue des Acacias', 32), -- Angers
('7 Rue du Port', 33), -- Biarritz
('11 Rue de la Cathédrale', 34), -- Metz
('16 Rue du Marché', 35), -- Mulhouse
('18 Rue de la Poste', 36), -- Tours
('25 Rue des Champs', 37), -- Besançon
('30 Boulevard Voltaire', 38), -- Clermont-Ferrand
('5 Rue de la Plage', 39), -- Lorient
('10 Rue du Théâtre', 40), -- Perpignan
('15 Rue de la Gare', 41), -- Amiens
('20 Avenue des Vignes', 42), -- Béziers
('3 Place de la Liberté', 43), -- Annecy
('9 Rue de la Mairie', 44); -- Bayonne

INSERT INTO Centre (Nom_Centre, ID_City)
VALUES
('CESI Aix-en-Provence', 1), -- Aix-en-Provence
('CESI Angoulême', 2), -- Angoulême
('CESI Arras', 3), -- Arras
('CESI Bordeaux', 4), -- Bordeaux
('CESI Brest', 5), -- Brest
('CESI Caen', 6), -- Caen
('CESI Dijon', 7), -- Dijon
('CESI Grenoble', 8), -- Grenoble
('CESI La Rochelle', 9), -- La Rochelle
('CESI Le Mans', 10), -- Le Mans
('CESI Lille', 11), -- Lille
('CESI Lyon', 12), -- Lyon
('CESI Montpellier', 13), -- Montpellier
('CESI Nancy', 14), -- Nancy
('CESI Nantes', 15), -- Nantes
('CESI Nice', 16), -- Nice
('CESI Orléans', 17), -- Orléans
('CESI Paris-La Défense', 18), -- Paris (La Défense)
('CESI Paris-Nanterre', 18), -- Paris (Nanterre)
('CESI Pau', 19), -- Pau
('CESI Reims', 20), -- Reims
('CESI Rouen', 21), -- Rouen
('CESI Saint-Nazaire', 22), -- Saint-Nazaire
('CESI Strasbourg', 23), -- Strasbourg
('CESI Toulouse', 24); -- Toulouse

INSERT INTO Promotion (Nom_Promo, ID_Pilote, ID_Formation)
VALUES
('Promotion 2023A', 2, 1), -- Promouvoir par le pilote 1 au centre de formation 1
('Promotion 2023B', 2, 2), -- Promouvoir par le pilote 1 au centre de formation 2
('Promotion 2024A', 4, 3), -- Promouvoir par le pilote 2 au centre de formation 3
('Promotion 2024B', 4, 4); -- Promouvoir par le pilote 2 au centre de formation 4

INSERT INTO Entreprise (Nom_Ent, Type_Ent, Nb_postulant, Evaluation, Description, Numero_SIRET, Forme_Juridique, Capital_Social, Hébergeur, ID_Pilote, ID_City, ID_Admin)
VALUES
('TechCorp', 'Technologie', 50, 4.5, 'TechCorp - là où les robots prennent leur café et discutent des meilleures stratégies pour conquérir le monde.', '01234567890123', 'SARL', 100000.00, 'AWS', 4, 1, 1), -- Entreprise pilotée par Pilote 4, située à Aix-en-Provence, gérée par Admin 1
('FinancePlus', 'Finance', 30, 4.0, 'FinancePlus - où les chiffres dansent sur des feuilles de calcul et les dollars sont des rois.', '12345678901234', 'SA', 200000.00, 'Azure', 2, 2, 1), -- Entreprise pilotée par Pilote 2, située à Angoulême, gérée par Admin 1
('MediHealth', 'Santé', 40, 4.2, 'MediHealth - parce que même nos stéthoscopes ont besoin de câlins de temps en temps.', '23456789012345', 'SAS', 150000.00, 'Google Cloud', NULL, 3, 3), -- Entreprise non assignée à un pilote, située à Arras, gérée par Admin 3
('BuildIt', 'Construction', 20, 3.8, 'BuildIt - où nos marteaux chantent en harmonie avec le bruit des bulldozers.', '34567890123456', 'EURL', 120000.00, 'IBM Cloud', NULL, 4, 3), -- Entreprise non assignée à un pilote, située à Bordeaux, gérée par Admin 3
('FashionTrend', 'Mode', 25, 4.1, 'FashionTrend - là où chaque tissu a une histoire à raconter et chaque couture est une aventure.', '45678901234567', 'SARL', 180000.00, 'AWS', 2, 5, 1), -- Entreprise pilotée par Pilote 2, située à Brest, gérée par Admin 1
('FoodDelight', 'Restauration', 35, 4.3, 'FoodDelight - où chaque plat est un poème et chaque repas est une symphonie de saveurs.', '56789012345678', 'SA', 250000.00, 'Azure', 2, 6, 1), -- Entreprise pilotée par Pilote 2, située à Caen, gérée par Admin 1
('GreenEnergy', 'Énergie renouvelable', 15, 3.7, 'GreenEnergy - où même nos panneaux solaires prennent des pauses pour admirer le ciel.', '67890123456789', 'SAS', 300000.00, 'Google Cloud', 2, 7, NULL), -- Entreprise pilotée par Pilote 2, située à Dijon, pas de gestionnaire admin pour le moment
('TravelWorld', 'Tourisme', 30, 4.4, 'TravelWorld - où chaque billet d avion est un ticket pour l aventure et chaque destination est un nouveau chapitre.', '78901234567890', 'SA', 400000.00, 'IBM Cloud', 4, 8, NULL); -- Entreprise pilotée par Pilote 4, située à Grenoble, pas de gestionnaire admin pour le moment

INSERT INTO Stage (Compétences, Durre, Type_Promo, Remuneration, Places, Nb_Postulants, Date_Parution, Notation, ID_Entreprise)
VALUES
('Développement web', '3 mois', 'Stage ingénieur', 1500.00, 3, 0, '2024-03-10', NULL, 1), -- Stage offert par TechCorp
('Gestion financière', '6 mois', 'Stage de fin d''études', 2000.00, 2, 0, '2024-04-15', NULL, 2), -- Stage offert par FinancePlus
('Soins infirmiers', '4 mois', 'Stage infirmier', 1200.00, 5, 0, '2024-03-20', NULL, 3), -- Stage offert par MediHealth
('Architecture', '5 mois', 'Stage architecte', 1800.00, 4, 0, '2024-03-25', NULL, 4), -- Stage offert par BuildIt
('Stylisme', '3 mois', 'Stage designer', 1300.00, 3, 0, '2024-04-05', NULL, 5), -- Stage offert par FashionTrend
('Cuisine française', '2 mois', 'Stage cuisine', 1000.00, 2, 0, '2024-03-15', NULL, 6), -- Stage offert par FoodDelight
('Énergies renouvelables', '6 mois', 'Stage ingénieur', 2000.00, 3, 0, '2024-04-01', NULL, 7), -- Stage offert par GreenEnergy
('Guides touristiques', '3 mois', 'Stage tourisme', 1500.00, 4, 0, '2024-03-28', NULL, 8), -- Stage offert par TravelWorld
('Développement mobile', '4 mois', 'Stage ingénieur', 1600.00, 3, 0, '2024-03-12', NULL, 1), -- Stage offert par TechCorp
('Analyse financière', '5 mois', 'Stage de fin d''études', 1800.00, 2, 0, '2024-04-18', NULL, 2), -- Stage offert par FinancePlus
('Soins pédiatriques', '3 mois', 'Stage infirmier', 1300.00, 5, 0, '2024-03-22', NULL, 3), -- Stage offert par MediHealth
('Design urbain', '6 mois', 'Stage architecte', 2200.00, 4, 0, '2024-03-30', NULL, 4), -- Stage offert par BuildIt
('Marketing de la mode', '3 mois', 'Stage marketing', 1400.00, 3, 0, '2024-04-08', NULL, 5), -- Stage offert par FashionTrend
('Cuisine asiatique', '2 mois', 'Stage cuisine', 1100.00, 2, 0, '2024-03-18', NULL, 6), -- Stage offert par FoodDelight
('Gestion de l''eau', '6 mois', 'Stage ingénieur', 1900.00, 3, 0, '2024-04-05', NULL, 7), -- Stage offert par GreenEnergy
('Guides de voyage', '3 mois', 'Stage tourisme', 1600.00, 4, 0, '2024-03-31', NULL, 8), -- Stage offert par TravelWorld
('Développement logiciel', '4 mois', 'Stage ingénieur', 1700.00, 3, 0, '2024-03-14', NULL, 1), -- Stage offert par TechCorp
('Planification financière', '5 mois', 'Stage de fin d''études', 2000.00, 2, 0, '2024-04-20', NULL, 2), -- Stage offert par FinancePlus
('Soins gériatriques', '3 mois', 'Stage infirmier', 1400.00, 5, 0, '2024-03-24', NULL, 3), -- Stage offert par MediHealth
('Architecture intérieure', '6 mois', 'Stage architecte', 2400.00, 4, 0, '2024-04-02', NULL, 4); -- Stage offert par BuildIt

-- Ajout des étudiants avec références aux administrateurs et aux pilotes
INSERT INTO Étudiant (ID_Student, Annee_Formation, ID_Promotion, ID_Pilote, ID_Admin)
VALUES
(5, 'Première année', 1, 4, 1), -- Étudiant associé à l'admin 1 et au pilote 4
(6, 'Deuxième année', 2, 4, 1), -- Étudiant associé à l'admin 1 et au pilote 4
(7, 'Troisième année',1, 2, 3), -- Étudiant associé à l'admin 3 et au pilote 2
(8, 'Première année', 2, 2, 3), -- Étudiant associé à l'admin 3 et au pilote 2
(9, 'Deuxième année', 1, NULL, 1), -- Étudiant associé uniquement à l'admin 1
(10, 'Troisième année', 2, NULL, 3); -- Étudiant associé uniquement à l'admin 3

