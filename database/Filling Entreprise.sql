INSERT INTO Entreprise (Nom_Ent, Type_Ent, Nb_postulant, Evaluation, Description, ID_Pilote, ID_City, ID_Admin)
VALUES
('TechCorp', 'Technologie', 50, 4.5, 'TechCorp - là où les robots prennent leur café et discutent des meilleures stratégies pour conquérir le monde.', 4, 1, 1), -- Entreprise pilotée par Pilote 4, située à Aix-en-Provence, gérée par Admin 1
('FinancePlus', 'Finance', 30, 4.0, 'FinancePlus - où les chiffres dansent sur des feuilles de calcul et les dollars sont des rois.', 2, 2, 1), -- Entreprise pilotée par Pilote 2, située à Angoulême, gérée par Admin 1
('MediHealth', 'Santé', 40, 4.2, 'MediHealth - parce que même nos stéthoscopes ont besoin de câlins de temps en temps.', NULL, 3, 3), -- Entreprise non assignée à un pilote, située à Arras, gérée par Admin 3
('BuildIt', 'Construction', 20, 3.8, 'BuildIt - où nos marteaux chantent en harmonie avec le bruit des bulldozers.', NULL, 4, 3), -- Entreprise non assignée à un pilote, située à Bordeaux, gérée par Admin 3
('FashionTrend', 'Mode', 25, 4.1, 'FashionTrend - là où chaque tissu a une histoire à raconter et chaque couture est une aventure.', 2, 5, 1), -- Entreprise pilotée par Pilote 2, située à Brest, gérée par Admin 1
('FoodDelight', 'Restauration', 35, 4.3, 'FoodDelight - où chaque plat est un poème et chaque repas est une symphonie de saveurs.', 2, 6, 1), -- Entreprise pilotée par Pilote 2, située à Caen, gérée par Admin 1
('GreenEnergy', 'Énergie renouvelable', 15, 3.7, 'GreenEnergy - où même nos panneaux solaires prennent des pauses pour admirer le ciel.', 2, 7, NULL), -- Entreprise pilotée par Pilote 2, située à Dijon, pas de gestionnaire admin pour le moment
('TravelWorld', 'Tourisme', 30, 4.4, 'TravelWorld - où chaque billet d avion est un ticket pour l aventure et chaque destination est un nouveau chapitre.', 4, 8, NULL); -- Entreprise pilotée par Pilote 4, située à Grenoble, pas de gestionnaire admin pour le moment
