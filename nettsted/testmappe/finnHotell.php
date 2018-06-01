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
			print("Hotellnavn <input type='text' value='$hotellnavn' id='hotellnavn' name='hotellnavn' required /><br/>");

			print("<input type='submit' value='Hotell' id='finnHotellKnapp' name='finnHotellKnapp'>");
			print("</form>");
		}

		if(isset($_POST["finnHotellKnapp"]))
			{
				include("db-tilkobling.php");
				$hotellnavn=$_POST["hotellnavn"];


						$sqlSetning="SELECT * FROM hotellromtype WHERE hotellnavn='$hotellnavn';";
						$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra database");
						$antallRader=mysqli_num_rows($sqlResultat);

						if($antallRader==0)
					{
						print("<h3>Ingen rom registrert på hotell: $hotellnavn</h3>");
					}
				else
					{

					print("<h3>De forskjellige romtypene på hotell: $hotellnavn</h3>");
					print("<table border=1>");
					print("<tr><th align=left>Hotellnavn</th><th align=left>Romtype</th></tr>");

					for($r=1;$r<=$antallRader;$r++)
						{
							$rad=mysqli_fetch_array($sqlResultat);
							$hotellnavn=$rad["hotellnavn"];
							$romtype=$rad["romtype"];


							print("<tr><td>$hotellnavn </td><td>$romtype </td></tr>");
						}

				if(!$sted || !$hotellnavn)
					{
						print("Alle felt m&aring; fylles ut");
					}
				else
					{
						include("db-tilkobling.php");

					print("</table>");
				}

			}
		}
include("slutt.html");
?>
