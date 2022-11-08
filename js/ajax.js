// JavaScript Document
var xhr;

function myGetXmlHttpRequest()
{
  var XmlHttpReq = false;
  var activeXopt = new Array("Microsoft.XmlHttp", "MSXML4.XmlHttp", "MSXML3.XmlHttp", "MSXML2.XmlHttp", "MSXML.XmlHttp");
  // prima come oggetto nativo
  try
  {
    XmlHttpReq = new XMLHttpRequest();
  }
  catch(e)
  {
    // poi come oggetto ActiveX dal pi� al meno recente
    var created = false;
    for(var i=0; i<activeXopt.length && !created; i++)
    {
      try
        {
          XmlHttpReq = new ActiveXObject(activeXopt[i]);
          created = true;
        }
        catch(eActXobj)
        {
          alert("Il tuo browser non supporta AJAX!");
        }
    }
  }
  return XmlHttpReq;  
}

function suggerisciNomi()//funzione di callback
{
   if(xhr.readyState==4)//controlla che la risposta sia arrivata
   {
      var R = document.getElementById("risultati");//parte della pagina in cui vado a scrivere il risultato utilizzando il DOM
      R.innerHTML = xhr.responseText;//legge la risposta proveniente dal server
   }
}

function Richiesta(stringa)
{
  var url = "ajax.php?nome=" + stringa.toUpperCase();
  xhr = myGetXmlHttpRequest();
  xhr.onreadystatechange=suggerisciNomi;//funzione di callback
  xhr.open("GET",url,true);
  xhr.send(null);//null perchè sto usando il metodo GET
}
