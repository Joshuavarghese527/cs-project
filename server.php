<?php

$url = 'https://www.rentcafe.com/rentcafeapi.aspx?requestType=apartmentavailability&APIToken=NDY5OTI%3d-XDY6KCjhwhg%3d&propertyCode=p0155985'; // path to JSON file
$crl = curl_init();
curl_setopt($crl, CURLOPT_URL, $url);
curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE); 
$data = curl_exec($crl);
curl_close($crl);
$propertys = json_decode($data); // decode the JSON feed

   clearstatcache();
   foreach ($propertys as $property) 
        {
          echo'<tr>'; 
          echo'<td>'. $property->ApartmentName ."</td>";
          echo'<td>'. $property->Beds .'</td>';
          echo'<td>'. $property->Baths .'</td>';
          echo'<td>'. $property->FloorplanName .'</td>';
          echo'<td>'. '$'. $property->MinimumRent . '  -  ' . '$' . $property->MaximumRent.'</td>';
          echo'<td>'. '<a target="_blank" href="' . $property->ApplyOnlineURL . '"><button type="button" class="btn btn-primary">Apply</button></a>'.'</td>';
          echo'<tr>';
        }
?>