SELECT Type_Ent AS sector FROM entreprise

requete1 = "SELECT ID_City AS location FROM entreprise WHERE ID_Entreprise = :id_ent && SELECT ID_Ville AS id_ville FROM localisation WHERE ID_City = location && SELECT Nom_Ville & CP FROM ville WHERE ID_Ville = id_ville"
$first = $db->prepare($check);
$first->bindParam(':id_ent', $id_ent, PDO::PARAM_INT);
$first->execute();
$sector = $first->fetch(PDO::FETCH_ASSOC);
$sector = $sector["sector"];