<?php

//Pins saved in pins.txt
$string = file_get_contents('pins.txt');
$pins_json = json_decode($string);
$pins_array = $pins_json->pins;

//DA VEDERE COME FUNZIONANO I CONTROLLI SULLA CHECKBOX
//New itnerary request
$city = $_POST['city'];
$checkbox=array("customCheck1","customCheck2","customCheck3","customCheck4","customCheck5","customCheck6");
$categories = array();
foreach($checkbox as $box){
    if ($_POST["$box"]==true)
    array_push($categories, $_POST[$box]);
}
console($categories);

$new_itinerary=array(
    'type' => 'Itinerary',
    'pins' => array(
));


foreach ($pin_array as $pin) {
    $pin_city = $pin->properties->city;
    $pin_category = $pin->properties->category;

    if( $city == $pin_city){
        foreach($categories as $category){
            if($category == $pin_category){
                $new_pin = array(
                    'type' => 'Pin',
                    'properties' => array(
                        'city' => $pin_city,
                        'category' => $pin_category,
                    ));
                array_push($new_itinerary->pins, $new_pin);
            }
        }
    
    }
}



//array back to json string
$encodedString = json_encode($new_itinerary) . PHP_EOL;

//save text file
file_put_contents('./itinerary.txt', $encodedString);
// header("Location:login.php?SuccessReg=" . urlencode('User successfully saved'));
echo "<script type=\"text/javascript\">
            alert('Itinerary successfully saved');
            location=\"itinerary.html\";
            </script>";


?>