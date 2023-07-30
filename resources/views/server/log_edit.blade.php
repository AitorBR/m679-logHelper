<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/log_create_edit.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <h2>EDIT LOG</h2>

    <div id="container">
        <form id="form" >
            <div class="input-box">
                <span>Date</span>
                <input type="date"  name="date" id="date"> 
                <span>Time</span>
                <input type="time"  name="time" id="time">
            </div>
            <div class="input-box_1">
                <input class="input-box-description" type="text" placeholder="Description" name="description" id="description">
            </div>

            <input class="btn_submit" id="submit" name="submit" type="submit" value="Submit">
        </form>
      
    </div>
    <a href="javascript:back()" class="btn float-right btn btn-success">Atras ⬅️ </a>
</body>

<script type="text/javascript" src="{{ asset('js/log_edit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validate.js') }}"></script>

</html>
