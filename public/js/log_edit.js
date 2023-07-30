const form = document.getElementById('form');
form.addEventListener('submit', load);
let id;
let idserver;

function init() {
    let urlParams = new URLSearchParams(window.location.search);
    id = urlParams.get('id');
    idserver = urlParams.get('idserver');
    fetch('http://localhost:8000/api/log/show/' + id, {
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
    let date = document.getElementById('date');
    let time = document.getElementById('time');
    let description = document.getElementById('description');
    let valueTime = data['timestamp'].split(' ');
    date.value = valueTime[0];
    time.value = valueTime[1].slice(0, -3);
    description.value = data['description'];
}

function load(event) {
    event.preventDefault();
    let urlParams = new URLSearchParams(window.location.search);
    let id = urlParams.get('id');

    var date = document.getElementById("date").value;
    var time = document.getElementById("time").value;
    var description = document.getElementById("description").value;
    let timestamp = date + " " + time + ":00";

    //if (validate(ipv4, ipv6)) {
    if (validateLog(time, date, description)) {
        var data = { "timestamp": timestamp, "description": description };
        fetch('http://localhost:8000/api/server/' + idserver + '/serverlog/update/' + id, {
                method: 'PATCH', // or 'PUT'
                body: JSON.stringify(data), // data can be `string` or {object}!
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(res => res.json())
            .catch(error => console.error('Error:', error))
            .then(response => {
                alert('Se ha editado correctamente');
                window.location = 'http://localhost:8000/serverlogShow?id=' + idserver;
            });
    } else {
        alert("Los campos estan vacios");
    }
    /*} else {
        alert('Los datos ya existen')
    }*/


}

function back() {
    let urlParams = new URLSearchParams(window.location.search);
    let id = urlParams.get("idserver");
    window.location = 'http://localhost:8000/serverlogShow?id=' + id;
}

window.onload = init();