function sendData(){
    var password = document.getElementById('password').value
    var user = document.getElementById('account-id').value

    fetch(`http://localhost:25565/auth/login/${password}/${user}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.token);
       localStorage.setItem( "token" , data.token );
       window.location.href = data.page;
    })
};
