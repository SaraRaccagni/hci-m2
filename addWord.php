<?php
header('Location:index.php');

$string = file_get_contents('words.txt');
$latitude=40.19213;
$longitude=-8.50894;

$palavras = json_decode($string);
var_dump($palavras);
echo "<br>"."<br>";
if (isset($_POST['textdata'])) {

    $words_array = $palavras->features;//mau
    $word_input = $_POST['textdata'];
    $word_exists = false;

    foreach ($palavras->features as $word) {
        $words_coordinates = $word->geometry->coordinates;
        $words_properties = $word->properties;
        $rep = $words_properties->rep;

        if( $word_input === $words_properties->palavra){
            $word_exists = true;
            $rep += 1;
            echo "REPETIDO" . " - " . $words_properties->palavra . $rep . "<br/>";
            $words_properties->rep = $rep;
            break;
        }

    }
//-----------------ACABA FOREACH------------------

    if($word_input != $words_properties->palavra) {
        echo "NAO REPETIDO" . '<br>';

        $new_word = array(
            'type' => 'Feature',
            'geometry' => array(
                'type' => 'Point',
                'coordinates' => array($longitude, $latitude)
            ),
            'properties' => array(
                'palavra' => $word_input,
                'rep' => 1,
            ));
        array_push($palavras->features, $new_word);
    }
}


echo "<br>"."WORDS ARRAY"."<br>";
var_dump($words_array);
echo "<br>"."<br>";
echo "<br>"."PALAVRAS"."<br>";
var_dump($palavras);
echo "<br>"."<br>";

//array de volta p json string
$encodedString = json_encode( $palavras) . PHP_EOL;
echo "<br>"."ENCODED: " ."<br>". $encodedString;

//guardar ficheiro texto
if (file_put_contents('geo.txt', $encodedString)) echo 'Data successfully saved';
else echo 'Unable to save data';

?>