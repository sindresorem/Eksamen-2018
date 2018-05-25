<?php
include("start.html");
?>
	<h3>Hoteller</h3>

<form method="post" action="" id="finnHotellSkjema" name="finnHotellSkjema">
	Hvor ønsker du å dra?
	<select name="sted" id="sted">
	<?php include("dynamiskeFunksjoner.php");listeboksSted();?>
	</select>
	<input type="submit" value="Finn hotell" id="finnHotellKnapp" name="finnHotellKnapp">
</form>

<?php
	if(isset($_POST["finnHotellKnapp"]))
		{
			include("db-tilkobling.php");
			$sted=$_POST["sted"];

			$sqlSetning="SELECT sted FROM hotell WHERE sted='$sted';";
			$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra database");

			$rad=mysqli_fetch_array($sqlResultat);
			$sted=$rad["sted"];

			print("<br/>");
			print("<form method='post' action='' id='endreKlasseSkjema' name='endreKlasseSkjema'>");
			print("Klassekode <input type='text' value='$klassekode' id='klassekode' name='klassekode' readonly /><br/>");
			print("Klassenavn <input type='text' value='$klassenavn' id='klassenavn' name='klassenavn' required /><br/>");
			print("<input type='submit' value='Endre klasse' id='endreKlasseKnapp' name='endreKlasseKnapp'>");
			print("</form>");
		}

		if(isset($_POST["endreKlasseKnapp"]))
			{
				$klassekode=$_POST["klassekode"];
				$klassenavn=$_POST["klassenavn"];

				if(!$klassekode || !$klassenavn)
					{
						print("Alle felt m&aring; fylles ut");
					}
				else
					{
						include("db-tilkobling.php");

						$sqlSetning="UPDATE klasse SET klassenavn='$klassenavn' WHERE klassekode='$klassekode';";
						mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; endre data i databasen");

						print("Klasseinformasjon for klasse $klassekode er endret <br/>");
					}
			}

include("slutt.html");
?>
