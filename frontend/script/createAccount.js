function confirmado() {
    var input_account = document.getElementById("account-id").value;
    var input_password = document.getElementById("password").value;
    var input_name = document.getElementById("name").value;
    var input_surname = document.getElementById("surname").value;
    var input_center = document.getElementById("center").value;
    var input_promotion = document.getElementById("promotion").value;
    if (input_account === "" || input_password === "" || input_name === "" || input_surname === "" || input_center === "" || input_promotion === "") {
        alert("Tous les champs comportants une * doivent être remplis")
    } else { console.log("okk") }
    const Majuscule = /[A-Z]/;
    const Chiffre = /[0-9]/;
    const CaractereSpecial = /[^A-Za-z0-9]/;
    if (Majuscule.test(input_password) && Chiffre.test(input_password) && CaractereSpecial.test(input_password)) {
        alert("Compte créer avec succès");
        document.getElementById("labeltest").style.display = "none";
        window.location.href="auth.html";
    } else {
        document.getElementById("labeltest").style.display = "inline";
        console.log("input pas vide");
    }
}