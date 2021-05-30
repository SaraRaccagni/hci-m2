<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balada Tipográfica</title>

    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/saxxtext.min.css" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <script src="saxxtext.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

</head>
<?php
$wordsNovo = file_get_contents('words.txt');
$coimbra= file_get_contents('coimbra.txt')
?>
<body>

<div id="intro">

    <div id="mapid"></div>

    <div id="pal">
        <div id="divisao">

        </div>
    </div>

</div>

    <div class="nav-menu">
        <div id="burger-wrap">
            <a class="burger"><span></span></a>
        </div>
        <div class="menu-list">
            <ul>
                <li><a href="index.php">Mapa</a></li>
                <li><a href="projeto.html">Projeto</a></li>
                <li><a href="equipa.html">A Equipa</a></li>
                <li><a href="palavra.html">Inserir Palavra</a></li>
            </ul>
        </div>
    </div>

<script src="comp_tipo.js"></script>

<script>
    var novaspalavras=<?php echo $wordsNovo ?>;
    var coimbra= <?php echo $coimbra ?>;

    compPalavras(novaspalavras, coimbra);

</script>

<script src="menu.js"></script>

<script>
    var fonts = [ 'Verdana', 'Arial', 'montserrat', 'Courier New', 'roboto','Helvetica','Trebuchet MS','Georgia'];
    var fonts_stretch= ['50%', '62.5%', '75%', '85.5%', '100%', '125%']
    var currentFont = 0;

    function changeFont() {
        //document.body.style.fontFamily = fonts[currentFont++ % fonts.length]
        //document.getElementById("divisao").style.fontStretch = fonts_stretch[currentFont++ % fonts_stretch.length]

    }
    //setInterval(changeFont, 3000);
</script>




</body>
</html>

