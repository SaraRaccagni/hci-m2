
function compPalavras(palavras2) {
    var max=0;
    for (var prop in palavras2) {

        max = (max < parseFloat(palavras2[prop])) ? parseFloat(palavras2[prop]) : max;

        var word = prop;

        var composicao_cont = document.getElementById("divisao");

        /*Aumentar palavra consoante as vezes que é inserida*/

        //var size = palavras2[prop] * 80 + "%";
        var opacity = palavras2[prop] / max;

        /*Crear tag p para inserir as palavras*/
        var palavra_cont = document.createElement("div");
        palavra_cont.className = "palavra_cont";

        composicao_cont.appendChild(palavra_cont);

        var palavra = document.createElement("p");

        palavra_cont.appendChild(palavra);

        palavra.innerHTML = word;

        composicao_cont.style.display = "flex";

        /*Estilizar as palavras*/
        //palavra.style.fontSize = size;
        palavra.style.fontSize = '50px';
        palavra.style.textTransform = "uppercase";
        palavra.style.fontWeight = "bold";
        palavra.style.fontFamily = "Roboto Condensed, sans-serif";
        palavra.style.margin = 0;
        palavra.style.padding = 0;
        palavra.style.float = "left";
        palavra.style.opacity=opacity;

    }

}