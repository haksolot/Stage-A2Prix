-- Ajout des étudiants avec références aux administrateurs et aux pilotes
INSERT INTO Étudiant (ID_Student, Annee_Formation, ID_Promotion, ID_Pilote, ID_Admin)
VALUES
(5, 'Première année', 5, 4, 1), -- Étudiant associé à l'admin 1 et au pilote 4
(6, 'Deuxième année', 6, 4, 1), -- Étudiant associé à l'admin 1 et au pilote 4
(7, 'Troisième année', 5, 2, 3), -- Étudiant associé à l'admin 3 et au pilote 2
(8, 'Première année', 6, 2, 3), -- Étudiant associé à l'admin 3 et au pilote 2
(9, 'Deuxième année', 5, NULL, 1), -- Étudiant associé uniquement à l'admin 1
(10, 'Troisième année', 6, NULL, 3); -- Étudiant associé uniquement à l'admin 3
