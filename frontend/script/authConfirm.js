function sendData(){
    var password = document.getElementById('password').value
    var user = document.getElementById('account-id').value

    fetch(`http://localhost:25565/auth/login/${password}/${user}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.text())
    .then(data => {
        console.log(data)
        if(data == "Student"){
            window.location.href = 'dashboard.html';
        }
        if(data == "Pilote"){
            window.location.href = 'dashboard-admin.html';
        }
        if(data == "Admin"){
            window.location.href = 'dashboard-admin.html';
        }
    })
};
