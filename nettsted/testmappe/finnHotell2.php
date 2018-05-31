<?php
include("start.html");
include("db-tilkobling.php");

	$sqlSetning="SELECT sted FROM sted ORDER BY sted;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat);

	print("<h3>Din destinasjon</h3>");
	print("<table border=1>");
	print("<tr><th align=left>Destinasjoner</th></tr>");

	for($r=1;$r<=$antallRader;$r++)
		{
			$rad=mysqli_fetch_array($sqlResultat);
			$sted=$rad["sted"];

			print("<tr><td>$sted</td><td><form method='post' action='' id='finnStedSkjema' name='finnStedSkjema'><input type='submit' value='Velg $sted' id='finn$sted' name='finn$sted'></form></td></tr>");
		}

	print("</table>");

	if(isset($_POST["finn$sted"]))
	{
		include("db-tilkobling.php");
		$sted=$_POST["sted"];

		$sqlSetning="SELECT * FROM hotell ORDER BY hotellnavn;";
		$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra database");

		$rad=mysqli_fetch_array($sqlResultat);
		$hotellnavn=$rad["hotellnavn"];

?>
		<form method="post" action="" id="finnHotellSkjema" name="finnHotellSkjema">
			Hvilket hotell ønsker du å dra til?
			<select name="hotellnavn" id="hotellnavn">
			<?php include("dynamiskeFunksjoner.php");listeboksSted($sted);?>
		</select><br />
			<input type="submit" value="Finn hotell" id="finnHotellKnapp" name="finnHotellKnapp">
		</form>
<?php
	}


include("slutt.html");

?>
