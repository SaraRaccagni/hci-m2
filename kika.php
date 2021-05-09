<?php
//header('Location: index.html');

$fileContents = file_get_contents('words.txt');
echo "filecontents: ". $fileContents. "<br/>" ;

//passan json do txt p array
$palavras = json_decode($fileContents, true);

echo var_dump($palavras). "<br/>";

if(isset( $_POST['textdata'])) {
    $word_input = $_POST['textdata'];
    foreach ($palavras as $word=>$count){
        //se palavra está no array, incrementa count
        if($word === $word_input) {
            $count+=1;
            $palavras[$word]=$count;
            echo $word ." : " .$count . "<br/>";
        }
        //se nao, adiciona entrada ao array
        else{
            $count=1;
            $word= $word_input;
            $palavras[$word]=$count;
        }
    }
    //array de volta p json string
    $encodedString = json_encode($palavras). PHP_EOL;
    echo "ENCODED: ". $encodedString;

    //guardar ficheiro texto
    if (file_put_contents('words.txt', $encodedString)) echo 'Data successfully saved';
    else echo 'Unable to save data';
}

?>

<script type="text/javascript">
   /* var pal=""; */
   var pal;
  pal= "<?php echo $encodedString ?>;";
    document.write(pal);
   /* for (var prop in pal) {
        var word = prop;
        var composicao = document.getElementById("word");
        var test= document.createElement("p");
        test.innerHTML= word;
        composicao.appendChild(test);
    }*/
</script>