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

			include("db-tilkobling.php");
			$sted=$_POST["sted"];

			$sqlSetning="SELECT * FROM hotell WHERE sted='$sted';";
			$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra database");

			$rad=mysqli_fetch_array($sqlResultat);
			$hotellnavn=$rad["hotellnavn"];

			print("<br/>");
			print("<form method='post' action='' id='finnHotellSkjema' name='finnHotellSkjema'>");
			print("Sted <input type='text' value='$sted' id='sted' name='sted' readonly /><br/>");
			print("Sted <input type='text' value='$hotellnavn' id='sted' name='sted' readonly /><br/>");
			print("Hotellnavn <select name='hotellnavn' id='hotellnavn'>");
				include("dynamiskeFunksjoner1.php"); listeboksHotellnavn();
			print("</select> <br/>");
			print("Sted <input type='text' value='$sted' id='sted' name='sted' readonly /><br/>");
			print("<input type='submit' value='Hotell' id='finnHotellKnapp' name='finnHotellKnapp'>");
			print("</form>");
		}

		if(isset($_POST["finnHotellKnapp"]))
			{
				$sted=$_POST["sted"];
				$hotellnavn=$_POST["hotellnavn"];


						include("db-tilkobling.php");

						$sqlSetning="UPDATE hotell SET hotellnavn='$hotellnavn' WHERE sted='$sted';";
						mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; endre data i databasen");

						print("Informasjon for sted $sted er endret <br/>");

			}

include("slutt.html");
?>
