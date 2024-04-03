function confirmer(){
    var company_name_input = document.getElementById("company-name-input").value;
    var post_input = document.getElementById("post-input").value;
    var adress_input = document.getElementById("adress-input").value;
    var description_input = document.getElementById("description-input").value;
    var sector_input = document.getElementById("sector-input").value;
    var money_input = document.getElementById("money-input").value;
    var duration_input = document.getElementById("duration-input").value;
    if(company_name_input === "" || post_input === "" || adress_input ==="" || description_input ==="" || sector_input ==="" || money_input ==="" || duration_input ===""){
        alert("Toutes les cases ayant une * doivent être remplis")
    }else {
        console.log("Compte créer avec succès");
        window.location.href = "dashboard-admin.php";
        alert("Offre créer avec succès")
    }
} 