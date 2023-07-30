function init() {
    fetch('http://localhost:8000/server/index', {
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

    }).catch((error) => {
        console.log("error: ", error);
    });
}

window.onload = init();