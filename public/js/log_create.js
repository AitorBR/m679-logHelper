const form = document.getElementById('form');
form.addEventListener('submit', load);

function load(event) {
    event.preventDefault();
    let urlParams = new URLSearchParams(window.location.search);
    let id = urlParams.get("id");

    var url = "http://localhost:8000/api/server/" + id + "/serverlog/store";

    var date = document.getElementById("date").value;
    var time = document.getElementById("time").value;
    var description = document.getElementById("description").value;
    let timestamp = date + " " + time + ":00";

    if (validateLog(time, date, description)) {
        //if (validate(ipv4, ipv6)) {
        var data = { 'timestamp': timestamp, 'description': description };
        fetch(url, {
                method: "POST", // or 'PUT'
                body: JSON.stringify(data), // data can be `string` or {object}!
                headers: {
                    "Content-Type": "application/json",
                },
            })
            .then((res) => res.json())
            .catch((error) => console.error("Error:", error))
            .then((response) => {
                alert('Se ha creado correctamente');
                window.location = 'http://localhost:8000/serverlogShow?id=' + id;
            });
        /*} else {
            alert('Los datos ya existen')
        }*/
        //window.location = 'http://localhost:8000/api/server/' + id + '/serverlog/index';
    } else {
        alert("Los campos estan vacios");
    }
}

function back() {
    let urlParams = new URLSearchParams(window.location.search);
    let id = urlParams.get("id");
    window.location = 'http://localhost:8000/serverlogShow?id=' + id;
}