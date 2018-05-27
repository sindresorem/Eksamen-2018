<?php

include("start.html");

include("db-tilkobling.php");

	$sqlSetning="SELECT * FROM hotell ORDER BY sted;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat);

	print("<h3>Velg ditt reisemål</h3>");
	print("<table border=1>");
	print("<tr><th align=left>Sted</th><th align=left>Hotell</th></tr>");

	for($r=1;$r<=$antallRader;$r++)
		{
			$rad=mysqli_fetch_array($sqlResultat);
			$sted=$rad["sted"];
			$hotellnavn=$rad["hotellnavn"];

			print("<tr><td>$sted </td><td>$hotellnavn </td></tr>");
		}

	print("</table>");

include("slutt.html");
?>
