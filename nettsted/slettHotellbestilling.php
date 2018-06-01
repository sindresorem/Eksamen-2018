<?php
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];

if (!$innloggetBruker)
{
 print("Denne siden krever innlogging <br />");
 print("<a href='logginn.php'>Logg inn</a>");
}
else
{
include("start.html")
?>
<h2>Slett hotellbestillinger</h2>
<h3>Velg hvilken hotellbestilling du vil slette fra listen under</h3>

<form method="post" action="" id="slettHotellSkjema" name="slettHotellSkjema" onSubmit="return bekreft()">
Hotellbestilling:
<select name="hotellnavn" id="hotellnavn">
  <?php include("dynamiske-funksjoner.php"); listeboksSlettHotell();?>
</select> <br/>
<input type="submit" value="Slett hotell" name="slettHotellKnapp" id="slettHotellKnapp"/>
</form>

<?php
if(isset($_POST["slettHotellKnapp"]))
{
   include("db-tilkobling.php");

   $hotellnavn=$_POST["hotellnavn"];

   $sqlSetning="DELETE FROM hotell WHERE hotellnavn='$hotellnavn';";
   mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");

   print ("F&oslash;lgende hotellbestilling er n&aring; slettet: $hotellnavn $dato <br/>");
 }
}
?>
