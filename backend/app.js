const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const database = require('./database');
const loginRoute = require('./routes/login');
const createAccountRoute = require('./routes/createAccount');
const app = express();
const port = 25565;

app.use(cors());
app.use(bodyParser.json());
app.use('/auth/login', loginRoute);
app.use('/account-create-pilote', createAccountRoute);

app.listen(port, () => {
    console.log(`Serveur listening to ${port}`);
});

module.exports = app;
