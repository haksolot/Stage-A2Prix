-- Ajout des étudiants avec références aux administrateurs et aux pilotes
INSERT INTO Étudiant (ID_Student, Annee_Formation, ID_Promotion, ID_Pilote, ID_Admin)
VALUES
(5, 'Première année', 1, 4, 1), -- Étudiant associé à l'admin 1 et au pilote 4
(6, 'Deuxième année', 2, 4, 1), -- Étudiant associé à l'admin 1 et au pilote 4
(7, 'Troisième année', 1, 2, 3), -- Étudiant associé à l'admin 3 et au pilote 2
(8, 'Première année', 2, 2, 3), -- Étudiant associé à l'admin 3 et au pilote 2
(9, 'Deuxième année', 1, NULL, 1), -- Étudiant associé uniquement à l'admin 1
(10, 'Troisième année', 2, NULL, 3); -- Étudiant associé uniquement à l'admin 3
