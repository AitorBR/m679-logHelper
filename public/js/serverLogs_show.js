let id;
let idserver;

function init() {
    let urlParams = new URLSearchParams(window.location.search);
    id = urlParams.get('id');
    idserver = urlParams.get('id');
    /*
        var createLink = document.getElementById('logCreate');
        console.log(createLink);
        createLink.setAttribute('href', '/logCreate?id=' + id);
    */
    fetch('http://localhost:8000/api/server/' + id + '/serverlog/index', {
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
        generateTables(data['data']);

    }).catch((error) => {
        console.log("error: ", error);
    });

}

function generateTables(datos) {
    /*Object.keys(datos).foreach (dato => {
        console.log(dato);
    });*/
    for (var dato in datos) {
        let actdata = datos[dato];
        let table = document.getElementById('table');
        let tr = document.createElement('tr');
        let td_timestamp = document.createElement('td');
        let td_desc = document.createElement('td');

        td_timestamp.innerHTML = actdata['timestamp'];
        td_desc.innerHTML = actdata['description'];



        let td_func = document.createElement('td');



        let linkedit = document.createElement('a');
        linkedit.setAttribute('href', '/logEdit?id=' + actdata['id'] + '&idserver=' + idserver);
        linkedit.innerHTML = "Editar ✍🏽";

        let linkdelete = document.createElement('a');
        linkdelete.setAttribute('href', 'javascript:deleteLog(' + actdata['id'] + ')');
        //linkdelete.setAttribute('href', '/server/server.edit?id=' + actdata['id']); hacer mas tarde
        linkdelete.innerHTML = "Eliminar 🗑";

        let span1 = document.createElement('span');
        span1.innerHTML = " | "


        td_func.appendChild(linkedit);
        td_func.appendChild(span1);

        td_func.appendChild(linkdelete);




        let th = document.createElement('th');
        th.setAttribute('scope', 'row');
        th.innerHTML = actdata['id'];

        tr.appendChild(th);

        tr.appendChild(td_timestamp);
        tr.appendChild(td_desc);

        tr.appendChild(td_func);

        table.appendChild(tr);
        /*
                            console.log(actdata['timestamp']);
                            console.log(actdata['description']);
        */
    }
}

function deleteLog(id) {
    let urlParams = new URLSearchParams(window.location.search);
    fetch('http://localhost:8000/api/server/ ' + idserver + '/serverlog/destroy/' + id, { // http://localhost:8000/api/server/destroy/3
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        //body: JSON.stringify(character),
    }).then(response => {
        console.log(response.status);
        return response.json()
    }).then(data => {
        //window.location.href = 'http://localhost:8000/'
    }).catch((error) => {});
    window.location.reload();
}

function setLink() {
    let urlParams = new URLSearchParams(window.location.search);
    let idserver = urlParams.get('id');
    window.location = 'http://localhost:8000/logCreate?id=' + idserver;
}

window.onload = init();