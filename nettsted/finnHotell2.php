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

					print("<tr><td>$sted </td><td>$hotellnavn </td></tr>");
				}

			print("</table>");
		}

		if(isset($_POST["finnHotellKnapp"]))
			{
				$sted=$_POST["sted"];
				$hotellnavn=$_POST["hotellnavn"];

				if(!$sted || !$hotellnavn)
					{
						print("Alle felt m&aring; fylles ut");
					}
				else
					{
						include("db-tilkobling.php");

						$sqlSetning="UPDATE hotell SET hotellnavn='$hotellnavn' WHERE sted='$sted';";
						mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; endre data i databasen");

						print("Informasjon for sted $sted er endret <br/>");
					}
			}

include("slutt.html");
?>
