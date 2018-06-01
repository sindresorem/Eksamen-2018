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

    <h5>Visning av data</h5>
    <ul>

      <li><a href="vis-sted-data.php"> Vis sted </a></li>
      <li><a href="vis-hotell-data.php"> Vis hotell </a></li>
      <li><a href="vis-hotellromtype-data.php"> Vis hotellromtype </a></li>
      <li><a href="vis-rom-data.php"> Vis rom </a></li>
      <li><a href="vis-romtype-data.php"> Vis romtype </a></li>

    </ul>


    <?php

    include("database-tilkobling.php");

          $sqlSetning="SELECT * FROM rom;";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");

          $antallRader=mysqli_num_rows($sqlResultat);

          print ("<h2>Registrerte rom</h2>");
          print ("<table border=1>");
          print ("<tr><th align=left>Hotellnavn</th><th align=left>Romtype</th><th align=left>Romnr</th></tr>");

          for ($r=1;$r<=$antallRader;$r++)
            {
              $rad=mysqli_fetch_array($sqlResultat);
              $hotellnavn=$rad["hotellnavn"];
              $romtype=$rad["romtype"];
              $romnr=$rad["romnr"];



              print ("<tr><td> $hotellnavn </td><td> $romtype </td><td> $romnr </td></tr>");
            }
              print ("</table>");


    include ("slutt.php");
  }
     ?>
