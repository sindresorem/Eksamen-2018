<?php

function listeboksSted()
	{
		include("db-tilkobling.php");

		$sqlSetning="SELECT * FROM sted ORDER BY sted;";
		$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra db");

		$antallRader=mysqli_num_rows($sqlResultat);

		for($r=1;$r<=$antallRader;$r++)
			{
				$rad=mysqli_fetch_array($sqlResultat);
				$sted=$rad["sted"];

				print("<option value='$sted'>$sted</option>");
			}
	}



?>
