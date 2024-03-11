const express = require('express');
const router = express.Router();
const { SQL } = require('../database');

router.get('/confirm/:username/:password/:name/:surname/:center/:promotion', async (req, res) => {
    var username = req.params.username
    var password = req.params.password;
    var name = req.params.name;
    var surname = req.params.surname;
    var center = req.params.center;
    var promotion = req.params.promotion;
    var go = 0;

   username = String(username)
   password = String(password)
   name = String(name)
   surname = String(surname)
   center = String(center)
   promotion = String(promotion)
   
    try{
        result = await SQL(`SELECT * FROM utilisateur WHERE Nom_user = '${name}' AND Prenom_user = '${surname}' AND Login = '${username}';`);
        CheckLogin = result[0].Login
        Checkname = result[0].name
        if(CheckLogin != null ||Checkname != null){
            console.log('Username already Exist')
            res.status(500).json();
            go = 1
        }
    }catch(error){
        console.log(error)
    }

    if(go == 0){
        result = await SQL('SELECT COUNT(*) AS Nombre_Lignes FROM utilisateur;');
        IdNumber = result[0].Nombre_Lignes;
    

        try {
            result = await SQL(`SELECT * FROM centre WHERE Nom_Centre = '${center}';`);
            idFormation = result[0].ID_Formation;
        } catch (error) {
            console.log('center does not exist')
            res.status(500).json();
        }
    
        promo = await SQL(`SELECT * FROM promotion WHERE Nom_Promo = '${promotion}';`)
    
        if(result.length == 1){
            console.log('Center Created !')
            if(promo.length == 0){
                SQL(`INSERT INTO Utilisateur (ID_User, Nom_User, Prenom_User, Password, Login) VALUES ('${IdNumber + 1}','${name}','${surname}','${password}','${username}')`)
                SQL(`INSERT INTO pilote (ID_Pilote, ID_Admin) VALUES ('${IdNumber+1}', '${CurrentLogID}');`)
                console.log('UserCreated')
                forIdPromotion = await SQL(`SELECT COUNT(*) AS NombreDeLignes FROM promotion;`);
                forIdPromotion = forIdPromotion[0].NombreDeLignes;
                console.log('Promo Created !')
                await SQL(`INSERT INTO promotion (ID_Promotion ,Nom_Promo, ID_Pilote, ID_Formation) VALUES ('${forIdPromotion +1}','${promotion}', ${IdNumber +1}, ${idFormation});`);
                res.send("Valid");
            }else{
                res.status(500).json();
                console.log('Cant create promo already exist')
            }
        }
    }
});

module.exports = router;
