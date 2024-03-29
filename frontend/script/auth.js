
function clearLabel() {
    var input = document.getElementById("password").value;
    if (input.length === 0) {
            document.getElementById("labeltest").style.display = "none";
            }
        else{
            console.log("jzfjizejfizejf")
            }
        }
        function clearLabel2(){
            var userid = document.getElementById("account-id").value;
            if(userid.length===0){
                document.getElementById("alert-id").style.display="inline"
            }else{
                document.getElementById("alert-id").style.display="none"
            }
        }
    
        function validityy(){
            var input = document.getElementById("password").value;
            console.log("On est dedans"); 
            const Majuscule = /[A-Z]/;
            const Chiffre = /[0-9]/;
            const CaractereSpecial = /[^A-Za-z0-9]/; 
    
            if (Majuscule.test(input) && Chiffre.test(input) && CaractereSpecial.test(input)) {
                alert("Connexion réussie");
                document.getElementById("labeltest").style.display="none";
                var userid = document.getElementById("account-id").value;
                window.location.href="dashboard.html";
                if(userid.length===0){
                    console.log("UserId Vide")
                    document.getElementById("alert-id").style.display= "inline";
                }else{
                    console.log("Compte créer avec succès")
                    document.getElementById("alert-id").style.display="none";
                }
            } else{
                document.getElementById("labeltest").style.display = "inline";
                console.log("input pas vide");
            }
        }
    