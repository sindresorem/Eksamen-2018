
<?php
include("start.html");
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];

if (!$innloggetBruker)
{
 print("Denne siden krever innlogging <br />");
 print("<a href='innlogging.php'>Logg inn</a>");
}
else
{

?>

<h3>Endre hotellbestilling</h3>

<form method="post" action="" id="endreHotellBestilling" name"endreHotellBestilling" onSubmit="return validerBestillHotell()">
  Hotellbestilling
  <select name="dato" id="dato">
    <?php include ("dynamiske-funksjoner.php"); listeboksHotellDato();?>
  </select> <br/>
  <input type="submit" value="Finn dato" name="finnHotellDato" id="finnHotellDato">
</form>



<?php
if(isset($_POST["finnHotellDato"]))
{
   include("db-tilkobling.php");
   $dato=$_POST["dato"];

   $sqlSetning="SELECT * FROM hotell WHERE hotellnavn='$hotellnavn';";
   $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

   $rad=mysqli_fetch_array($sqlResultat);
   $hotellnavn=$rad["hotellnavn"];
   $sted=$rad["sted"];
   $romtype=$rad["romtype"];
   $dato=$rad["dato"];
   $bilde=$rad["bilde"];

   print("<br/>");
   print("<form method='post' action='' id='endreHotellBestilling' name='endreHotellBestilling' onSubmit='return validerBestillHotell()'> ");
   print("Hotellnavn <input type='text' value='$hotellnavn' name='hotellnavn' id='hotellnavn' readonly/> <br/>");
   print("Sted <input type='text' value='$sted' name='sted' id='sted' required /> <br/>");
   print("Romtype <input type='text' value='$romtype' name='romtype' id='romtype' required /> <br/>");
   print("Dato <input type='text' value='$dato' name='dato' id='dato' required /> <br/>");
   print("Bilde <select name='bilde' id='bilde'>");
   				include("dynamiske-funksjoner.php");listeboksKlassekodeValgt($klassekode);
   				print("</select><br/>");
   print("Bildenr <select name='bildenr' id='bildenr'>");
          include("dynamiske-funksjoner.php");listeboksBildenrValgt($bildenr);
          print("</select><br/>");

    print("<h3>Leveringsfrist</h3>");
    print("<script src='kalender.js'> </script>");
    print("<script src='../date-picker-v6/js/datepicker.js'> </script>");
    print("<link rel='stylesheet' type='text/css' href='../date-picker-v6/css/datepicker.css' />");
    print("Registrert leveringsfrist: $leveringsfrist <br />");

    print("Ny leveringsfrist:");

    print("<form method='post' action='' id='skjema' name='skjema'>");
    print("<input type='text' id='fradato' name='fradato' required /> <br/>");


   print("<input type='submit' value='Endre hotellbestilling' name='endreHotellbestilling' id='endreHotellbestilling'> ");
   print ("</form>");
 }

 if (isset($_POST["endreHotellbestilling"]))
{
   $hotellnavn=$_POST["hotellnavn"];
   $sted=$_POST["sted"];
   $romtype=$_POST["romtype"];
   $dato=$_POST["dato"];
   $bilde=$_POST["bilde"];


  if(!$hotellnavn || !$sted || !$romtype || !$dato || !$bilde)
  {
    print ("Alle felt m&aring; fylles ut");
  }
  else
  {
    include("db-tilkobling.php");
    $sqlSetning="UPDATE kunde SET hotellnavn='$hotellnavn', sted='$sted', romtype='$romntype', dato='$dato', bilde='$bilde' WHERE brukernavn='$brukernavn';";
    mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen");
    print ("Hotell med med navn $hotellnavn er n&aring; endret<br/>");
  }



include("slutt.html");
}
}
?>
