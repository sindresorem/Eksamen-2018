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

    <h5>Brukerfunksjoner for rom</h5>
    <ul>

      <li><a href="registrer-rom.php"> Registrer rom </a></li>
      <li><a href="vis-rom-data.php"> Vis data </a></li>
      <li><a href="endre-rom-data.php"> Endre data </a></li>
      <li><a href="slett-rom-data.php"> Slett data </a></li>

    </ul>

    <?php


    include ("slutt.php");
  }
     ?>
