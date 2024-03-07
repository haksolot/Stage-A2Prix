
const mysql = require('mysql2');
const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
const port = 25565;
const connection = mysql.createConnection({
    host: '127.0.0.1',
    port: 3306,
    user: 'root',
    password: '',
    database: 'a2prix'
});

connection.connect((err) => {
    if (err) {
        console.error('Erreur de connexion à la base de données:', err);
    } else {
        console.log('Database Linked !');
    }
});
connection.connect();
app.use(cors());
app.use(bodyParser.json());

app.listen(port, () => {
    console.log(`Serveur listening to ${port}`);
});

function SQL(Request){
    return new Promise((resolve, reject) => {
        connection.query(Request, (error, results, fields) => {
            if (error) {
                reject(error);
            } else {
                resolve(results);
            }
        });
    });
};

var CurrentLogID = -1;

// http://localhost:25565/auth/login/${password}/${user}
app.get('/auth/login/:password/:user', async (req, res) => {
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

// http://localhost:25565/account-create-pilote/confirm/${username}/${password}/${name}/${surname}/${center}/${promotion}
app.get('/account-create-pilote/confirm/:username/:password/:name/:surname/:center/:promotion', async (req, res) => {

    var username = req.params.username
    var password = req.params.password;
    var name = req.params.name;
    var surname = req.params.surname;
    var center = req.params.center;
    var promotion = req.params.promotion;

   username = String(username)
   password = String(password)
   name = String(name)
   surname = String(surname)
   center = String(center)
   promotion = String(promotion)
   

    result = await SQL('SELECT COUNT(*) AS Nombre_Lignes FROM utilisateur;');
    IdNumber = result[0].Nombre_Lignes;

    SQL(`INSERT INTO Utilisateur (ID_User, Nom_User, Prenom_User, Password, Login) VALUES ('${IdNumber + 1}','${surname}','${name}','${password}','${username}')`)
    SQL(`INSERT INTO pilote (ID_Pilote, ID_Admin) VALUES ('${IdNumber}', '${CurrentLogID}');`)

    result = await SQL('SELECT COUNT(*) AS Nombre_Lignes FROM utilisateur;');
    Centre = result[0].Nombre_Lignes + 1;


    res.send('1');
});