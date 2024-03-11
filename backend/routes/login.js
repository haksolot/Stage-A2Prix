const express = require('express');
const router = express.Router();
const { SQL } = require('../database');

router.get('/:password/:user', async (req, res) => {
    // Votre logique de route pour la connexion ici
});

module.exports = router;
