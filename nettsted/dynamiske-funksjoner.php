<?php
function listeboksSlettHotell()
{
  include("db-tilkobling.php");

  $sqlSetning="SELECT * FROM bestilling ORDER BY hotellavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $hotellnavn=$rad["hotellnavn"];
    print ("<option value='$hotellnavn'> $hotellnavn </option>");
  }
}







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
    print ("<option value='$romtype'> $romtype </option>");
  }
}


function listeboksSted()
	{
		include("db-tilkoblingMilena.php");

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


function listeboksHotellnavn()
  {
    include("db-tilkoblingMilena.php");
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
      include("db-tilkoblingMilena.php");
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
