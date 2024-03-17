<?php
    include('./backend/links.php');
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <?php linkResource("stylesheet", "/frontend/style/account-creation.css"); ?>
</head>
<body>
    <div id="container">
        <h1>Création de compte</h1>
        <input type="text" id="account-id" placeholder="Nom d'utilisateur">
        <input id="password" placeholder="Mot de passe">
        <div class="row">
            <input type="text" id="name" placeholder="Nom">
            <input type="text" id="surname" placeholder="Prénom">
        </div>
        <div class="row">
            <input type="text" id="center" placeholder="Centre">
            <input type="text" id="promotion" placeholder="Promotion assigné">
            <button id="confirmation", onclick="sendData()"></button>
        </div>
    </div>
</body>

<script>
    function sendData(){
        
        var username = document.getElementById('account-id').value
        var password = document.getElementById('password').value
        var name = document.getElementById('name').value
        var surname = document.getElementById('surname').value
        var center = document.getElementById('center').value
        var promotion = document.getElementById('promotion').value

        if (username != "" && password != "" && name != "" && surname != "" && center != "" && promotion != "") {
            console.log("Data sent !")
            fetch(`http://localhost:25565/account-create-pilote/confirm/${username}/${password}/${name}/${surname}/${center}/${promotion}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            .then(response => response.text())
            .then(data => {
                console.log("Response received:", data);
            })

        }else{

            console.log("Not enough data")

        }
    };
</script>