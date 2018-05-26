<?php  /* hoved  */
/*
/*  Programmet inneholder hovedsiden
*/
  session_start();
  @$innloggetBruker=$_SESSION["brukernavn"];

  if(!$innloggetBruker) //bruker er ikke innlogget
  {
    print("Denne siden krever innlogging.");
  }

  else
  {
    include ("start.php");
    print("Velkommend til startsiden - Du er logget inn som $innloggetBruker");
    include ("slutt.php");

  }
?>
