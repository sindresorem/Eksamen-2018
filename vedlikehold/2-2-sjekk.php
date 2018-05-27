<?php  /* sjekk */
/*
/*  Programmet inneholder en funksjon for å sjekke om brukernavn og passord er korrekt
*/

function sjekkBrukernavnPassord($brukernavn,$passord)
{
/*
/*  Hensikt
/*    Funksjonen sjekker om brukernavn og passord er korrekt
/*  Parametre
/*    $brukernavn = brukernavnet som skal sjekkes
/*    $passord = passordet som skal sjekkes
/*  Funksjonsverdi/Returverdi
/*    Funksjonen returnerer true hvis brukernavn og passord er korrekt
/*    Funksjonen returnerer false ellers
*/

  include("database-tilkobling.php");  /* tilkobling til database-server og valg av database utfųrt */

  $lovligBruker=true;

  $sqlSetning="SELECT * FROM admin WHERE brukernavn='$brukernavn';";
  $sqlResultat=mysqli_query($db,$sqlSetning);

  if(!$sqlResultat)
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
