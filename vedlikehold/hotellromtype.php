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

    <h5>Brukerfunksjoner for hotellromtype</h5>
    <ul>

      <li><a href="registrer-hotellromtype.php"> Registrer hotellromtype </a></li>
      <li><a href="vis-hotellromtype-data.php"> Vis data </a></li>
      <li><a href="endre-hotellromtype-data.php"> Endre data </a></li>
      <li><a href="slett-hotellromtype-data.php"> Slett data </a></li>

    </ul>

    <?php


    include ("slutt.php");
  }
     ?>
