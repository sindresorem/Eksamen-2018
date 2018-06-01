<?php

function listeboksHotellnavn()
  {
    include("db-tilkobling.php");
    	$sted=$_POST["sted"];

    $sqlSetning="SELECT * FROM hotell WHERE sted='$sted' ORDER BY hotellnavn;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra db");

    $antallRader=mysqli_num_rows($sqlResultat);

    for($r=1;$r<=$antallRader;$r++)
      {
        $rad=mysqli_fetch_array($sqlResultat);
        $sted=$rad["sted"];
        $hotellnavn=$rad["hotellnavn"];

        print("<option value='$hotellnavn'>$hotellnavn $sted</option>");

      }
  }

function listeboksRomtype()
    {
      include("db-tilkobling.php");
      	$hotellnavn=$_POST["hotellnavn"];

      $sqlSetning="SELECT * FROM hotellromtype WHERE hotellnavn='$hotellnavn' ORDER BY romtype;";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra db");

      $antallRader=mysqli_num_rows($sqlResultat);

      for($r=1;$r<=$antallRader;$r++)
        {
          $rad=mysqli_fetch_array($sqlResultat);
          $hotellnavn=$rad["hotellnavn"];
          $romtype=$rad["romtype"];
          $antallrom=$rad["antallrom"];

          print("<option value='$romtype'>$romtype </option>");

        }
    }
?>
