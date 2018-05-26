<?php
  session_start();
  @$innloggetBruker=$_SESSION["brukernavn"];

  if(!$innloggetBruker) //bruker er ikke innlogget
  {
    print("Denne siden krever innlogging.");
  }
  else
  {
    include ("start.php");
    ?>

<h2>Vis data</h2>

<form method="post" action="" id="finnData" name="finnData">
   Klasse
   <select name="klassekode" id="klassekode" required>
     <option value="">Velg datatype</option>
     <?php include("dynamiske-funksjoner.php"); listeboksData(); ?>
   </select>  <br/>
   <input type="submit"  value="Finn data" name="finnKnapp" id="finnDataKnapp">
   <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
 </form>

<?php
if(isset($_POST ["finnKlasseKnapp"]))
  {
    $klassekode=$_POST ["klassekode"];


include("database-tilkobling.php");

$sqlSetning="SELECT * FROM bilde;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat);

for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);

    $antallRader=mysqli_num_rows($sqlResultat);

    $filnavn=$rad["filnavn"];

  }

$sqlSetning="SELECT * FROM student WHERE klassekode='$klassekode';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra db");

$antallRader=mysqli_num_rows($sqlResultat);

print ("<h2>Registrerte klasser</h2>");
print ("<table border=1>");
print ("<tr> <th align=left>Fornavn </th><th align=left>Etternavn</th>
        <th align=left>Klassekode</th> <th align=left>Bildenr</th> </tr>");


    $rad=mysqli_fetch_array($sqlResultat);
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];
    $bildenr=$rad["bildenr"];

    print ("<tr> <td> $fornavn </td> <td> $etternavn </td>
    <td> $klassekode </td><td> <a href='../../bilder/$filnavn' target='_blank'>$filnavn </a> </td>  </tr>");

  }

print ("</table>");

include("slutt.php");
}
 ?>
