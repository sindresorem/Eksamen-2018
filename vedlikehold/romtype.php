<?php
  session_start();
  @$innloggetBruker=$_SESSION["brukernavn"];

  if(!$innloggetBruker) //bruker er ikke innlogget
  {
    print("Denne siden krever innlogging.");
  }
  else
  {
    include ("start.php");

    ?>

    <h5>Brukerfunksjoner for romtype</h5>
    <ul>

      <li><a href="registrer-romtype.php"> Registrer romtype </a></li>
      <li><a href="vis-romtype-data.php"> Vis data </a></li>
      <li><a href="endre-romtype-data.php"> Endre data </a></li>
      <li><a href="slett-romtype-data.php"> Slett data </a></li>

    </ul>

    <?php


    include ("slutt.php");
  }
     ?>
