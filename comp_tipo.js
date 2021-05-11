
function compPalavras(palavras2) {
    for (var prop in palavras2) {
        var word = prop;

        var composicao_cont = document.getElementById("divisao");


        /*Aumentar palavra consoante as vezes que é inserida*/
        var size = palavras2[prop] * 35 + "%";

        /*Crear tag p para inserir as palavras*/
        var palavra_cont = document.createElement("div");
        palavra_cont.className = "palavra_cont";

        composicao_cont.appendChild(palavra_cont);

        var palavra = document.createElement("p");

        palavra_cont.appendChild(palavra);

        palavra.innerHTML = word;


        composicao_cont.style.display = "grid";
        composicao_cont.style.gridTemplateColumns = "auto";
        composicao_cont.style.gridTemplateRows = "6vh 20vh";


        palavra_cont.style.float = "left";
        palavra_cont.style.width = size;

        /*Estilizar as palavras*/
        palavra.style.fontSize = size;
        palavra.style.textTransform = "uppercase";
        palavra.style.fontWeight = "bold";
        palavra.style.fontFamily = "Roboto Condensed, sans-serif";
        palavra.style.margin = 0;
        palavra.style.padding = 0;
        palavra.style.float = "left";

        console.log(size);
    }
}