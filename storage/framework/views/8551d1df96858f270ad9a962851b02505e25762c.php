<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/server_view.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo e(asset('js/server_create_1.js')); ?>"></script>
</head>

<body>
    <h2>CREATE SERVER</h2>
    <div id="container">
    <form name="people" id="characters" action="">
        <div class="input-box">
            <input type="text" placeholder="ipv4" name="ipv4" id="ipv4">
        </div>
        <div class="input-box">
            <input type="text" placeholder="ipv6" name="ipv6" id="ipv6">
        </div>
        <div class="input-box ">
            <input type="text" placeholder="Location" name="location" id="location">
        </div>
        <div class="input-box ">
            <input type="text" placeholder="Description" name="description" id="description">
        </div>
        <input id="submit" name="submit" type="submit" value="Submit" onclick="load()">
    </form>
</div>
</body>

</html>
<?php /**PATH D:\2n DAW\m6-m7-m9\proyectoLogHelperBien\loghelper_pract\logHelper\resources\views//server/server_create_1.blade.php ENDPATH**/ ?>