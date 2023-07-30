const form = document.getElementById('form');
form.addEventListener('submit', load);

function load(event) {
    event.preventDefault();


    //var url = 'http://localhost:8000/api/server/storage';

    let ipv4 = document.getElementById('ipv4').value;
    let ipv6 = document.getElementById('ipv6').value;
    var location = document.getElementById('location').value;
    var description = document.getElementById('description').value;
    if (validateIP(ipv4, ipv6)) {
        validate(ipv4, ipv6, location, description)
    }


    /*
        if (validate(ipv4, ipv6)) {
            var data = { "ipv4": ipv4, "ipv6": ipv6, "location": location, "description": description };
            console.log(data);
            console.log(data);
            fetch(url, {
                    method: 'POST', // or 'PUT'
                    body: JSON.stringify(data), // data can be `string` or {object}!
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(res => res.json())
                .catch(error => console.error('Error:', error))
                .then(response => console.log('Success:', response));
        } else {
            alert('Los datos ya existen')
        }
        */


}

function validate(ipv4, ipv6, location, description) {

    fetch('http://localhost:8000/api/server/index', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        //body: JSON.stringify(character),
    }).then(response => {
        console.log(response.status);
        return response.json()
    }).then(data => {
        console.log("success: ", data);
        console.log(data['data'])
            //checkDuplicate(data['data'], ipv4, ipv6);
        if (validateServer(location, description)) {
            if (validateServerDual(ipv4, ipv6)) {
                sendData(ipv4, ipv6, location, description)
            } else {
                alert("Necesitas una ipv4 o una ipv6 minimo")
            }
        } else {
            alert("Falta rellenar campos")
        }

    }).catch((error) => {
        console.log("error: ", error);
    });

}
/*
function checkDuplicate(datos, ipv4, ipv6) {
    var bool = true;
    for (var dato in datos) {
        console.log(dato);
        console.log(ipv4);
        if (dato['ipv4'] == ipv4 || dato['ipv6'] == ipv6) {
            console.log("datos")
            console.log(dato);
            bool = false; // si haces un return no mata el proceso

        }
    }
    console.log(bool);
    if (bool) {
    }
}
*/
function sendData(ipv4, ipv6, location, description) {
    var data = { "ipv4": ipv4, "ipv6": ipv6, "location": location, "description": description };
    fetch('http://localhost:8000/api/server/storage', {
            method: 'POST', // or 'PUT'
            body: JSON.stringify(data), // data can be `string` or {object}!
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(res => res.json())
        .catch(error => console.error('Error:', error))
        .then(response => {
            alert('Se ha creado correctamente');
            window.location = 'http://localhost:8000'
                /*if (response.status === 200 || response.status === 'success' || response.status === 201) {
                    alert('Se ha guardado los datos correctamente');
                }*/
        });
}

function back() {
    window.location = 'http://localhost:8000';
}

const patternipv6 = /(([0-9a-fA-F]{1,4}:){7,7}[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,7}:|([0-9a-fA-F]{1,4}:){1,6}:[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,5}(:[0-9a-fA-F]{1,4}){1,2}|([0-9a-fA-F]{1,4}:){1,4}(:[0-9a-fA-F]{1,4}){1,3}|([0-9a-fA-F]{1,4}:){1,3}(:[0-9a-fA-F]{1,4}){1,4}|([0-9a-fA-F]{1,4}:){1,2}(:[0-9a-fA-F]{1,4}){1,5}|[0-9a-fA-F]{1,4}:((:[0-9a-fA-F]{1,4}){1,6})|:((:[0-9a-fA-F]{1,4}){1,7}|:)|fe80:(:[0-9a-fA-F]{0,4}){0,4}%[0-9a-zA-Z]{1,}|::(ffff(:0{1,4}){0,1}:){0,1}((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])|([0-9a-fA-F]{1,4}:){1,4}:((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9]))/gi;

function validateIP(ipv4, ipv6) {

    if ((/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(ipv4) || ipv4 == "") && (patternipv6.test(ipv6) || ipv6 == "")) {
        return true;
    }
    alert("Ips mal")
    return false;
}