/*var palavras= {"verde":"3", "relva": "4", "ponte":"5"};

for (var key in palavras) {

 var test = document.createElement("p");
        test.innerHTML = key;
        document.getElementById("demo").appendChild(test);
        console.log(key);
}

for (var values of Object.values(palavras)) {

    if(values>6){
        document.getElementById("demo").style.fontSize = "x-large";
    }
    console.log(values);
}*/

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