<?php

    $jsondata = file_get_contents('guests.json');

    $data = json_decode($jsondata, true);

    $djName = array();

    //Obtenenmos los nombres de los dj sin repetir
    foreach ($data as $da) {

        if(!in_array($da["favourite_dj"],$djName,true)){
            $djName[] = $da["favourite_dj"];
        }

    }

    $djInvitados = array();
    foreach ($data as $da) {
        if(isset($djInvitados[$da["guest_of"]])){
            $djInvitados[$da["guest_of"]] +=1;
        }else{
            $djInvitados[$da["guest_of"]]=1;
        }
    }

    echo 'Invitados<br>';
    print_r($djInvitados);
    echo '<br>favoritos<br>';
    print_r($djName);


        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>World tour</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Guest</th>
                <th>DJ Favorito</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($data as $da) {
                    echo '<tr>';
                    echo '<td>';
                    echo $da['name'];
                    echo '</td>';
                    echo '<td>';
                    echo $da['location'];
                    echo '</td>';
                    echo '<td>';
                    echo $da['guest_of'];
                    echo '</td>';
                    echo '<td>';
                    echo $da['favourite_dj'];
                    echo '</td>';                    
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</body>
</html>