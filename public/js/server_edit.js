const form = document.getElementById('form');
form.addEventListener('submit', load);


function init() {
    let urlParams = new URLSearchParams(window.location.search);
    let id = urlParams.get('id');

    fetch('http://localhost:8000/api/server/show/' + id, {
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
        setValues(data['data']);
    }).catch((error) => {
        console.log("error: ", error);
    });
}

function setValues(data) {
    let ipv4 = document.getElementById('ipv4');
    let ipv6 = document.getElementById('ipv6');
    let location = document.getElementById('location');
    let description = document.getElementById('description');
    ipv4.value = data['ipv4'];
    ipv6.value = data['ipv6'];
    location.value = data['location'];
    description.value = data['description'];
}

function load(event) {
    event.preventDefault();

    let urlParams = new URLSearchParams(window.location.search);
    let id = urlParams.get('id');

    let ipv4 = document.getElementById('ipv4').value;
    let ipv6 = document.getElementById('ipv6').value;
    var location = document.getElementById('location').value;
    var description = document.getElementById('description').value;
    if (validateServer(location, description)) {
        if (validateServerDual(ipv4, ipv6)) {
            if (validateIP(ipv4, ipv6)) {
                var data = { "ipv4": ipv4, "ipv6": ipv6, "location": location, "description": description };
                fetch('http://localhost:8000/api/server/update/' + id, {
                        method: 'PATCH', // or 'PUT'
                        body: JSON.stringify(data), // data can be `string` or {object}!
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }).then(res => res.json())
                    .catch(error => console.error('Error:', error))
                    .then(response => {
                        console.log('Success:', response)
                        alert('Se ha editado correctamente');
                        window.location = 'http://localhost:8000'
                    });
            }
        } else {
            alert("Necesitas una ipv4 o una ipv6 minimo")
        }
    } else {
        alert("Falta rellenar campos")
    }


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
window.onload = init();