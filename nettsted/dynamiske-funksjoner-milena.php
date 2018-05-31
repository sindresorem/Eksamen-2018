<?php

function listeboksSted()
{
  include("db-tilkobling.php");

  $sqlSetning="SELECT * FROM sted ORDER BY sted;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $sted=$rad["sted"];
    print ("<option value='$sted'>$sted $sted </option>");
  }
}

function listeboksSlettHotellDato()
{
  include("db-tilkobling.php");

  $sqlSetning="SELECT hotellnavn, dato FROM hotell ORDER BY hotellnavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $sted=$rad["sted"];
    print ("<option value='$hotellnavn'>$hotellnavn </option>");
  }
}


function listeboksHotell()
{
  include("db-tilkobling.php");

  $sqlSetning="SELECT * FROM hotell WHERE sted='sted' ORDER BY hotellnavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $hotellnav=$rad["sted"];
    print ("<option value='$sted'>$sted</option>");
  }
}

 ?>
