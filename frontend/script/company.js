function confirmada(){
    var name_input = document.getElementById("name-input").value;
    var sector_input = document.getElementById("sector-input").value;
    var location_input = document.getElementById("location-input").value;
    var description_input = document.getElementById("description-input").value;
    if(name_input === "" || sector_input === "" || location_input=== "" || description_input=== ""){
        alert("Toutes les cases ayant une * doivent être remplis")
    }else{
        alert("Action réaliser avec succès");
        window.location.href="dashboard.html";
    }
}



