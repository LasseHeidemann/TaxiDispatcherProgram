<?php

$title = "Taxis";

echo $content = '<h1>Taxis</h1>';

include "DBConnect.php";

echo $content ="
    
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
     <tbody>";

    $taxis = $dbFac->displayTaxi();
    foreach ($taxis as $taxi => $value){
        foreach ($value as $subvalue => $valueTwo){

            echo '<tr>';
        echo            '<td>'.$valueTwo["TaxiID"].'</td>';
        echo            '<td>'.$valueTwo["CarName"].'</td>';
        echo            '<td>'.$valueTwo["CarBrand"].'</td>';
        echo            '<td>'.$valueTwo["CarSeats"].'</td>';
        echo            '<td>'.$valueTwo["LicensePlate"].'</td>';

            echo '</tr>';
    }
}
echo $content ="

            </tbody>
        </table>
        
        <br>
    <a href=\"CreateNewTaxi.php\"> Add a new Taxi</a><br/>
    </div>
    
</div>
</body>


";
include  'Template.php';