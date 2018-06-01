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
			print("Hotellnavn <select name='hotellnavn' id='hotellnavn'>");
				include("dynamiskeFunksjoner1.php"); listeboksHotellnavn();
			print("</select> <br/>");
			print("<input type='submit' value='Hotell' id='finnHotellKnapp' name='finnHotellKnapp'>");
			print("</form>");
		}

		if(isset($_POST["finnHotellKnapp"]))
			{
				include("db-tilkobling.php");
				$sted=$_POST["sted"];
				$hotellnavn=$_POST["hotellnavn"];

						print("Treff for hotell $hotellnavn");

						$sqlSetning="SELECT * FROM hotellromtype WHERE hotellnavn='$hotellnavn';";
						$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra database");
						$antallRader=mysqli_num_rows($sqlResultat);

						$rad=mysqli_fetch_array($sqlResultat);
						$hotellnavn=$rad["hotellnavn"];
						$romtype=$rad["romtype"];
						$antallrom=$rad["antallrom"];

						print("<br/>");
						print("<form method='post' action='' id='finnHotellSkjema' name='finnHotellSkjema'>");
						print("Sted <input type='text' value='$sted' id='sted' name='sted' readonly /><br/>");
						print("Hotell <input type='text' value='$hotellnavn' id='hotellnavn' name='hotellnavn' readonly /><br/>");
						print("Romtype <select name='romtype' id='romtype'>");
							include("dynamiskeFunksjoner1.php"); listeboksRomtype();
						print("</select> <br/>");
						print("Antall rom <input type='text' id='booketRom' name='booketRom' />");
						print("<input type='submit' value='Bestill' id='bestillKnapp' name='bestillKnapp'>");
						print("<input type='reset' value='Nullstill' id='nullstill' name='nullstill'>");
						print("</form>");
				}



include("slutt.html");
?>
