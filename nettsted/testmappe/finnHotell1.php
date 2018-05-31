<?php
include("start.html");
?>
	<h3>Hoteller</h3>

<form method="post" action="" id="finnStedSkjema" name="finnStedSkjema">
	Hvor ønsker du å dra?
	<select name="sted" id="sted">
	<?php include("dynamiskeFunksjoner.php");listeboksSted();?>
	</select>
	<input type="submit" value="Finn hotell" id="finnStedKnapp" name="finnStedKnapp">
</form>

<?php
	if(isset($_POST["finnStedKnapp"]))
		{
			$sted=$_POST["sted"];

			include("db-tilkobling.php");

			print("Her er ulike hoteller for ditt søk: $sted<br/>");

			$sqlSetning="SELECT * FROM hotell WHERE sted LIKE '$sted' ORDER BY hotellnavn;";
			$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");
			$antallRader=mysqli_num_rows($sqlResultat);


			print("<h3>Velg ditt reisemål</h3>");
			print("<table border=1>");
			print("<tr><th align=left>Sted</th><th align=left>Hotell</th> <th align=left></th></tr>");

			for($r=1;$r<=$antallRader;$r++)
				{
					$rad=mysqli_fetch_array($sqlResultat);
					$sted=$rad["sted"];
					$hotellnavn=$rad["hotellnavn"];

					print("<tr><td>$sted </td><td>$hotellnavn </td>	<td><form method='post' action='' id='velgRomtypeSkjema' name0'velgRomtypeSkjema><input type='submit' value='Velg hotell' id='finn$hotellnavn' name='finn$hotellnavn'></form></td></tr>");

			print("</table>");

		if(isset($_POST["finn$hotellnavn"]))
			{
				$hotellnavn=$_POST["hotellnavn"];


						include("db-tilkobling.php");

						$sqlSetning="SELECT * FROM hotellromtype WHERE hotellnavn LIKE '$hotellnavn' ORDER BY hotellnavn;";
						$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");
						$antallRader=mysqli_num_rows($sqlResultat);

						print("<h3>Romtyper</h3>");
						print("<table border=1>");
						print("<tr><th align=left>Hotellnavn</th><th align=left>Romtype</th> <th align=left>Antall rom</th></tr>");

						for($r=1;$r<=$antallRader;$r++)
							{
								$rad=mysqli_fetch_array($sqlResultat);
								$hotellnavn=$rad["hotellnavn"];
								$romtype=$rad["romtype"];
								$antallrom=$rad["antallrom"];

								print("<tr><td>$hotellnavn </td><td>$romtype </td>	<td>$antallrom</td></tr>");
							}

						print("</table>");
					}
			}
}
include("slutt.html");
?>
