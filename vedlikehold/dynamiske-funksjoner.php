<?php

function  listeboksHotell()
{
  include("database-tilkobling.php");

  $sqlSetning="SELECT * FROM hotell ORDER BY hotellnavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $hotellnavn=$rad["hotellnavn"];
    $sted=$rad["sted"];


    print("<option value='$hotellnavn'> $hotellnavn $sted </option>");
    }

}


function  listeboksHotellRomType()
{
  include("database-tilkobling.php");

  $sqlSetning="SELECT * FROM hotellromtype ORDER BY hotellnavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $hotellnavn=$rad["hotellnavn"];
    $romtype=$rad["romtype"];
    $antallrom=$rad["antallrom"];


    print("<option value='$hotellnavn'> $hotellnavn $romtype $antallrom </option>");
    }

}




function  listeboksRom()
{
  include("database-tilkobling.php");

  $sqlSetning="SELECT * FROM rom ORDER BY hotellnavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $hotellnavn=$rad["hotellnavn"];
    $romtype=$rad["romtype"];
    $romnr=$rad["romnr"];


    print("<option value='$hotellnavn'> $hotellnavn $romtype $romnr </option>");
    }

}

function  listeboksRomType($romtype)
{
  include("database-tilkobling.php");

  $sqlSetning="SELECT * FROM romtype ORDER BY romtype;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $romtype=$rad["romtype"];



    print("<option value='$romtype'>$romtype</option>");
    }

}


function  listeboksSted()
{
  include("database-tilkobling.php");

<<<<<<< HEAD
  $sqlSetning="SELECT * FROM sted ORDER BY sted;";
=======
  $sqlSetning="SELECT * FROM plassering ORDER BY sted;";
>>>>>>> 785693b267d9682502297c6faa524b599418c9c1
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $sted=$rad["sted"];
    $land=$rad["land"];



    print("<option value='$sted'>$sted $land</option>");
    }

}



function listeboksStudent()
{
  include("database-tilkobling.php");

  $sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $brukernavn=$rad["brukernavn"];
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];

    print("<option value='$brukernavn'>$brukernavn $fornavn $etternavn $klassekode</option>");
    }

}

function listeboksKlassekodeValgt($valgtKlassekode)
	{
		include("database-tilkobling.php");

		$sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
		$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra db");

		$antallRader=mysqli_num_rows($sqlResultat);

		for($r=1;$r<=$antallRader;$r++)
			{
				$rad=mysqli_fetch_array($sqlResultat);
				$klassekode=$rad["klassekode"];
				$klassenavn=$rad["klassenavn"];

				if($klassekode==$valgtKlassekode)
					{
						print("<option value='$klassekode' selected>$klassekode $klassenavn</option>");
					}
				else
					{
						print("<option value='$klassekode'>$klassekode $klassenavn</option>");
					}
			}
	}

  function listeboksBildenr($valgtBildenr)
  {
    include("database-tilkobling.php");  /* tilkobling til database-server og valg av database utført */

    $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

    $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

    for ($r=1;$r<=$antallRader;$r++)
      {
        $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
        $bildenr=$rad["bildenr"];
        $filnavn=$rad["filnavn"];

        if($bildenr==$valgtBildenr)
          {
        print("<option value='$bildenr' selected>$bildenr $filnavn</option>");  /* ny verdi i listeboksen laget */
          }

        else
  				{
  					print("<option value='$bildenr'>$bildenr $filnavn</option>");
  				}

      }
  }

 ?>
