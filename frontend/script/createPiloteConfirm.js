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
            console.log(data)
            if(data == "Valid"){
                console.log('valid3')
                window.location.href = 'auth.html';
            }
        })

    }else{

        console.log("Not enough data")

    }
};