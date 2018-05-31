<?php
function listeboksRomtype()
{
  include("db-tilkoblingMilena.php");

  $sqlSetning="SELECT * FROM romtype ORDER BY romtype;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $romtype=$rad["romtype"];
    $antallrom=$rad["antallrom"];
    print ("<option value='$romtype'> $romtype </option>");
  }
}

?>
