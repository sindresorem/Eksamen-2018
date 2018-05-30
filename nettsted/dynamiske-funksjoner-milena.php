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

















function listeboksBrukernavn()
{
  include("db-tilkobling.php");

  $sqlSetning="SELECT * FROM student;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $brukernavn=$rad["brukernavn"];
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];
    print ("<option value='$brukernavn'>$brukernavn $fornavn $etternavn $klassekode </option>");
  }
}

function listeboksKlassekodeValgt($valgtKlassekode)
	{
		include("db-tilkobling.php");

		$sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra database");

		$antallRader=mysqli_num_rows($sqlResultat);

		for($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);
      $klassekode=$rad["klassekode"];
      $klassenavn=$rad["klassenavn"];

      if($klassekode==$valgtKlassekode)
        {
          print("<option value='$klassekode' selected >$klassekode $klassenavn</option>");
					}
				else
					{
            print("<option value='$klassekode'>$klassekode $klassenavn</option>");
					}
			}
	}











  function listeboksBilde()
  {
    include("db-tilkobling.php");

    $sqlSetning="SELECT * FROM bilde;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");

    $antallRader=mysqli_num_rows($sqlResultat);

    for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);
      $bildenr=$rad["bildenr"];
      $opplastingsdato=$rad["opplastingsdato"];
      $filnavn=$rad["filnavn"];
      $beskrivelse=$rad["beskrivelse"];
      print ("<option value='$bildenr'>$bildenr $opplastingsdato $filnavn $beskrivelse </option>");
    }
  }
 ?>



 <?php
 function listeboksBildenr()
 {
  include("db-tilkobling.php");

  $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

  $antallRader=mysqli_num_rows($sqlResultat);
  for ($r=1;$r<=$antallRader;$r++)
  {
  $rad=mysqli_fetch_array($sqlResultat);
  $bildenr=$rad["bildenr"];
  $filnavn=$rad["filnavn"];
  print("<option value='$bildenr'>$bildenr $filnavn</option>");
  }
 }



 function listeboksBildenrValgt($valgtBildenr)
 	{
 		include("db-tilkobling.php");

 		$sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
     $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra database");

 		$antallRader=mysqli_num_rows($sqlResultat);

 		for($r=1;$r<=$antallRader;$r++)
     {
       $rad=mysqli_fetch_array($sqlResultat);
       $bildenr=$rad["bildenr"];
       $beskrivelse=$rad["beskrivelse"];

       if($bildenr==$valgtBildenr)
         {
           print("<option value='$bildenr' selected >$bildenr $beskrivelse</option>");
 					}
 				else
 					{
             print("<option value='$bildenr'>$bildenr $beskrivelse</option>");
 					}
 			}
 	}
