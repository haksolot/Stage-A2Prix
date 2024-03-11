const express = require('express');
const router = express.Router();
const { SQL } = require('../database');

router.get('/confirm/:username/:password/:name/:surname/:center/:promotion', async (req, res) => {
    // Votre logique de route pour la création de compte ici
});

module.exports = router;
