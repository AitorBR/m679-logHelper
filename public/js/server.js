function init() {
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
        console.log(data['data']);
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
        let td_ipv4 = document.createElement('td');
        let td_ipv6 = document.createElement('td');
        let td_desc = document.createElement('td');
        let td_locat = document.createElement('td');


        td_ipv4.innerHTML = actdata['ipv4'];
        td_ipv6.innerHTML = actdata['ipv6'];
        td_desc.innerHTML = actdata['description'];
        td_locat.innerHTML = actdata['location'];


        let td_func = document.createElement('td');
        let linklog = document.createElement('a');
        linklog.setAttribute('href', '/serverlogShow?id=' + actdata['id']);
        linklog.innerHTML = "Mostrar Logs 📑";

        let linkedit = document.createElement('a');
        linkedit.setAttribute('href', '/serverEdit?id=' + actdata['id']);
        linkedit.innerHTML = "Editar ✍🏽";

        let linkdelete = document.createElement('a');
        linkdelete.setAttribute('href', 'javascript:deleteServer(' + actdata['id'] + ')'); //  hacer mas tarde
        //linkdelete.setAttribute('id', actdata['id']); //  hacer mas tarde
        //linkdelete.setAttribute('onclick', deleteServer());
        linkdelete.innerHTML = "Eliminar 🗑";

        let span1 = document.createElement('span');
        span1.innerHTML = " | "
        let span2 = document.createElement('span');
        span2.innerHTML = " | "

        td_func.appendChild(linkedit);
        td_func.appendChild(span1);
        td_func.appendChild(linklog);
        td_func.appendChild(span2);
        td_func.appendChild(linkdelete);


        let th = document.createElement('th');
        th.setAttribute('scope', 'row');
        th.innerHTML = actdata['id'];

        tr.appendChild(th);

        tr.appendChild(td_ipv4);
        tr.appendChild(td_ipv6);
        tr.appendChild(td_desc);
        tr.appendChild(td_locat);
        tr.appendChild(td_func);

        table.appendChild(tr);
        /*
                    console.log(actdata['id']);
                    console.log(actdata['ipv4']);
                    console.log(actdata['ipv6']);
                    console.log(actdata['description']);
                    console.log(actdata['location']);*/
    }
}

function deleteServer(id) {
    fetch('http://localhost:8000/api/server/destroy/' + id, { // http://localhost:8000/api/server/destroy/3
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

window.onload = init();