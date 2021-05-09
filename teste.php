<?php

// Creating a PHP Array
$sampleArray = array('Car', 'Bike', 'Boat');
$fileContents = file_get_contents('words.txt');


?>

<script type="text/javascript">

// Using PHP implode() function
var passedArray =
    <?php echo $fileContents ?>;

// Printing the passed array elements
document.write(passedArray);

</script>