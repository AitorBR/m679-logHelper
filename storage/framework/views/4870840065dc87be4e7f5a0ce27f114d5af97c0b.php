<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/server_create.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <h2>CREATE SERVER</h2>
    <div id="container">
    <form id="form">
        <div class="input-box">
            <input class="ipv6-ipv4" type="text" placeholder="ipv4" name="ipv4" id="ipv4">
        </div>
        <div class="input-box">
            <input class="ipv6-ipv4" type="text" placeholder="ipv6" name="ipv6" id="ipv6">
        </div>
        <div class="input-box">
            <input class="input-box-location" type="text" placeholder="Location" name="location" id="location">
        </div>
        <div class="input-box">
            <input class="input-box-description" type="text" placeholder="Description" name="description" id="description">
        </div>
        <input class="btn_submit" type="submit" id="submit" name="submit" type="submit" value="Submit">
    </form>
</div>
<a href="javascript:back()" class="btn float-right btn btn-success">Atras ⬅️ </a>
</body>

<script type="text/javascript" src="<?php echo e(asset('js/server_create.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/validate.js')); ?>"></script>
</html>
<?php /**PATH D:\2n DAW\m6-m7-m9\proyectoLogHelperBien\loghelper_pract\logHelper\resources\views//server/server_create.blade.php ENDPATH**/ ?>