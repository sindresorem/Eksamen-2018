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

    <h5>Brukerfunksjoner for hotell</h5>
    <ul>
      
      <li><a href="registrer-hotell.php"> Registrer hotell </a></li>
      <li><a href="vis-hotell-data.php"> Vis data </a></li>
      <li><a href="endre-hotell-data.php"> Endre data </a></li>
      <li><a href="slett-hotell-data.php"> Slett data </a></li>

    </ul>

    <?php


    include ("slutt.php");
  }
     ?>
