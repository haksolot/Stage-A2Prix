
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

// http://localhost:25565/auth/login/${password}/${user}
app.get('/auth/login/:password/:user', async (req, res) => {
    const username = req.params.user;
    const password = req.params.password;

    var userID


    try {
        result = await SQL(`SELECT ID_User FROM utilisateur WHERE Nom_user = '${username}' AND password = '${password}'`);
    

        userID = result[0].ID_User;

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
app.get('/account-create-pilote/confirm/:username/:password/:name/:surname/:center/:promotion', (req, res) => {

    const username = req.params.username
    const password = req.params.password;
    const name = req.params.name;
    const surname = req.params.surname;
    const center = req.params.center;
    const promotion = req.params.promotion;

    console.log({username , password , name , surname , center , promotion})


    res.send('1');
});