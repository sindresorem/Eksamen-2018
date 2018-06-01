<?php

function listeboksHotellnavn()
  {
    include("db-tilkobling.php");

    $sqlSetning="SELECT * FROM hotell WHERE sted='$sted' ORDER BY hotellnavn;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra db");

    $antallRader=mysqli_num_rows($sqlResultat);

    for($r=1;$r<=$antallRader;$r++)
      {
        $rad=mysqli_fetch_array($sqlResultat);
        $sted=$rad["sted"];
        $hotellnavn=$rad["hotellnavn"];


				else
					{
						print("<option value='$hotellnavn'>$hotellnavn $sted</option>");
					}
        //print("<option value='$sted', '$hotellnavn'>$hotellnavn</option>");
      }
  }
?>
