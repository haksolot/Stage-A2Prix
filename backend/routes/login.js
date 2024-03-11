const express = require('express');
const router = express.Router();
const { SQL } = require('../database');

router.get('/:password/:user', async (req, res) => {
    const username = req.params.user;
    const password = req.params.password;

    var userID


    try {
        result = await SQL(`SELECT ID_User FROM utilisateur WHERE Nom_user = '${username}' AND password = '${password}'`);
      
        userID = result[0].ID_User;
        CurrentLogID = userID;
    } catch (error) {

        res.status(500).json({ success: false, error: "Une erreur s'est produite lors de la récupération des données utilisateur." });
    }

    result = await SQL(`SELECT COUNT(*) AS rowCount FROM étudiant WHERE ID_Student = '${userID}';`);

    if (result && result[0] && result[0].rowCount != 0) {
        res.send('Student');
    }

    result = await SQL(`SELECT COUNT(*) AS rowCount FROM pilote WHERE ID_Pilote = '${userID}';`);

    if (result && result[0] && result[0].rowCount != 0) {
        res.send('Pilote');
    }

    result = await SQL(`SELECT COUNT(*) AS rowCount FROM admin WHERE ID_Admin = '${userID}';`);

    if (result && result[0] && result[0].rowCount != 0) {
        res.send('Admin');
    }
});

module.exports = router;
