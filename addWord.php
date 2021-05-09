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
    var pal = <?echo $fileContents?>;

    document.write(pal);

    var palavras = {verde:8,relva:4,ponte:14,patos:10,brincar:5, bicicletas:2};


    for (var prop in palavras){
        var word= prop;
        var composicao= document.getElementById("word");

        /*Aumentar palavra consoante as vezes que é inserida*/
        var size= palavras[prop] * 0.5 + "vw";

        /*div id=divisao*/
        var div= document.getElementById("divisao");
        div.style.width=40 + "vw";
        div.style.height=50 + "vh";

        /*Crear tag p para inserir as palavras*/
        var test= document.createElement("p");

        /*Estilizar as palavras*/
        test.style.fontSize=size;
        test.style.textTransform= "uppercase";
        test.style.fontWeight= "bold";
        test.style.fontFamily= "Roboto Condensed, sans-serif";
        test.style.display= "inline-block";
        test.style.margin=0;
        test.style.paddingLeft= 0.5 + "vw";

        /*var max= palavras[prop].MAX_VALUE;
         if(test === max){
             test.style.transform = "rotate(90deg)";
         }*/

        composicao.style.margin=0;

        console.log(size);
        test.innerHTML= word;
        composicao.appendChild(test);
    }

</script>

