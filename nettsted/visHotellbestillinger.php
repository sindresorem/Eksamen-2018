<?php
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];

if (!$innloggetBruker)
{
 print("Denne siden krever innlogging <br />");
 print("<a href='innlogging.php'>Logg inn</a>");
}
else
{

include("start.html");
include("db-tilkobling.php");
?>

<form method="post" action="visHotell" id="visHotell" name="visHotell">
			    <div>
					<h1>Dine hotellbestillinger</h1>
			</form>
			<div id="melding">
			</div>

<?php
if ("visHotell")

{

$sqlSetning="SELECT * FROM bestilling ORDER BY hotellnavn;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");
$antallRader=mysqli_num_rows($sqlResultat);

print("<h3>Mine hotellbestillinger</h3>");
print("<table border=1>");
print("<tr><th align=left>land</th><th align=left>sted</th><th align=left>hotellnavn</th><th align=left>romtype</th><th align=left>antall rom</th><th align=left>ankomstdato</th><th align=left>avreisedato</th></tr>");

}

for ($r=1;$r<=$antallRader;$r++)
{
	$rad=mysqli_fetch_array($sqlResultat);
  $land=$rad["land"];
  $sted=$rad["sted"];
	$hotellnavn=$rad["hotellnavn"];
	$romtype=$rad["romtype"];
  $antallrom=$rad["antallrom"];
  $dato=$rad["dato"];

	print("<tr><td>$land</td><td>$sted</td><td>$hotellnavn</td><td>$romtype</td><td>$antallrom</td><td>$datoFra</td><td>$datoTil</td></tr>");
}

print("</table>");
print("<a href='minside.php'>Tilbake</a>");


include("slutt.html");
}
?>
