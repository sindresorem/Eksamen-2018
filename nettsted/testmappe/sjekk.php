<?php
function sjekkBrukernavnPassord($brukernavn,$passord)
{

 include("db-tilkobling.php");
 $lovligBruker=true;
 $sqlSetning="SELECT * FROM bruker WHERE brukernavn='$brukernavn';";
 $sqlResultat=mysqli_query($db,$sqlSetning);
 if (!$sqlResultat)
 {
 $lovligBruker=false;
 }
 else
 {
 $rad=mysqli_fetch_array($sqlResultat);
 $lagretBrukernavn=$rad["brukernavn"];
 $lagretPassord=$rad["passord"];
 if($brukernavn!=$lagretBrukernavn || $passord!=$lagretPassord)
 {
 $lovligBruker=false;
 }
 }
 return $lovligBruker;
}

?>
