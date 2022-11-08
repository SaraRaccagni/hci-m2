<?php
    $nomi[0] = "Coimbra";
    $nomi[1] = "Porto";
    $nomi[2] = "Lisbona";
    $nomi[3] = "Aveiro";
    $nomi[4] = "Sintra";
    $nomi[5] = "Braca";
    $nomi[6] = "Bracanca";
    $nomi[7] = "Lousa";
    $nomi[8] = "Faro";

    $nome = $_GET["nome"];
    $risultato = "";
        
    if (strlen($nome) > 0)
    {
        for ($i = 0; $i < count($nomi); $i++)
        {
            if (strtoupper($nome) == strtoupper(substr($nomi[$i], 0, strlen($nome))))
            {
                if ($risultato == "")
                {
                    $risultato = $nomi[$i];
                }
                else
                {
                    $risultato .= ", " . $nomi[$i];
                }
            }
        } 
    } 
    
    if ($risultato == "")
    {
        echo "Nessun risultato...";
    }
    else
    {
        echo $risultato;
    }
?>
