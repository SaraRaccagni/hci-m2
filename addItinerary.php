<?php

//Pins saved in pins.txt
$string = file_get_contents('pins.txt');
$pins_json = json_decode($string);
$pins_array = $pins_json->features;

//New itnerary request
$checkbox=array("customCheck1","customCheck2","customCheck3","customCheck4","customCheck5","customCheck6");
$categories = array();
foreach($checkbox as $box){
    if (isset($_POST[$box])){
        array_push($categories, $_POST[$box]);
    }
}

// $radio=array("customCheck7","customCheck8","customCheck9");
// foreach($radio as $box){
//     if (isset($_POST[$box])){
//         $compSett= $_POST[$box];
//     }
// }

$pins=array();


foreach ($pins_array as $pin) {
    $pin_city = $pin->properties->city;
    $pin_category = $pin->properties->category;

    if((strcasecmp($_POST['city'],$pin_city))== 0){
        foreach($categories as $category){
            if((strcasecmp($category,$pin_category))== 0){
                array_push($pins, $pin->id);
            }
        }
    
    }
}

$string = file_get_contents('itineraries.txt');
$itineraries_json = json_decode($string);
$newId=$itineraries_json->lastId+1;
$itineraries_json->lastId=$newId;

session_start();
$new_itinerary=array(
         'type' => 'Itinerary',
         'id' => $newId,
         'owner' => $_SESSION['loggedName'],
         'city' => $_POST['city'],
         'date' => $_POST['date'],
         'hour' => $_POST['hour'],
         'minutes' => $_POST['minutes'],
         'frameHour' => $_POST['frame-hour'],
         'frameMinutes' => $_POST['frame-minutes'],
         'km' => $_POST['km'],
         'meters' => $_POST['meters'],
         'filters' => $categories,
         'compSettings' => $_POST['optradio'],
         'pins' => $pins
        );

array_push($itineraries_json->itineraries, $new_itinerary);


//array back to json string
$encodedString = json_encode($itineraries_json) . PHP_EOL;

//save text file
file_put_contents('./itineraries.txt', $encodedString);
// header("Location:login.php?SuccessReg=" . urlencode('User successfully saved'));
echo "<script type=\"text/javascript\">
            alert('Itinerary successfully saved');
            location=\"itinerary.html\";
            </script>";


?>