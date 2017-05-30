<?php

$title = "Taxis";

$content = '<h1>Taxis</h1>

<a href="CreateNewTaxi.php"> Add a new Taxi</a><br/> ';

include "DBConnect.php";

$content ="
    
     <table class = 'overviewTable'
     <thead></thead>
            <th><b>ID</b></th>
            <th><b>Name</b></th>
            <th><b>Brand</b></th>
            <th><b>Seats</b></th>
            <th><b>Licenseplate</b></th>
            <th></th>
            <th></th>
     </thead>
     <tbody>';

    $taxis = $dbFac->displayTaxi();
    foreach ($taxis as $taxi => $value){
        foreach ($value as $subvalue => $valueTwo){

            <tr>
                    <td> . $valueTwo ['id'] .</td>
                        <td>".$valueTwo[taxiID]."</td>
                        <td>".$valueTwo[carName]."</td>
                        <td>".$valueTwo[carbrand]."</td>
                        <td>".$valueTwo[carSeats]."</td>
                        <td>".$valueTwo[licensePlate]."</td>
                        <td><button type = 'submit' data-href = UpdateTaxi.php?id=".$valueTwo['id'].">Update</a></td>
                        <td><button type = 'submit' >Delete</input></td>
            </tr>;
    }
}
            </tbody>
        </table>
    </div>
</div>
</body>


";
include  'Template.php';