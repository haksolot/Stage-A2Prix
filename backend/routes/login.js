const express = require('express');
const jwt = require('jsonwebtoken');
const router = express.Router();
const { SQL } = require('../database');
const secretKey = 'BigDickEnergy';


router.get('/:password/:user', async (req, res) => {
    var role;
    const username = req.params.user;
    const password = req.params.password;

    try {
        result = await SQL(`SELECT ID_User FROM utilisateur WHERE Nom_user = '${username}' AND password = '${password}'`);
        userID = result[0].ID_User;
    } catch (error) {
        res.status(500).json({ success: false, error: "Une erreur s'est produite lors de la récupération des données utilisateur." });
    }

    result = await SQL(`SELECT COUNT(*) AS rowCount FROM étudiant WHERE ID_Student = '${userID}';`);
    if (result && result[0] && result[0].rowCount != 0) {
        //res.send('Student');
        role = 3;
    }

    result = await SQL(`SELECT COUNT(*) AS rowCount FROM pilote WHERE ID_Pilote = '${userID}';`);

    if (result && result[0] && result[0].rowCount != 0) {
        //res.send('Pilote');
        role = 2;
    }

    result = await SQL(`SELECT COUNT(*) AS rowCount FROM admin WHERE ID_Admin = '${userID}';`);

    if (result && result[0] && result[0].rowCount != 0) {
        //res.send('Admin');
        role = 1;
        console.log(role)
    }

    token = jwt.sign(role, secretKey);
    console.log(token)
    var page;
    if(role == 1 ||role == 2){
        page = "dashboard-admin.html";
    }else{
        page = "dashboard.html";
    }

    res.send({ token:token, page:page });
});

module.exports = router;
