<?php

function listeboksHotellnavn($valgtSted)
  {
    include("db-tilkobling.php");

    $sqlSetning="SELECT * FROM hotell WHERE sted='$valgtSted' ORDER BY hotellnavn;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra db");

    $antallRader=mysqli_num_rows($sqlResultat);

    for($r=1;$r<=$antallRader;$r++)
      {
        $rad=mysqli_fetch_array($sqlResultat);
        $sted=$rad["sted"];
        $hotellnavn=$rad["hotellnavn"];

        if($sted==$valgtSted)
					{
						print("<option value='$sted' selected>$hotellnavn $sted</option>");
					}
				else
					{
						print("<option value='$sted'>$hotellnavn $sted</option>");
					}
        //print("<option value='$sted', '$hotellnavn'>$hotellnavn</option>");
      }
  }
?>
