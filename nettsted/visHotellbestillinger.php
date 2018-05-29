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

<form method="post" action="visHotell" id="visHotell" name="visHotell" onSubmit="return validerBestillHotell()">
			    <div>
					<h1>Dine hotellbestillinger</h1>
			</form>
			<div id="melding">
			</div>

<?php
if ("visHotell")

{

$sqlSetning="SELECT * FROM kunde;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");
$antallRader=mysqli_num_rows($sqlResultat);

print("<h3>Mine hotellbestillinger</h3>");
print("<table border=1>");
print("<tr><th align=left>sted</th><th align=left>hotellnavn</th><th align=left>romtype</th><th align=left>antall rom</th><th align=left>dato</th></tr>");

}

for ($r=1;$r<=$antallRader;$r++)
{
	$rad=mysqli_fetch_array($sqlResultat);
  $sted=$rad["sted"];
	$hotellnavn=$rad["hotellnavn"];
	$romtype=$rad["romtype"];
  $antallrom=$rad["antallrom"];
  $dato=$rad["dato"];

	print("<tr><td>$sted</td><td>$hotellnavn</td><td>$romtype</td><td>$antallrom</td><td>$dato</td></tr>");
}

print("</table>");
print("<a href='minside.php'>Tilbake</a>");


include("slutt.html");
}
?>
