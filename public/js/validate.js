function validateServer(location, description) {

    if (location !== undefined && location !== "" && description !== "" && description !== undefined) {
        return true;
    }

}

function validateServerDual(ipv4, ipv6) {
    if (ipv4 !== undefined && ipv4 !== "" || ipv6 !== "" && ipv6 !== undefined) {
        return true;
    }
}

function checkDuplicate(datos, ipv4, ipv6) {

    for (var dato in datos) {
        if (dato['ipv4'] == ipv4 || dato['ipv6'] == ipv6) {
            return false;
        }
    }

    return true;
}

function validateLog(time, date, description) {

    if (time !== undefined && time !== "" && description !== "" && description !== undefined && date !== "" && date !== undefined) {
        return true;
    }

}