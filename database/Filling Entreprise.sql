INSERT INTO Entreprise (Nom_Ent, Type_Ent, Nb_postulant, Evaluation, ID_Pilote, ID_City, ID_Admin)
VALUES
('TechCorp', 'Technologie', 50, 4.5, 4, 1, 1), -- Entreprise pilotée par Pilote 4, située à Aix-en-Provence, gérée par Admin 1
('FinancePlus', 'Finance', 30, 4.0, 2, 2, 1), -- Entreprise pilotée par Pilote 2, située à Angoulême, gérée par Admin 1
('MediHealth', 'Santé', 40, 4.2, NULL, 3, 3), -- Entreprise non assignée à un pilote, située à Arras, gérée par Admin 3
('BuildIt', 'Construction', 20, 3.8, NULL, 4, 3), -- Entreprise non assignée à un pilote, située à Bordeaux, gérée par Admin 3
('FashionTrend', 'Mode', 25, 4.1, 2, 5, 1), -- Entreprise pilotée par Pilote 2, située à Brest, gérée par Admin 1
('FoodDelight', 'Restauration', 35, 4.3, 2, 6, 1), -- Entreprise pilotée par Pilote 2, située à Caen, gérée par Admin 1
('GreenEnergy', 'Énergie renouvelable', 15, 3.7, 2, 7, NULL), -- Entreprise pilotée par Pilote 2, située à Dijon, pas de gestionnaire admin pour le moment
('TravelWorld', 'Tourisme', 30, 4.4, 4, 8, NULL); -- Entreprise pilotée par Pilote 4, située à Grenoble, pas de gestionnaire admin pour le moment
