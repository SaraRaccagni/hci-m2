<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Balada Tipográfica</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/saxxtext.min.css" />

    <script src="saxxtext.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

</head>
<?php
$fileContentsnovo = file_get_contents('words.txt');
?>
<body>

<div id="intro">
    <div id="mapid"></div>

    <div id="welcome">
<!--        <h1>Balada tipográfica</h1>-->
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
    var novaspalavras=<?php echo $fileContentsnovo ?>;

    compPalavras(novaspalavras);

</script>

<script src="menu.js"></script>

<script>
    var fonts = [ 'Verdana', 'Arial', 'montserrat', 'Courier New', 'roboto','Helvetica','Trebuchet MS','Georgia'];
    var currentFont = 0;

    function changeFont() {
        document.body.style.fontFamily = fonts[currentFont++ % fonts.length]
    }

    setInterval(changeFont, 1500);

</script>

</body>
</html>

