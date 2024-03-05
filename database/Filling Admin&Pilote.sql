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
